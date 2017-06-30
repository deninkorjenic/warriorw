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
        // TODO: this is for demo version only
        $this->rq_2 = $rq_1;
        $this->rq_3 = $rq_1;
        $this->rq_4 = $rq_1;
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
