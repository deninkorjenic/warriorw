<?php
namespace App\Helpers

class ActivityPoints
{
    public static function getPoints($activity)
    {
        $activities = [
            'hiking'                    =>      1,
            'climbing'                  =>      3,
            'boxing and kickboxing'     =>      4,
            'dance'                     =>      3,
            'weight training'           =>      3,
            'bootcamp'                  =>      3,
            'rowing or kayaking'        =>      3,
            'walking'                   =>      1,
            'aerobics'                  =>      2,
            'swimming or diving'        =>      2,
            'cycling'                   =>      2,
            'jogging or running'        =>      3,
            'golf'                      =>      1,
            'tennis'                    =>      2,
            'netball'                   =>      3,
            'soccer'                    =>      3,
            'afl'                       =>      3,
            'rugby'                     =>      3,
            'hockey'                    =>      3,
            'squash'                    =>      3,
            'badminton'                 =>      3,
            'basketball'                =>      3,
            'other group fitness'       =>      3,
            'martial arts'              =>      3,
            'gymnastics'                =>      4,
            'yoga'                      =>      2,
            'pilates'                   =>      2,
            'social'                    =>      2,
            'any'                       =>      3,
            'athletics throwing'        =>      3,
            'athletics jumping'         =>      4,
            'horse riding'              =>      2,
            'cricket'                   =>      2,
            'baseball'                  =>      2,
        ];

        return $activities[$activity];
    }
}