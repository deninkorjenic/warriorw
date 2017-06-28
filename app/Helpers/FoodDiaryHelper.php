<?php
namespace App\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FoodDiary;

class FoodDiaryHelper
{
    public static function read()
    {
        $user = User::find(auth()->user()->id);

        return $user->diary()->first();
    }

    public static function update(Request $request)
    {
        if($request->isMethod('post')) {
            $day_name = 'day_' .$request->input('day');
            // We use old diary to get old values of before and after lunch
            $old_diary = self::read();
            $day = [];

            $user = User::find(auth()->user()->id);

            // We're updating before lunch
            if($request->input('before_lunch') == 'true') {
                $day['before_lunch'] = [];
                $day['before_lunch']['ate'] = $request->input('ate');
                $day['before_lunch']['drank'] = $request->input('drank');
                // We need to get after_lunch value if diary is present
                if($old_diary !== null) {
                    if(isset($old_diary[$day_name]['after_lunch'])) {
                        $day['after_lunch'] = $old_diary[$day_name]['after_lunch'];
                    }
                }
            } else {
                // We're updating after lunch
                $day['after_lunch'] = [];
                $day['after_lunch']['ate'] = $request->input('ate');
                $day['after_lunch']['drank'] = $request->input('drank');
                // We need to get before_lunch if diary is present
                if($old_diary !== null) {
                    if(isset($old_diary[$day_name]['before_lunch'])) {
                        $day['before_lunch'] = $old_diary[$day_name]['before_lunch'];
                    }
                }
            }
            // There is already diary, we need to update it
            if($old_diary !== null) {
                $diary = FoodDiary::where('user_id', auth()->user()->id)
                                ->update([$day_name => json_encode($day)]);

            } else {
                // We need to create new diary
                $user->diary()->create([$day_name => json_encode($day)]);

            }
        }
    }
}