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


namespace Flextype\Component\Number;

use Flextype\Component\Arr\Arr;

class Number
{
    /**
     * Byte units
     *
     * @var   array
     */
    protected static $byte_units = [
        'B'   => 0,
        'K'   => 10,
        'Ki'  => 10,
        'KB'  => 10,
        'KiB' => 10,
        'M'   => 20,
        'Mi'  => 20,
        'MB'  => 20,
        'MiB' => 20,
        'G'   => 30,
        'Gi'  => 30,
        'GB'  => 30,
        'GiB' => 30,
        'T'   => 40,
        'Ti'  => 40,
        'TB'  => 40,
        'TiB' => 40,
        'P'   => 50,
        'Pi'  => 50,
        'PB'  => 50,
        'PiB' => 50,
        'E'   => 60,
        'Ei'  => 60,
        'EB'  => 60,
        'EiB' => 60,
        'Z'   => 70,
        'Zi'  => 70,
        'ZB'  => 70,
        'ZiB' => 70,
        'Y'   => 80,
        'Yi'  => 80,
        'YB'  => 80,
        'YiB' => 80
    ];

    protected static $formatting = [
        'phone' => '(000) 000-0000',
        'exp' => '00-00',
        'credit_card' => '**** **** **** 0000'
	];

    /**
     * Converts a number of bytes to a human readable number by taking the
	 * number of that unit that the bytes will go into it.
     *
     * echo Num::format_bytes('204800');     // 200 kB
     * echo Num::format_bytes('214901', 1);  // 209.9 kB
     * echo Num::format_bytes('2249010', 1); // 2.1 MB
     * echo Num::format_bytes('badbyteshere'); // false
     *
     * @param  int  $bytes    The number to format.
     * @param  int  $decimals The number of decimals to round up to.
     * @return boolean|string
     */
    public static function byteFormat(int $bytes = 0, int $decimals = 0)
    {
        $quant = [
            'TB' => 1099511627776,  // pow( 1024, 4)
            'GB' => 1073741824,     // pow( 1024, 3)
            'MB' => 1048576,        // pow( 1024, 2)
            'KB' => 1024,           // pow( 1024, 1)
            'B ' => 1,              // pow( 1024, 0)
        ];

        foreach ($quant as $unit => $mag ) {
            if (doubleval($bytes) >= $mag) {
                return sprintf('%01.'.$decimals.'f', ($bytes / $mag)).' '.$unit;
            }
        }

        return false;
    }

    /**
     * Converts a file size number to a byte value.
     *
     * echo Number::convertToBytes('200K');  // 204800
	 * echo Number::convertToBytes('5MiB');  // 5242880
	 * echo Number::convertToBytes('2.5GB'); // 2684354560
     *
     * @param  string $size file size in SB format
     * @return float
     */
    public static function convertToBytes(string $size = null) : float
    {
        // Prepare the size
        $size = trim((string) $size);

        // Construct an OR list of byte units for the regex
        $accepted = implode('|', array_keys(Number::$byte_units));

        // Construct the regex pattern for verifying the size format
        $pattern = '/^([0-9]+(?:\.[0-9]+)?)('.$accepted.')?$/Di';

        // Verify the size format and store the matching parts
        if (!preg_match($pattern, $size, $matches)) {
            throw new \RuntimeException('The byte unit size, "'.$size.'", is improperly formatted.');
        }

        // Find the float value of the size
        $size = (float) $matches[1];

        // Find the actual unit, assume B if no unit specified
        $unit = Arr::get($matches, 2, 'B');

        // Convert the size into bytes
        $bytes = $size * pow(2, Number::$byte_units[$unit]);

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
     * @param  float $minimum The minimum.
     * @param  float $maximum The maximum.
     * @param  float $value   The value to validate.
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

    /**
     * Transforms a number by masking characters in a specified mask format, and
     * ignoring characters that should be injected into the string without
     * matching a character from the original string (defaults to space).
     *
     * echo Number::maskString('1234567812345678', '************0000'); // ************5678
     * echo Number::maskString('1234567812345678', '**** **** **** 0000'); // **** **** **** 5678
     * echo Number::maskString('1234567812345678', '**** - **** - **** - 0000', ' -'); // **** - **** - **** - 5678
     *
     * @param   string $string the string to transform
     * @param   string $format the mask format
     * @param   string $ignore a string (defaults to a single space) containing characters to ignore in the format
     * @return  string
     */
    public static function maskString(string $string = '', string $format = '', string $ignore = ' ') : string
    {
        if(empty($format) or empty($string)) {
            return $string;
        }

        $result = '';
        $fpos = 0;
        $spos = 0;

        while ((strlen($format) - 1) >= $fpos) {

            if (ctype_alnum(substr($format, $fpos, 1))) {
                $result .= substr($string, $spos, 1);
                $spos++;
            } else {
                $result .= substr($format, $fpos, 1);

                if (strpos($ignore, substr($format, $fpos, 1)) === false) {
                    ++$spos;
                }
            }

            ++$fpos;
        }

        return $result;
    }

    /**
     * Formats a number by injecting non-numeric characters in a specified
     * format into the string in the positions they appear in the format.
     *
     * echo Number::format('1234567890', '(000) 000-0000'); // (123) 456-7890
     * echo Number::format('1234567890', '000.000.0000'); // 123.456.7890
     *
     * @param   string $string the string to format
     * @param   string $format the format to apply
     * @return  string
     */
    public static function format(string $string = '', string $format = '') : string
    {
        if (empty($format) or empty($string)) {
            return $string;
        }

        $result = '';
        $fpos = 0;
        $spos = 0;

        while ((strlen($format) - 1) >= $fpos) {
            if (ctype_alnum(substr($format, $fpos, 1))) {
                $result .= substr($string, $spos, 1);
                $spos++;
            } else {
                $result .= substr($format, $fpos, 1);
            }

            $fpos++;
        }

        return $result;
    }

    /**
     * Formats a phone number.
     *
     * echo Number::formatPhone('0612345678'); // (061) 234 5678
     * echo Number::formatPhone('0612345678', '(00) 000 000 00'); // (06) 123 456 78
     *
     * @param   string $string the unformatted phone number to format
     * @param   string $format the format to use, defaults to '(000) 000-0000'
     * @return  string
     */
    public static function formatPhone(string $string = '', string $format = null) : string
    {
        is_null($format) and $format = Number::$formatting['phone'];
        return Number::format($string, $format);
    }

    /**
     * Formats a credit card expiration string. Expects 4-digit string (MMYY).
     *
     * echo Number::formatExp('1234'); // 12-34
     * echo Number::formatExp('1234', '00/00'); // 12/34
     *
     * @param   string $string The unformatted expiration string to format
     * @param   string $format The format to use, defaults to '00-00'
     * @return  string
     */
    public static function formatExp(string $string, string $format = null) : string
    {
        is_null($format) and $format = Number::$formatting['exp'];
        return Number::format($string, $format);
    }

    /**
     * Formats (masks) a credit card.
     *
     * echo Number::maskСreditСard('1234263583742938'); // **** **** **** 2938
     * echo Number::maskСreditСard('1234123412341234', '0000 **** **** ****'); // 1234 **** **** ****
     *
     * @param   string $string the unformatted credit card number to format
     * @param   string $format the format to use, defaults to '**** **** **** 0000'
     * @return  string
     */
    public static function maskСreditСard(string $string, string $format = null) : string
    {
        is_null($format) and $format = Number::$formatting['credit_card'];
        return static::mask_string($string, $format);
    }
}
