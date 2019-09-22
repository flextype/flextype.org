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
        $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        $offsets = [];
        $testDate = new \DateTime();

        foreach ($timezones as $zone) {
            $tz = new \DateTimeZone($zone);
            $offsets[$zone] = $tz->getOffset($testDate);
        }

        asort($offsets);

        $timezone_list = [];
        foreach ($offsets as $timezone => $offset) {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate('H:i', abs($offset));

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$timezone] = "(${pretty_offset}) ".str_replace('_', ' ', $timezone);
        }

        return $timezone_list;
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
