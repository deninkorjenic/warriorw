<?php

namespace App\Http\Controllers;

use App\Challenges;
use App\ProfileHelper;
use App\Programs;
use App\User;
use Carbon\Carbon;
use CountryState;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	/**
	 * Display the form for setting up
	 * the user profile
	 */
    public function index() {
        
        $timezone = ProfileHelper::returnTimezones();
    	$user = auth()->user();
    	$userInfo = array(
    			'name'          => $user->name,
    			'email'         => $user->email,
                'countries'     => CountryState::getCountries(),
                'timezone'      => $timezone,
                'us_states'     => ProfileHelper::returnUSStates(),
    		);

    	return view('profile.index', ['userInfo' => $userInfo]);
    }

    /**
     * Update the user profile with the
     * new data we acquired. This function
     * will probably be expanded with the
     * client's input
     */
    public function updateProfile(Request $request) {
        // TODO: Validation
        $address = [
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'country'   => $request->country,
            'city'      => $request->city,
            'zip'       => $request->zip
        ];
        
        if ($request->country == "US") {
            $address['state'] = $request->state;
        }
        
        $address = json_encode($address);
        /**
         * Set start date of program
        **/
        $dt = auth()->user()->created_at;
        $startdate = $dt;
        while($startdate->dayOfWeek != 1) {
            $startdate->day++;
        }
        $startdate = Carbon::parse($startdate);
        auth()->user()->program_start = $startdate;

        /**
         * Set day one of program
        **/
        $week_one = new $dt;
        $week_one->day += 7;
        $week_one = Carbon::parse($week_one);

        /**
         * Get the last day of first week and add
         * 15 weeks/105 days to it
        **/
        $last_day = new $startdate;
        $last_day->day = $last_day->day+111;

        /**
         * Create a new instance of challenges and
         * assign it to user.
        **/
        $challenges = new Challenges();
        $challenges->user_id = auth()->user()->id;
        $challenges->save();

        /**
         * Load the security question and answer
        **/
        $security = array(
                'question'  => $request->security_question,
                'answer'    => $request->security_answer
            );
        $security = json_encode($security);

        /**
         * Attach a program to the user
        **/

        $wp = new Programs;
        $wp->user_id = auth()->user()->id;
        $wp->save();

        auth()->user()->name            = $request->name;
        auth()->user()->email           = $request->email;
        auth()->user()->address         = $address;
        auth()->user()->program_id      = $challenges->id;
        auth()->user()->week_one        = $week_one;
        auth()->user()->last_day        = $last_day;
        auth()->user()->mobile_number   = $request->mobile_number;
        auth()->user()->security        = $security;
        auth()->user()->save();
        return redirect('/screening-test');
    }

    /**
     * @ Show the final screening test to decide on
     * @ user wellnes score.
     */
    public function screeningTest() {
    	return view('profile.screening');
    }

    /**
     * @ Handle the pre-screening test and determine
     * @ where to place the user.
    **/
    public function handleScreeningTest(Request $request) {
        //TODO: Validation

        /**
         * Set up some variables we need to fill
         * into the user profile:
         *
         * $fitness_score: User's global fitness grading
         *
         * $red_flag: Number of red flags user got on the pre-screening
         *
         * $user_answers: If the user has red flags, we save his answers
         * to the follow-up questions
        **/
        $fitness_score = 0;
        $red_flag = 0;
        $user_answers = array();

    	/**
         * First score modifier: Gender
         * 0: male
         * 1: female
        **/
        $gender = ($request->gender == 'male') ? 0 : 1;

        /**
         * Sum up the age and gender scores
        **/
        $fitness_score += $this->getAgeScore($request->age, $gender);

        /**
         * Sum up the scores from multiple answers.
         * This function passes variable by reference.
        **/
        $this->handleMultipleAnswers($request, $fitness_score, $red_flag, $user_answers);

        /**
         * Sum up the score from waist size
        **/
        $fitness_score += $this->handleWaistSize($gender, $request->unit, $request->waist);

        /**
         * Sum up the score from resting BPM
        **/
        $fitness_score += $this->handleBPMScore($gender, $request->heart, $request->age);

        /**
         * Sum up the score from numer of exercises
        **/
        $fitness_score += $this->handleNumberOfExercises($request->exercise);

        /**
         * Sum up the score from numer the radio answer about
         * intensity of the exercise
        **/
        $fitness_score += $request->q12;    

        $fitness_score += $this->handleActivities($request->q13) ;

        /**
         * Save the required data to the user profile
        **/

        switch ($fitness_score) {
            case $fitness_score < 6:                            $level = 1; break;
            case $fitness_score >= 6 && $fitness_score < 12:    $level = 2; break;
            case $fitness_score >= 12:                          $level = 3; break;
        }

        // Save the user's level
        auth()->user()->level = $level;

        // Save the user's answers to the pre-screening questions
        auth()->user()->screening_answers = json_encode($user_answers);

        // Mark the profile as finished
        auth()->user()->finished_profile = 1;
    	auth()->user()->save();
    	return redirect('/home');
    }

    private function handleActivities($activities) {
        $points = 0;
        foreach ($activities as $k=>$a) {
            switch ($a){
                case 'hiking':                  $points+=1; break;
                case 'climbing':                $points+=3; break;
                case 'boxing and kickboxing':   $points+=4; break;
                case 'dance':                   $points+=3; break;
                case 'weight training':         $points+=3; break;
                case 'bootcamp':                $points+=3; break;
                case 'rowing or kayaking':      $points+=3; break;
                case 'walking':                 $points+=1; break;
                case 'aerobics':                $points+=2; break;
                case 'swimming or diving':      $points+=2; break;
                case 'cycling':                 $points+=2; break;
                case 'jogging or running':      $points+=3; break;
                case 'golf':                    $points+=1; break;
                case 'tennis':                  $points+=2; break;
                case 'netball':                 $points+=3; break;
                case 'soccer':                  $points+=3; break;
                case 'afl':                     $points+=3; break;
                case 'rugby':                   $points+=3; break;
                case 'hockey':                  $points+=3; break;
                case 'squash':                  $points+=3; break;
                case 'badminton':               $points+=3; break;
                case 'basketball':              $points+=3; break;
                case 'other group fitness':     $points+=3; break;
                case 'martial arts':            $points+=3; break;
                case 'gymnastics':              $points+=4; break;
                case 'yoga':                    $points+=2; break;
                case 'pilates':                 $points+=2; break;
                case 'social':                  $points+=2; break;
                case 'any':                     $points+=3; break;
                case 'athletics throwing':      $points+=3; break;
                case 'athletics jumping':       $points+=4; break;
                case 'horse riding':            $points+=2; break;
                case 'cricket':                 $points+=2; break;
                case 'baseball':                $points+=2; break;
            }
        }
        return $points;
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ number of weekly exercises
    **/
    private function handleNumberOfExercises($ex) {
        switch ($ex) {
            case 0:
                return 1.25;
                break;
            case 1:
                return 1;
                break;
            case 2:
                return 0.75;
                break;
            case 3:
                return 0.5;
                break;
            case 4:
                return 0.5;
                break;
            default:
                return 0;
                break;
        }
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ resting BPM
    **/
    private function handleBPMScore($gender, $bpm, $age) {
        /**
         * If you have to edit this, God help you.
        **/
        if (!$gender) {
            // Male
                if (    ($age  <= 19               && $bpm < 59) ||
                        ($age   > 19 && $age <= 39 && $bpm < 58) ||
                        ($age   > 39 && $age <= 59 && $bpm < 57) ||
                        ($age   > 59               && $bpm < 56)) {
                return 0;
            } else if ( ($age  <= 19               && $bpm > 59 && $bpm <= 65) ||
                        ($age   > 19 && $age <= 39 && $bpm > 58 && $bpm <= 64) ||
                        ($age   > 39 && $age <= 59 && $bpm > 57 && $bpm <= 63) ||
                        ($age   > 59               && $bpm > 56 && $bpm <= 61)) {
                return 1;
            } else if ( ($age  <= 19               && $bpm > 65 && $bpm <= 75) ||
                        ($age   > 19 && $age <= 39 && $bpm > 64 && $bpm <= 73) ||
                        ($age   > 39 && $age <= 59 && $bpm > 63 && $bpm <= 72) ||
                        ($age   > 59               && $bpm > 62 && $bpm <= 70)) {
                return 2;
            } else if ( ($age  <= 19               && $bpm > 75 && $bpm <= 85) ||
                        ($age   > 19 && $age <= 39 && $bpm > 73 && $bpm <= 82) ||
                        ($age   > 39 && $age <= 59 && $bpm > 72 && $bpm <= 80) ||
                        ($age   > 59               && $bpm > 70 && $bpm <= 78)) {
                return 3;
            } else if ( ($age  <= 19               && $bpm > 85) ||
                        ($age   > 19 && $age <= 39 && $bpm > 82) ||
                        ($age   > 39 && $age <= 59 && $bpm > 80) ||
                        ($age   > 59               && $bpm > 78)) {
                return 4;
            }
        } else {
            // Female
                if (    ($age  <= 19               && $bpm < 62) ||
                        ($age   > 19 && $age <= 39 && $bpm < 56) ||
                        ($age   > 39 && $age <= 59 && $bpm < 54) ||
                        ($age   > 59               && $bpm < 54)) {
                return 0;
            } else if ( ($age  <= 19               && $bpm > 62 && $bpm <= 68) ||
                        ($age   > 19 && $age <= 39 && $bpm > 56 && $bpm <= 62) ||
                        ($age   > 39 && $age <= 59 && $bpm > 54 && $bpm <= 60) ||
                        ($age   > 59               && $bpm > 54 && $bpm <= 60)) {
                return 1;
            } else if ( ($age  <= 19               && $bpm > 68 && $bpm <= 77) ||
                        ($age   > 19 && $age <= 39 && $bpm > 62 && $bpm <= 71) ||
                        ($age   > 39 && $age <= 59 && $bpm > 60 && $bpm <= 69) ||
                        ($age   > 59               && $bpm > 60 && $bpm <= 69)) {
                return 2;
            } else if ( ($age  <= 19               && $bpm > 77 && $bpm <= 86) ||
                        ($age   > 19 && $age <= 39 && $bpm > 71 && $bpm <= 80) ||
                        ($age   > 39 && $age <= 59 && $bpm > 69 && $bpm <= 78) ||
                        ($age   > 59               && $bpm > 69 && $bpm <= 78)) {
                return 3;
            } else if ( ($age  <= 19               && $bpm > 87) ||
                        ($age   > 19 && $age <= 39 && $bpm > 81) ||
                        ($age   > 39 && $age <= 59 && $bpm > 79) ||
                        ($age   > 59               && $bpm > 79)) {
                return 4;
            }
        }
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ waist size.
    **/
    private function handleWaistSize($gender, $unit, $waist) {
        if(!$gender) {
            // Male
            if($unit == 'cm') {
                // Centimetres
                switch($waist) {
                    case ($waist <= 91.5):
                        return 0;
                        break;
                    case ($waist > 91.5 && $waist <= 96):
                        return 1;
                        break;
                    case ($waist > 96 && $waist <= 102):
                        return 2;
                        break;
                    case ($waist > 102 && $waist <= 107):
                        return 3;
                        break;
                    case ($waist > 107):
                        return 4;
                        break;
                }
            } else {
                // Inches
                switch($waist) {
                    case ($waist <= 36):
                        return 0;
                        break;
                    case ($waist > 36 && $waist <= 37.75):
                        return 1;
                        break;
                    case ($waist > 37.75 && $waist <= 40):
                        return 2;
                        break;
                    case ($waist > 40 && $waist <= 42.25):
                        return 3;
                        break;
                    case ($waist > 42.25):
                        return 4;
                        break;
                }
            }
        } else {
            // Female
            if($unit == 'cm') {
                // Centimetres
                switch($waist) {
                    case ($waist <= 76.5):
                        return 0;
                        break;
                    case ($waist > 76.5 && $waist <= 80.5):
                        return 1;
                        break;
                    case ($waist > 80.5 && $waist <= 87.5):
                        return 2;
                        break;
                    case ($waist > 87.5 && $waist <= 93):
                        return 3;
                        break;
                    case ($waist > 93):
                        return 4;
                        break;
                }
            } else {
                // Inches
                switch($waist) {
                    case ($waist <= 30):
                        return 0;
                        break;
                    case ($waist > 30 && $waist <= 31.75):
                        return 1;
                        break;
                    case ($waist > 31.75 && $waist <= 34.5):
                        return 2;
                        break;
                    case ($waist > 34.5 && $waist <= 36.5):
                        return 3;
                        break;
                    case ($waist > 36.5):
                        return 4;
                        break;
                }
            }
        }
    }

    /**
     * @ Separated the multiple answer questions
     * @ to tidy-up the code a bit. We pass the variables
     * @ by reference to escape the hassle of returning
     * @ values to the handleScreeningTest() function
    **/
    private function handleMultipleAnswers(&$request, &$fitness_score, &$red_flag, &$user_answers) {
        /**
         * Handle the questions with possible multiple answers
        **/
        $questions_3to8 = [
            [$request->q1, $request->q1_a1, $request->q1_a2],
            [$request->q2, $request->q2_a1, $request->q2_a2],
            [$request->q3, $request->q3_a1, $request->q3_a2],
            [$request->q4, $request->q4_a1, $request->q4_a2],
            [$request->q5, $request->q5_a1, $request->q5_a2],
            [$request->q6, $request->q6_a1, $request->q6_a2],
            [$request->q7, $request->q7_a1, $request->q7_a2],
            [$request->q8, $request->q8_a1, $request->q8_a2]
        ];

        foreach ($questions_3to8 as $k=>$q) {
            if ($q[0]) {
                array_push(
                    $user_answers,
                    [$k+1, $q[1], $q[2]]
                );
                $red_flag++;
                switch($k+1) {
                    case 3:
                        $fitness_score += 8;
                        break;
                    case 4:
                        $fitness_score += 6;
                        break;
                    case 5:
                        $fitness_score += 6;
                        break;
                    case 6:
                        $fitness_score += 5;
                        break;
                    case 7:
                        $fitness_score += 5;
                        break;
                    case 8:
                        $fitness_score += 4;
                        break;
                }
            }
        }        
    }

    /**
     * @ Get the fitness score based on users
     * @ age and gender.
    **/
    private function getAgeScore($age, $gender) {
        if(!$gender) {
            switch ($age) {
                case ($age <= 45):
                    $age_grade = 0;
                    break;
                case ($age > 45 && $age <= 60 ):
                    $age_grade = 1;
                    break;
                case($age > 60 && $age <= 70):
                    $age_grade = 2;
                    break;
                case ($age > 70 && $age <= 75 ):
                    $age_grade = 3;
                    break;
                case ($age > 75):
                    $age_grade = 4;
                    break;
            }
        } else {
            switch ($age) {
                case ($age <= 50):
                    $age_grade = 0;
                    break;
                case ($age > 50 && $age <= 65 ):
                    $age_grade = 1;
                    break;
                case($age > 65 && $age <= 70):
                    $age_grade = 2;
                    break;
                case ($age > 70 && $age <= 75 ):
                    $age_grade = 3;
                    break;
                case ($age > 75):
                    $age_grade = 4;
                    break;
            }
        }    
        return $age_grade;
    }

}