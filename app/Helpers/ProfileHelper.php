<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Challenges;
use App\Models\Program;
use App\Models\User;
use CountryState;
use App\Models\UserProgram;
use App\Models\Week;
use App\Models\Subscriber;

class ProfileHelper
{
    /**
     * 
     * @param  Illuminate\Http\Request $request
     * 
     * @return json
     */
    public static function getAddress(Request $request)
    {
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
        
        return json_encode($address);
    }

    public static function setStartDate($datetime)
    {
        $startdate = $datetime;
        while($startdate->dayOfWeek != 1) {
            $startdate->day++;
        }
        return Carbon::parse($startdate);
    }

    public static function numberOfExercises($ex)
    {
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

    public static function bpmScore($gender, $bpm, $age)
    {
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

    public static function waistSize($gender, $unit, $waist)
    {
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

    public static function ageScore($age, $gender)
    {
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

    public static function addUserProperties(\ArrayObject $properties)
    {
        auth()->user()->name            = $properties->name;
        auth()->user()->email           = $properties->email;
        auth()->user()->address         = $properties->address;
        auth()->user()->program_id      = $properties->id;
        auth()->user()->week_one        = $properties->week_one;
        auth()->user()->last_day        = $properties->last_day;
        auth()->user()->mobile_number   = $properties->mobile_number;
        auth()->user()->security        = $properties->security;
        
        auth()->user()->save();

        return true;
    }

    public static function updateProfile(Request $request)
    {
        $address = self::getAddress($request);

        /**
         * Set start date of program
        **/
        $datetime = auth()->user()->created_at;
        auth()->user()->program_start = self::setStartDate($datetime);

        /**
         * Set day one of program
        **/
        $week_one = new $datetime;
        $week_one->day += 7;
        $week_one = Carbon::parse($week_one);

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
        $security = [
            'question'  => $request->security_question,
            'answer'    => $request->security_answer
        ];
        $security = json_encode($security);

        /**
         * Attach a program to the user
        **/

        // We get new instance of program
        $program = Program::with(['weeks.tasks', 'weeks.education', 'weeks.trainings', 'weeks.quizes'])->first();
        // TODO: changed database columns, we need to see which one will stay and which one will not and change code based on that
        $user_program = new UserProgram;
        $user_program->user_id = auth()->user()->id;
        $user_program->program_json = $program->toJson();
        $user_program->save();

        // TODO: test last day in user info on summary
        /**
         * Get the last day of first week and add
         * number of weeks from program to it
        **/
        $weeks = (count(json_decode($user_program->program_json)->weeks) * 7);

        $dt = auth()->user()->program_start;
        $last_day = new $dt;
        $last_day->day += $weeks;

        $properties = new \ArrayObject();

        $properties->name           = $request->name;
        $properties->email          = $request->email;
        $properties->address        = $address;
        $properties->id             = $challenges->id;
        $properties->week_one       = $week_one;
        $properties->last_day       = $last_day;
        $properties->mobile_number  = $request->mobile_number;
        $properties->security       = $security;
        
        self::addUserProperties($properties);
    }

    public static function getUserInfo()
    {
        $timezone = \DateTimeZone::listIdentifiers();
        $userInfo = [
            'name'          => auth()->user()->name,
            'email'         => auth()->user()->email,
            'countries'     => CountryState::getCountries(),
            'timezone'      => $timezone,
            'us_states'     => CountryState::getStates('US'),
        ];

        return $userInfo;
    }

    /**
     * We need to keep list of subscribed users, which want to receive emails from us
     */
    public static function addSubscriber($userId, $email)
    {
        // We get unique token for each user
        $token = bin2hex(random_bytes(80));
        if(count(Subscriber::where('user_id', $userId)->first()) == 0 && count(Subscriber::where('email', $email)->first()) == 0) {
            return (Subscriber::create(['user_id' => $userId, 'email' => $email, 'token' => $token]));
        }
    }

    /**
     * Method used to create unsubscribe link
     */
    public static function getUnsubsrcibeLink($userId)
    {
        $sub = Subscriber::where('user_id', $userId)->first();

        if(count($sub) == 1) {
            return url("/unsubscribe/{$sub->id}/{$sub->user_id}/{$sub->email}/{$sub->token}");
        }
    }
}