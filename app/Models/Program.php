<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Program extends Model
{
    public function create() {
        $this->createProgramWellness(auth()->user()->id);
    }

    static public function getCurrentWeek() {
        $program_start = Carbon::parse(auth()->user()->program_start);

        // TODO switch those two, used only for demo purpose
        $today = $program_start->diffInDays($program_start->copy()->addDay(16));
        // $today = $program_start->diffInDays(Carbon::now());

        $current_week = $today/7;
        if (($current_week - (int)$current_week) != 0  && ($current_week - (int)$current_week) > 1) {
            $current_week = (int)$current_week + 1;
        } else if ($current_week < 1) {
            $current_week = 0;
        }
        return $current_week;
    }

    private function createProgramWellness($user_id) {

        /**
         * Attach the user to the program
        **/
        $this->user_id = auth()->user()->id;

        $this->program_type = 1;

        $week_0 = json_encode([
                'Tasks' =>
                [
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Have a look through the "My Progress" tool to familiarise yourself with the structure of each week (i.e. Training programme, Challenges and Tasks) (10 mins)', 0],
                    ['Ensure you have access to a gym with barbells and dumbbells + check out the exercise tutorials to get the right technique (if doing the gym based program), or, check the equipment list for the home based program.', 0],
                    ['Complete baseline measurements (use button above) - resting heart rate & waist circumference (5 mins)', 0],
                    ['Get support - tell your partner and anyone close to you that you are on this program. Ensure they understand that their role is to keep you honest and on track.  (5 mins)', 0],
                    ['Complete a 4 day food diary using the button at the top', 0]
                ]
        ]);
        $week_1 = json_encode([
                'Training plan' =>
                [
                    ['Bodyweight Routine 1', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0],
                    ['Bodyweight Routine 2', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0],
                    ['Bodyweight Routine 1', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0]
                ],
                'Education' =>
                [
                    ['The Warrior Mindset (9 mins)', 0],
                    ['23 and a half hours (17 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Read the Physical Activity intro guide (15 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_2 = json_encode([
                'Training plan' =>
                [
                    ['Bodyweight Routine 1', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0],
                    ['Bodyweight Routine 2', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0],
                    ['Bodyweight Routine 1', 0],
                    ['Rest', 0]
                ],
                'Education' =>
                [
                    ['MET-ATP? WTF! (12 mins)', 0],
                    ['Done your dash! (13 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Read the Nutrition intro guide (15 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                ]
        ]);

        $week_3 = json_encode([
                'Training plan' =>
                [
                    ['Bodyweight Routine 2', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0],
                    ['Bodyweight Routine 1', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0],
                    ['Bodyweight Routine 2', 0],
                    ['Rest', 0]
                ],
                'Education' =>
                [
                    ['Super-compensation-man (12 mins)', 0],
                    ['The wonderful world of cardio (16 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Reread the Physical Activity intro guide (15 mins)', 0],
                    ['Measure resting heart rate - write the result into the tracking sheet using the button at the top (2 mins)', 0],
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Measure waist circumference (1 mins)', 0]
                ]
        ]);

        $week_4 = json_encode([
                'Training plan' =>
                [
                    ['Bodyweight Routine 1', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0],
                    ['Bodyweight Routine 2', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0],
                    ['Bodyweight Routine 1', 0],
                    ['Jogging (20 mins continuous) or Cycling (30 mins)', 0]
                ],
                'Education' =>
                [
                    ['Beyond cardio (10 mins)', 0],
                    ['Lift heavy things and put them down again (14 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Reread the Nutrition intro guide (15 mins)', 0],
                    ['RWrite a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_5 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 1', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 2', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 1', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['Size matters? (10 mins)', 0],
                    ['The 7 Principles of Physical Activity Programming (5 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_6 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 2', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 1', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 2', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                ],
                'Education' =>
                [
                    ['Setting the tone (10 mins)', 0],
                    ['Don\'t count on calorie counting (15 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ],
        ]);

        $week_7 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 1', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 2', 0],
                    ['Jogging (35 mins continuous) or Cycling (45 mins)', 0],
                    ['Strength Routine 1', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0],
                ],
                'Education' =>
                [
                    ['Big Picture (14 mins)', 0],
                    ['Big Picture (14 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Reread the Physical Activity intro guide again (one last time so it sinks in!) (15 mins)', 0],
                    ['Measure resting heart rate - write the result into the tracking sheet using the button at the top (2 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Measure waist circumference (1 mins)', 0]
                ]
        ]);        

        $week_8 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jogging (45 mins continuous) or Cycling (55 mins)', 0],
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['Big Picture (13 mins)', 0],
                    ['What else we eat (13 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Reread the Nutrition intro guide again (one last time so it sinks in!) (15 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_9 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jogging (45 mins continuous) or Cycling (55 mins)', 0],
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['What else we eat (12 mins)', 0],
                    ['What\'s on your plate (21 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_10 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jogging (45 mins continuous) or Cycling (55 mins)', 0],
                    ['Strength Routine 3', 0],
                    ['Strength Routine 4', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['Principled eating (11 mins)', 0],
                    ['Principled eating (1 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0]
                ]
        ]);

        $week_11 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jogging (55 mins continuous) or Cycling (65 mins)', 0],
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    [' (1 mins)', 0],
                    [' (1 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Measure resting heart rate - write the result into the tracking sheet using the button at the top (2 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Measure waist circumference (1 mins)', 0],
                    ['Read the Sleep assist document (10 mins)', 0]
                ]
        ]);

        $week_12 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jogging (55 mins continuous) or Cycling (65 mins)', 0],
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['Getting a-rested (12 mins)', 0],
                    ['The "S" word – Quality or quantity? (15 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Read the Stress Management guide (10 mins)', 0]
                ]
        ]);

        $week_13 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jogging (55 mins continuous) or Cycling (65 mins)', 0],
                    ['Strength Routine 5', 0],
                    ['Strength Routine 6', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['The other S word: slaying the stress dragon for better sleep (15 mins)', 0],
                    ['Some specific strategies for sound sleep (13 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Reread the Sleep assist document (10 mins)', 0]
                ]
        ]);

        $week_14 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 7', 0],
                    ['Glycogen Depletion', 0],
                    ['Jogging (50 mins continuous)', 0],
                    ['Strength Routine 8', 0],
                    ['Interval Weight Training', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['Changing the stimulus (12 mins)', 0],
                    ['The long game (11 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Reread the Stress Management guide (10 mins)', 0]
                ]
        ]);

        $week_15 = json_encode([
                'Training plan' =>
                [
                    ['Strength Routine 7', 0],
                    ['Glycogen Depletion', 0],
                    ['Jogging (50 mins continuous)', 0],
                    ['Strength Routine 8', 0],
                    ['Interval Weight Training', 0],
                    ['Jog, swim, ride or play - continuous leisure based exercise for at least 30 mins', 0]
                ],
                'Education' =>
                [
                    ['The power of habit (13 mins)', 0],
                    ['The art of making excuses (10 mins)', 0]
                ],
                'Tasks' =>
                [
                    ['Measure resting heart rate - write the result into the tracking sheet using the button at the top (2 mins)', 0],
                    ['Check your wellness score (Click on button at the top) (10 mins)', 0],
                    ['Write a shopping list to cover your meals for next week. Purchase the items from the supermarket walking only the aisles that have the products you need. (10 mins)', 0],
                    ['Use the salad builder to make bulk salad for lunch times next week (suggest you do this on Sunday) (20 mins)', 0],
                    ['Email "Your Progress" tool to info@warriorwellness.com.au complete with this week\'s progress (5 mins)', 0],
                    ['Take the Weekly Revision Quiz  by pressing the button at the top (5 mins)', 0],
                    ['Complete a 4 day food diary and compare to your diary from the beginning of the program. What has changed, is it for the better?', 0],
                    ['Measure waist circumference (1 mins)', 0],
                ]
        ]);

        //** REVISION QUIZZES */
        $rq_1 = json_encode([
                [
                'question' => 'In the early stages of the program what is most important?',
                'answers' => [
                        ['Get off to a strong start by going above and beyond what is required' , '0'],
                        ['Just do the parts of the program you are most comfortable with', '0'],
                        ['Apply faith to the program and concentrate on adherence above anything else', '0'],
                        ['Keep your participation a secret from others so that you can surprise them with your results', '0'],
                        ['Fastidiously check your weight twice a day because we are looking for drastic results to develop very quickly', '0']
                    ]
                ],
                [
                'question' => 'What was the point of the video "23 and a half hours" for the purposes of this program?',
                'answers' => [
                        ['I\'ll be fine if I just walk for 30 minutes a day' , '0'],
                        ['30 minutes a day of light exercise is an absolute baseline - a starting point and the minimum you need to do underwrite your wellness.', '0'],
                        ['All other things in health and wellness, such as diet, sleep and stress management, are irrelevant', '0'],
                        ['We should be moving at least 23 and a half hours each day', '0'],
                        ['Health and wellbeing is really complicated - you should probably not try it unless you consult a doctor', '0']
                    ]
                ],
                [
                'question' => 'Which Warrior Wellness Principle is this? The forces of modern life are like the unceasing flow of a river. If we stop paddling, we immediately begin to drift away from wellness. Like the hare and tortoise, we stand to lose what we have gained if we sleep on the job, and a steady approach is always better.',
                'answers' => [
                        ['You reap what you sow' , '0'],
                        ['Anything worth doing is worth your best', '0'],
                        ['Crawl before you walk', '0'],
                        ['Consistency is better than brilliance', '0'],
                        ['The gem cannot be polished without friction', '0']
                    ]
                ],
        ]);
        
        $this->week_0 = $week_0;
        $this->rq_1 = $rq_1;
        $this->week_1 = $week_1;
        $this->week_2 = $week_2;
        $this->week_3 = $week_3;
        $this->week_4 = $week_4;
        $this->week_5 = $week_5;
        $this->week_6 = $week_6;
        $this->week_7 = $week_7;
        $this->week_8 = $week_8;
        $this->week_9 = $week_9;
        $this->week_10 = $week_10;
        $this->week_11 = $week_11;
        $this->week_12 = $week_12;
        $this->week_13 = $week_13;
        $this->week_14 = $week_14;
        $this->week_15 = $week_15;
        $this->save();

        

        /**
         * Attach the program to the user
        **/
        $current_user = User::find($user_id);
        $current_user->program_id = $this->id;
        $current_user->save();

    }
}
