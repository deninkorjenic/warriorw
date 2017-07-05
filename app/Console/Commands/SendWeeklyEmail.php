<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Subscriber;
use App\Models\UserProgram;

use App\Helpers\ProfileHelper;

use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyEmail;

class SendWeeklyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weeklyemail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used internaly, scheduled each week, checks each active user and sends him reminder about his current week.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // We need to get all users
        $users = User::get();
        foreach ($users as $user) {
            // We need to check if user finished his profile
            if($user->finished_profile) {
                // We need to check if program end date has passed
                if(Carbon::parse($user->last_day)->gt(Carbon::now())) {
                    // We need to check if user is subscribed to our emails
                    if(Subscriber::where('user_id', $user->id)->first()) {
                        $unsub_link = ProfileHelper::getUnsubsrcibeLink($user->id);

                        $current_week = (int) UserProgram::getCurrentWeek($user->id);

                        if($current_week > 0) {
                            $week_description = "week number {$current_week}";
                        } else {
                            $week_description = "first, pre-start week";
                        }

                        Mail::to($user->email)->queue(new WeeklyEmail($user->name, ProfileHelper::getUnsubsrcibeLink($user->id), $week_description));
                    }
                }
            }
        }
    }
}
