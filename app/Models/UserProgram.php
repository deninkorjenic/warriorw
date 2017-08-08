<?php
namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserProgram extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'program_json',
    ];

    /**
     * Method returns current user's points
     *
     * @param  int $id     User's id
     * @return int Current user's points
     */
    public static function getCurrentPoints($id = false)
    {

        if ($id) {
            $program = self::where('user_id', $id)->first();
        } else {
            $program = self::where('user_id', auth()->user()->id)->first();
        }

        return (int) $program->total_score;
    }

    /**
     * Method used to find current user's week
     *
     * @param  int $id     User's id
     * @return int Current user's week
     */
    public static function getCurrentWeek($id = false)
    {

        if ($id) {

            $program_start = Carbon::parse(User::find($id)->program_start);

        } else {

            $program_start = Carbon::parse(auth()->user()->program_start);
        }

        /**
         * We use this for demo purpose
         */

        if (env('APP_ENV') == 'local') {

            // For demo purpose we always return 3
            $current_week = $program_start->diffInWeeks($program_start->copy()->addWeeks(3));

        } else {

            /**
             * We need to check first if program is finished
             */

            if ($id) {

                if (\Helpers::isProgramFinished($id)) {
                    $current_week = $program_start->diffInWeeks(Carbon::parse(User::find($id)->last_day));
                } else {
                    $current_week = $program_start->diffInWeeks(Carbon::now());
                }

            } else {

                if (\Helpers::isProgramFinished()) {
                    $current_week = $program_start->diffInWeeks(Carbon::parse(auth()->user()->last_day));
                } else {
                    $current_week = $program_start->diffInWeeks(Carbon::now());
                }

            }

        }

        return $current_week;
    }

    /**
     * Method used to count overall points available on summery page
     *
     * @param  int $id     User id
     * @return int Overall points available
     */
    public static function getOverallPointsAvailable($id = false)
    {
        $current_week = self::getCurrentWeek();

        if ($id) {
            $program = self::where('user_id', $id)->first();
        } else {
            $program = self::where('user_id', auth()->user()->id)->first();
        }

        $program_json = json_decode($program->program_json);

        // We always need to reset points
        $points = 0;

        $related_weeks = explode(', ', $program_json->related_weeks);

        /**
         * If current week is not first week (actually that's week 0, pre start week), we need to get points for each week before current
         */

        if ((int) $current_week > 0) {

            for ($counter = 0; $counter < (int) $current_week; $counter++) {

                foreach ($program_json->weeks as $week) {

                    if ($week->id == $related_weeks[$counter]) {

                        $points += $week->maximum_points;
                    }

                }

            }

        } else {

            foreach ($program_json->weeks as $week) {

                if ($week->id == $related_weeks[0]) {

                    $points += $week->maximum_points;
                }

            }

        }

        return $points;
    }

}
