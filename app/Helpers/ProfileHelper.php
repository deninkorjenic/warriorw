<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Challenges;
use CountryState;

class ProfileHelper
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

    public static function returnUSStates() {
        return array(
            'Alabama',
            'Alaska',
            'Arizona',
            'Arkansas',
            'California',
            'Colorado',
            'Connecticut',
            'Delaware',
            'Florida',
            'Georgia',
            'Hawaii',
            'Idaho',
            'Illinois Indiana',
            'Iowa',
            'Kansas',
            'Kentucky',
            'Louisiana',
            'Maine',
            'Maryland',
            'Massachusetts',
            'Michigan',
            'Minnesota',
            'Mississippi',
            'Missouri',
            'Montana Nebraska',
            'Nevada',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'New York',
            'North Carolina',
            'North Dakota',
            'Ohio',
            'Oklahoma',
            'Oregon',
            'Pennsylvania Rhode Island',
            'South Carolina',
            'South Dakota',
            'Tennessee',
            'Texas',
            'Utah',
            'Vermont',
            'Virginia',
            'Washington',
            'West Virginia',
            'Wisconsin',
            'Wyoming'           
            );
    }

    public static function returnTimezones() {
        return array(
            '(UTC-11:00) Midway Island' => 'Pacific/Midway',
            '(UTC-11:00) Samoa' => 'Pacific/Samoa',
            '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
            '(UTC-09:00) Alaska' => 'US/Alaska',
            '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
            '(UTC-08:00) Tijuana' => 'America/Tijuana',
            '(UTC-07:00) Arizona' => 'US/Arizona',
            '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
            '(UTC-07:00) La Paz' => 'America/Chihuahua',
            '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
            '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
            '(UTC-06:00) Central America' => 'America/Managua',
            '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
            '(UTC-06:00) Guadalajara' => 'America/Mexico_City',
            '(UTC-06:00) Mexico City' => 'America/Mexico_City',
            '(UTC-06:00) Monterrey' => 'America/Monterrey',
            '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
            '(UTC-05:00) Bogota' => 'America/Bogota',
            '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
            '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
            '(UTC-05:00) Lima' => 'America/Lima',
            '(UTC-05:00) Quito' => 'America/Bogota',
            '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
            '(UTC-04:30) Caracas' => 'America/Caracas',
            '(UTC-04:00) La Paz' => 'America/La_Paz',
            '(UTC-04:00) Santiago' => 'America/Santiago',
            '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
            '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
            '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
            '(UTC-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
            '(UTC-03:00) Greenland' => 'America/Godthab',
            '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
            '(UTC-01:00) Azores' => 'Atlantic/Azores',
            '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
            '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
            '(UTC+00:00) Edinburgh' => 'Europe/London',
            '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
            '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
            '(UTC+00:00) London' => 'Europe/London',
            '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
            '(UTC+00:00) UTC' => 'UTC',
            '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
            '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
            '(UTC+01:00) Berlin' => 'Europe/Berlin',
            '(UTC+01:00) Bern' => 'Europe/Berlin',
            '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
            '(UTC+01:00) Brussels' => 'Europe/Brussels',
            '(UTC+01:00) Budapest' => 'Europe/Budapest',
            '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
            '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
            '(UTC+01:00) Madrid' => 'Europe/Madrid',
            '(UTC+01:00) Paris' => 'Europe/Paris',
            '(UTC+01:00) Prague' => 'Europe/Prague',
            '(UTC+01:00) Rome' => 'Europe/Rome',
            '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
            '(UTC+01:00) Skopje' => 'Europe/Skopje',
            '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
            '(UTC+01:00) Vienna' => 'Europe/Vienna',
            '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
            '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
            '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
            '(UTC+02:00) Athens' => 'Europe/Athens',
            '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
            '(UTC+02:00) Cairo' => 'Africa/Cairo',
            '(UTC+02:00) Harare' => 'Africa/Harare',
            '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
            '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
            '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
            '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
            '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
            '(UTC+02:00) Riga' => 'Europe/Riga',
            '(UTC+02:00) Sofia' => 'Europe/Sofia',
            '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
            '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
            '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
            '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
            '(UTC+03:00) Minsk' => 'Europe/Minsk',
            '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
            '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
            '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
            '(UTC+03:30) Tehran' => 'Asia/Tehran',
            '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
            '(UTC+04:00) Baku' => 'Asia/Baku',
            '(UTC+04:00) Moscow' => 'Europe/Moscow',
            '(UTC+04:00) Muscat' => 'Asia/Muscat',
            '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
            '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
            '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
            '(UTC+04:30) Kabul' => 'Asia/Kabul',
            '(UTC+05:00) Islamabad' => 'Asia/Karachi',
            '(UTC+05:00) Karachi' => 'Asia/Karachi',
            '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
            '(UTC+05:30) Chennai' => 'Asia/Calcutta',
            '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
            '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
            '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
            '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
            '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
            '(UTC+06:00) Almaty' => 'Asia/Almaty',
            '(UTC+06:00) Astana' => 'Asia/Dhaka',
            '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
            '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
            '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
            '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
            '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
            '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
            '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
            '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
            '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
            '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
            '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
            '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
            '(UTC+08:00) Perth' => 'Australia/Perth',
            '(UTC+08:00) Singapore' => 'Asia/Singapore',
            '(UTC+08:00) Taipei' => 'Asia/Taipei',
            '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
            '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
            '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
            '(UTC+09:00) Osaka' => 'Asia/Tokyo',
            '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
            '(UTC+09:00) Seoul' => 'Asia/Seoul',
            '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
            '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
            '(UTC+09:30) Darwin' => 'Australia/Darwin',
            '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
            '(UTC+10:00) Canberra' => 'Australia/Canberra',
            '(UTC+10:00) Guam' => 'Pacific/Guam',
            '(UTC+10:00) Hobart' => 'Australia/Hobart',
            '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
            '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
            '(UTC+10:00) Sydney' => 'Australia/Sydney',
            '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
            '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
            '(UTC+12:00) Auckland' => 'Pacific/Auckland',
            '(UTC+12:00) Fiji' => 'Pacific/Fiji',
            '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
            '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
            '(UTC+12:00) Magadan' => 'Asia/Magadan',
            '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
            '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
            '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
            '(UTC+12:00) Wellington' => 'Pacific/Auckland',
            '(UTC+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
        );
    }

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

    public static function addUserProperties(ArrayObject $properties)
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
         * Get the last day of first week and add
         * 15 weeks/105 days to it
        **/
        $dt = auth()->user()->program_start;
        $last_day = new $dt;
        $last_day->day = $last_day->day+111;

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

        // TODO: changed database columns, we need to see which one will stay and which one will not and change code based on that
        $wp = new Programs;
        $wp->user_id = auth()->user()->id;
        $wp->save();

        $properties = new ArrayObject();

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
        $timezone = self::returnTimezones();
        $userInfo = [
            'name'          => auth()->user()->name,
            'email'         => auth()->user()->email,
            'countries'     => CountryState::getCountries(),
            'timezone'      => $timezone,
            'us_states'     => self::returnUSStates(),
        ];

        return $userInfo;
    }
}