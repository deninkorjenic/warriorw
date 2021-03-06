<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendWeeklyEmail::class,
        Commands\NewWeekNotify::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('weeklyemail:send')->weekly()->mondays()->at('15:00')->withoutOverlapping()->evenInMaintenanceMode()->appendOutputTo('schedule-log.log');
        $schedule->command('newweeknotify:notify')->weekly()->mondays()->at('15:00')->withoutOverlapping()->evenInMaintenanceMode()->appendOutputTo('schedule-log.log');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
