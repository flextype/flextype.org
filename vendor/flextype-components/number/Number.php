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

namespace Flextype\Component\Registry;

class Number
{
    /**
     * Convert bytes in 'KB','MB','GB','TiB','PiB'
     *
     * echo Number::byteFormat(10000);
     *
     * @param  int  $size Data to convert
     * @return string
     */
    public static function byteFormat(int $size) : string
    {
        $unit = ['B', 'KB', 'MB', 'GB', 'TiB', 'PiB'];

        return @round($size/pow(1024, ($i=floor(log($size, 1024)))), 2).' '.$unit[($i < 0 ? 0 : $i)];
    }

    /**
     * Convert 'KB','MB','GB' in bytes
     *
     * echo Number::convertToBytes('10MB');
     *
     * @param  string $num Number to convert
     * @return int
     */
    public static function convertToBytes(string $num) : int
    {
        $num  = strtolower($num);
        $bytes = (int) $num;

        if ( strpos( $num, 'k' ) !== false )
            $bytes = intval( $num ) * 1024;
        elseif ( strpos( $num, 'm' ) !== false )
            $bytes = intval($num) * 1024 * 1024;
        elseif ( strpos( $num, 'g' ) !== false )
            $bytes = intval( $num ) * 1024 * 1024 * 1024;
        return $bytes;
    }

    /**
     * Converts a number into a more readable human-type number.
     *
     * echo Number::quantity(7000); // 7K
     * echo Number::quantity(7500); // 8K
     * echo Number::quantity(7500, 1); // 7.5K
     *
     * @param  int $num      Num to convert
     * @param  int $decimals Decimals
     * @return string
     */
    public static function quantity(int $num, int $decimals = 0) : string
    {
        if ($num >= 1000 && $num < 1000000) {
            return sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000)).'K';
        } elseif ($num >= 1000000 && $num < 1000000000) {
            return sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000000)).'M';
        } elseif ($num >= 1000000000) {
            return sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000000000)).'B';
        }

        return $num;
    }

    /**
     * Checks if the value is between the minimum and maximum (min & max included).
     *
     * if (Number::between(2, 10, 5)) {
     *     // do something...
     * }
     *
     * @param  float   $minimum The minimum.
     * @param  float   $maximum The maximum.
     * @param  float   $value   The value to validate.
     * @return bool
     */
    public static function between($minimum, $maximum, $value)
    {
        return ((float) $value >= (float) $minimum && (float) $value <= (float) $maximum);
    }

    /**
     * Checks the value for an even number.
     *
     * if (Number::even(2)) {
     *     // do something...
     * }
     *
     * @param  int $value The value to validate.
     * @return bool
     */
    public static function even(int $value) : bool
    {
        return (($value % 2) == 0);
    }

    /**
     * Checks if the value is greather than a given minimum.
     *
     * if (Number::greaterThan(2, 10)) {
     *     // do something...
     * }
     *
     * @param  float   $minimum The minimum as a float.
     * @param  float   $value   The value to validate.
     * @return bool
     */
    public static function greaterThan($minimum, $value) : bool
    {
        return ((float) $value > (float) $minimum);
    }

    /**
     * Checks if the value is smaller than a given maximum.
     *
     * if (Number::smallerThan(2, 10)) {
     *     // do something...
     * }
     *
     * @param  int $maximum The maximum.
     * @param  int $value   The value to validate.
     * @return bool
     */
    public static function smallerThan(int $maximum, int $value) : bool
    {
        return ($value < $maximum);
    }

    /**
     * Checks if the value is not greater than or equal a given maximum.
     *
     * if (Number::maximum(2, 10)) {
     *     // do something...
     * }
     *
     * @param  int $maximum The maximum.
     * @param  int $value   The value to validate.
     * @return bool
     */
    public static function maximum(int $maximum, int $value) : bool
    {
        return ($value <= $maximum);
    }

    /**
     * Checks if the value is greater than or equal to a given minimum.
     *
     * if (Number::minimum(2, 10)) {
     *     // do something...
     * }
     *
     * @param  int $minimum The minimum.
     * @param  int $value   The value to validate.
     * @return bool
     */
    public static function minimum(int $minimum, int $value) : bool
    {
        return ($value >= $minimum);
    }

    /**
     * Checks the value for an odd number.
     *
     * if (Number::odd(2)) {
     *     // do something...
     * }
     *
     * @param  int $value The value to validate.
     * @return bool
     */
    public static function odd(int $value) : bool
    {
        return ! Number::even($value);
    }

}
