<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Date;

class Date
{
    /**
     * Get format date
     *
     * echo Date::format($date, 'j.n.Y');
     *
     * @param  int $date   Unix timestamp
     * @param  string  $format Date format
     * @return int
     */
    public static function format(int $date, string $format = 'j.n.Y') : int
    {
        return date($format, $date);
    }

    /**
     * Get number of seconds in a minute, incrementing by a step.
     *
     * $seconds = Date::seconds();
     *
     * @param  int $step  Amount to increment each step by, 1 to 30
     * @param  int $start Start value
     * @param  int $end   End value
     * @return array
     */
    public static function seconds(int $step = 1, int $start = 0, int $end = 60) : array
    {
        return Date::_range($step, $start, $end);
    }

    /**
     * Get number of minutes in a hour, incrementing by a step.
     *
     * $minutes = Date::minutes();
     *
     * @param  int $step  Amount to increment each step by, 1 to 30
     * @param  int $start Start value
     * @param  int $end   End value
     * @return array
     */
    public static function minutes(int $step = 5, int $start = 0, int $end = 60) : array
    {
        return Date::_range($step, $start, $end);
    }

    /**
     * Get number of hours, incrementing by a step.
     *
     * $hours = Date::hours();
     *
     * @param  int  $step  Amount to increment each step by, 1 to 30
     * @param  bool $long  Start value
     * @param  int  $start End value
     * @return array
     */
    public static function hours(int $step = 1, bool $long = false, int $start = null) : array
    {
        if ($start === null) $start = ($long === FALSE) ? 1 : 0;
        $end = ($long === true) ? 23 : 12;

        return Date::_range($step, $start, $end, true);
    }

    /**
     * Get number of months.
     *
     * $months = Date::months();
     *
     * @return array
     */
    public static function months() : array
    {
        return Date::_range(1, 1, 12, true);
    }

    /**
     * Get number of days.
     *
     * $months = Date::days();
     *
     * @return array
     */
    public static function days() : array
    {
        return Date::_range(1, 1, Date::daysInMonth((int) date('M')), true);
    }

    /**
     * Returns the number of days in the requested month
     *
     * $days = Date::daysInMonth(1);
     *
     * @param  int $month Month as a number (1-12)
     * @param  int $year  The year
     * @return int
     */
    public static function daysInMonth(int $month, int $year = null)
    {
        // Redefine vars
        $year   = ! empty($year) ? $year : (int) date('Y');

        if ($month < 1 or $month > 12) {
            return false;
        } elseif ($month == 2) {
            if ($year % 400 == 0 or ($year % 4 == 0 and $year % 100 != 0)) {
                return 29;
            }
        }

        $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        return $days_in_month[$month-1];
    }

    /**
     * Get number of years.
     *
     * $years = Date::years();
     *
     * @param  int $long  Start value
     * @param  int $start End value
     * @return array
     */
    public static function years(int $start = 1980, int $end = 2024) : array
    {
        return Date::_range(1, $start, $end, true);
    }

    /**
     * Get current season name
     *
     * echo Date::season();
     *
     * @return string
     */
    public static function season() : string
    {
        $seasons = ["Winter", "Spring", "Summer", "Autumn"];

        return $seasons[(int) ((date("n") %12)/3)];
    }

    /**
     * Get today date
     *
     * echo Date::today();
     *
     * @param  string $format Date format
     * @return string
     */
    public static function today(string $format = 'm.d.y') : string
    {
        return date($format);
    }

    /**
     * Get yesterday date
     *
     * echo Date::yesterday();
     *
     * @param  string $format Date format
     * @return string
     */
    public static function yesterday(string $format = 'm.d.y') : string
    {
        return date($format, strtotime("-1 day"));
    }

    /**
     * Get tomorrow date
     *
     * echo Date::tomorrow();
     *
     * @param  string $format Date format
     * @return string
     */
    public static function tomorrow(string $format = 'm.d.y') : string
    {
        return date($format, strtotime("+1 day"));
    }

    /**
     * Converts a UNIX timestamp to DOS format.
     *
     * $dos = Date::unix2dos($unix);
     *
     * @param  int $timestamp UNIX timestamp
     * @return int
     */
    public static function unix2dos(int $timestamp = 0) : int
    {
        $timestamp = ($_timestamp == 0) ? getdate() : getdate($_timestamp);

        if ($timestamp['year'] < 1980) return (1 << 21 | 1 << 16);

        $timestamp['year'] -= 1980;

        return ($timestamp['year']    << 25 | $timestamp['mon']     << 21 |
                $timestamp['mday']    << 16 | $timestamp['hours']   << 11 |
                $timestamp['minutes'] << 5  | $timestamp['seconds'] >> 1);
    }

    /**
     * Converts a DOS timestamp to UNIX format.
     *
     * $unix = Date::dos2unix($dos);
     *
     * @param  int $timestamp DOS timestamp
     * @return int
     */
    public static function dos2unix(int $timestamp) : int
    {
        $sec  = 2 * ($timestamp & 0x1f);
        $min  =  ($timestamp >> 5) & 0x3f;
        $hrs  =  ($timestamp >> 11) & 0x1f;
        $day  =  ($timestamp >> 16) & 0x1f;
        $mon  = (($timestamp >> 21) & 0x0f);
        $year = (($timestamp >> 25) & 0x7f) + 1980;

        return mktime($hrs, $min, $sec, $mon, $day, $year);
    }

    /**
     * Get Time zones
     *
     * @return array
     */
    public static function timezones() : array
    {
        return ['Kwajalein'=>'(GMT-12:00) International Date Line West',
                    'Pacific/Samoa'=>'(GMT-11:00) Midway Island, Samoa',
                    'Pacific/Honolulu'=>'(GMT-10:00) Hawaii',
                    'America/Anchorage'=>'(GMT-09:00) Alaska',
                    'America/Los_Angeles'=>'(GMT-08:00) Pacific Time (US &amp; Canada)',
                    'America/Tijuana'=>'(GMT-08:00) Tijuana, Baja California',
                    'America/Denver'=>'(GMT-07:00) Mountain Time (US &amp; Canada)',
                    'America/Chihuahua'=>'(GMT-07:00) Chihuahua, La Paz, Mazatlan',
                    'America/Phoenix'=>'(GMT-07:00) Arizona',
                    'America/Regina'=>'(GMT-06:00) Saskatchewan',
                    'America/Tegucigalpa'=>'(GMT-06:00) Central America',
                    'America/Chicago'=>'(GMT-06:00) Central Time (US &amp; Canada)',
                    'America/Mexico_City'=>'(GMT-06:00) Guadalajara, Mexico City, Monterrey',
                    'America/New_York'=>'(GMT-05:00) Eastern Time (US &amp; Canada)',
                    'America/Bogota'=>'(GMT-05:00) Bogota, Lima, Quito, Rio Branco',
                    'America/Indiana/Indianapolis'=>'(GMT-05:00) Indiana (East)',
                    'America/Caracas'=>'(GMT-04:30) Caracas',
                    'America/Halifax'=>'(GMT-04:00) Atlantic Time (Canada)',
                    'America/Manaus'=>'(GMT-04:00) Manaus',
                    'America/Santiago'=>'(GMT-04:00) Santiago',
                    'America/La_Paz'=>'(GMT-04:00) La Paz',
                    'America/St_Johns'=>'(GMT-03:30) Newfoundland',
                    'America/Argentina/Buenos_Aires'=>'(GMT-03:00) Buenos Aires',
                    'America/Sao_Paulo'=>'(GMT-03:00) Brasilia',
                    'America/Godthab'=>'(GMT-03:00) Greenland',
                    'America/Montevideo'=>'(GMT-03:00) Montevideo',
                    'America/Argentina/Buenos_Aires'=>'(GMT-03:00) Georgetown',
                    'Atlantic/South_Georgia'=>'(GMT-02:00) Mid-Atlantic',
                    'Atlantic/Azores'=>'(GMT-01:00) Azores',
                    'Atlantic/Cape_Verde'=>'(GMT-01:00) Cape Verde Is.',
                    'Europe/London'=>'(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London',
                    'Atlantic/Reykjavik'=>'(GMT) Monrovia, Reykjavik',
                    'Africa/Casablanca'=>'(GMT) Casablanca',
                    'Europe/Belgrade'=>'(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
                    'Europe/Sarajevo'=>'(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb',
                    'Europe/Brussels'=>'(GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
                    'Africa/Algiers'=>'(GMT+01:00) West Central Africa',
                    'Europe/Amsterdam'=>'(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
                    'Africa/Cairo'=>'(GMT+02:00) Cairo',
                    'Europe/Helsinki'=>'(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius',
                    'Europe/Athens'=>'(GMT+02:00) Athens, Bucharest, Istanbul',
                    'Asia/Jerusalem'=>'(GMT+02:00) Jerusalem',
                    'Asia/Amman'=>'(GMT+02:00) Amman',
                    'Asia/Beirut'=>'(GMT+02:00) Beirut',
                    'Africa/Windhoek'=>'(GMT+02:00) Windhoek',
                    'Africa/Harare'=>'(GMT+02:00) Harare, Pretoria',
                    'Asia/Kuwait'=>'(GMT+03:00) Kuwait, Riyadh',
                    'Asia/Baghdad'=>'(GMT+03:00) Baghdad',
                    'Europe/Minsk'=>'(GMT+03:00) Minsk',
                    'Africa/Nairobi'=>'(GMT+03:00) Nairobi',
                    'Asia/Tbilisi'=>'(GMT+03:00) Tbilisi',
                    'Asia/Tehran'=>'(GMT+03:30) Tehran',
                    'Asia/Muscat'=>'(GMT+04:00) Abu Dhabi, Muscat',
                    'Asia/Baku'=>'(GMT+04:00) Baku',
                    'Europe/Moscow'=>'(GMT+04:00) Moscow, St. Petersburg, Volgograd',
                    'Asia/Yerevan'=>'(GMT+04:00) Yerevan',
                    'Asia/Karachi'=>'(GMT+05:00) Islamabad, Karachi',
                    'Asia/Tashkent'=>'(GMT+05:00) Tashkent',
                    'Asia/Kolkata'=>'(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
                    'Asia/Colombo'=>'(GMT+05:30) Sri Jayawardenepura',
                    'Asia/Katmandu'=>'(GMT+05:45) Kathmandu',
                    'Asia/Dhaka'=>'(GMT+06:00) Astana, Dhaka',
                    'Asia/Yekaterinburg'=>'(GMT+06:00) Ekaterinburg',
                    'Asia/Rangoon'=>'(GMT+06:30) Yangon (Rangoon)',
                    'Asia/Novosibirsk'=>'(GMT+07:00) Almaty, Novosibirsk',
                    'Asia/Bangkok'=>'(GMT+07:00) Bangkok, Hanoi, Jakarta',
                    'Asia/Beijing'=>'(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi',
                    'Asia/Ulaanbaatar'=>'(GMT+08:00) Irkutsk, Ulaan Bataar',
                    'Asia/Krasnoyarsk'=>'(GMT+08:00) Krasnoyarsk',
                    'Asia/Kuala_Lumpur'=>'(GMT+08:00) Kuala Lumpur, Singapore',
                    'Asia/Taipei'=>'(GMT+08:00) Taipei',
                    'Australia/Perth'=>'(GMT+08:00) Perth',
                    'Asia/Seoul'=>'(GMT+09:00) Seoul',
                    'Asia/Tokyo'=>'(GMT+09:00) Osaka, Sapporo, Tokyo',
                    'Australia/Darwin'=>'(GMT+09:30) Darwin',
                    'Australia/Adelaide'=>'(GMT+09:30) Adelaide',
                    'Australia/Sydney'=>'(GMT+10:00) Canberra, Melbourne, Sydney',
                    'Australia/Brisbane'=>'(GMT+10:00) Brisbane',
                    'Australia/Hobart'=>'(GMT+10:00) Hobart',
                    'Asia/Yakutsk'=>'(GMT+10:00) Yakutsk',
                    'Pacific/Guam'=>'(GMT+10:00) Guam, Port Moresby',
                    'Asia/Vladivostok'=>'(GMT+11:00) Vladivostok',
                    'Pacific/Fiji'=>'(GMT+12:00) Fiji, Kamchatka, Marshall Is.',
                    'Asia/Magadan'=>'(GMT+12:00) Magadan, Solomon Is., New Caledonia',
                    'Pacific/Auckland'=>'(GMT+12:00) Auckland, Wellington',
                    'Pacific/Tongatapu'=>'(GMT+13:00) Nukualofa'
                ];
    }

    /**
     * _range()
     */
    protected static function _range($step, $start, $end, $flag = false)
    {
        $result = [];

        if ($flag) {
            for ($i = $start; $i <= $end; $i += $step) $result[$i] = (string) $i;
        } else {
            for ($i = $start; $i < $end; $i += $step) $result[$i]  = sprintf('%02d', $i);
        }

        return $result;
    }

}
