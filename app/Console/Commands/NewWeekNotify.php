<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\UserProgram;

use App\Notifications\NewWeekStarted;

use Carbon\Carbon;

class NewWeekNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newweeknotify:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used internaly, scheduled each week, checks each active user and sends him notification about his current week.';

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

                    $weekNumber = (int) UserProgram::getCurrentWeek($user->id);

                    $user->notify(new NewWeekStarted($weekNumber));
                }
            }
        }
    }
}
