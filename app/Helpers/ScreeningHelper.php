<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\ProfileHelper;


class ScreeningHelper
{
    // TODO: Validation
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
    private static $fitness_score = 0;
    private static $red_flag = 0;
    private static $user_answers = array();

    public static function handleScreeningTest(Request $request) {
        /**
         * First score modifier: Gender
         * 0: male
         * 1: female
        **/
        $gender = ($request->gender == 'male') ? 0 : 1;

        /**
         * Sum up the age and gender scores
        **/
        self::$fitness_score += self::getAgeScore($request->age, $gender);

        /**
         * Sum up the scores from multiple answers.
         * This function passes variable by reference.
        **/
        self::handleMultipleAnswers($request, self::$fitness_score, self::$red_flag, self::$user_answers);

        /**
         * Sum up the score from waist size
        **/
        self::$fitness_score += self::handleWaistSize($gender, $request->unit, $request->waist);

        /**
         * Sum up the score from resting BPM
        **/
        self::$fitness_score += self::handleBPMScore($gender, $request->heart, $request->age);

        /**
         * Sum up the score from numer of exercises
        **/
        self::$fitness_score += self::handleNumberOfExercises($request->exercise);

        /**
         * Sum up the score from numer the radio answer about
         * intensity of the exercise
        **/
        self::$fitness_score += $request->q12;    

        self::$fitness_score += self::handleActivities($request->q13) ;

        /**
         * Save the required data to the user profile
        **/
        if(self::$fitness_score < 6) {
            $level = 1;
        } elseif (self::$fitness_score >= 6 && self::$fitness_score < 12) {
            $level = 2;
        } else {
            $level = 3;
        }

        // Save the user's level
        auth()->user()->level = $level;

        // Save the user's answers to the pre-screening questions
        auth()->user()->screening_answers = json_encode(self::$user_answers);

        // Mark the profile as finished
        auth()->user()->finished_profile = 1;
        auth()->user()->save();
        return true;
    }

    private static function handleActivities($activities) {
        $points = 0;
        foreach ($activities as $k=>$a) {
            $points += ProfileHelper::getPoints($a);
        }
        return $points;
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ number of weekly exercises
    **/
    private static function handleNumberOfExercises($ex) {
        return ProfileHelper::numberOfExercises($ex);
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ resting BPM
    **/
    private static function handleBPMScore($gender, $bpm, $age) {
        return ProfileHelper::bpmScore($gender, $bpm, $age);
    }

    /**
     * @ We calculate the fitness grading score based on the
     * @ waist size.
    **/
    private static function handleWaistSize($gender, $unit, $waist) {
        return ProfileHelper::waistSize($gender, $unit, $waist);
    }

    /**
     * @ Separated the multiple answer questions
     * @ to tidy-up the code a bit. We pass the variables
     * @ by reference to escape the hassle of returning
     * @ values to the handleScreeningTest() function
    **/
    private static function handleMultipleAnswers(&$request, &$fitness_score, &$red_flag, &$user_answers) {
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
    private static function getAgeScore($age, $gender) {
        return ProfileHelper::ageScore($age, $gender);
    }
}