<?php

declare(strict_types=1);

/**
 * @link http://tools.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Arr;

use const SORT_NATURAL;
use const SORT_REGULAR;
use function array_reverse;
use function array_shift;
use function arsort;
use function asort;
use function count;
use function explode;
use function function_exists;
use function is_array;
use function mb_strtolower;
use function natsort;
use function strtolower;
use function array_merge;

class Arr
{
    /**
     * Sorts a multi-dimensional array by a certain field path
     *
     * @param  array  $array     The source array
     * @param  string $field     The name of the field path
     * @param  string $direction Order type DESC (descending) or ASC (ascending)
     * @param  const  $method    A PHP sort method flag or 'natural' for natural sorting, which is not supported in PHP by sort flags
     *
     * @return array
     *
     * @access  public
     */
    public static function sort(array $array, string $field, string $direction = 'ASC', $method = SORT_REGULAR) : array
    {
        if (count($array) > 0) {
            // Create the helper array
            foreach ($array as $key => $row) {
                $helper[$key] = function_exists('mb_strtolower') ? mb_strtolower(strval(static::get($row, $field))) : strtolower(strval(static::get($row, $field)));
            }

            // Sort
            if ($method === SORT_NATURAL) {
                natsort($helper);
                ($direction === 'DESC') and $helper = array_reverse($helper);
            } elseif ($direction === 'DESC') {
                arsort($helper, $method);
            } else {
                asort($helper, $method);
            }

            // Rebuild the original array
            foreach ($helper as $key => $val) {
                $result[$key] = $array[$key];
            }

            // Return result array
            return $result;
        }
    }

    /**
     * Sets an array value using "dot notation".
     *
     * @param   array  $array Array you want to modify
     * @param   string $path  Array path
     * @param   mixed  $value Value to set
     *
     * @access  public
     */
    public static function set(array &$array, string $path, $value) : void
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        while (count($segments) > 1) {
            $segment = array_shift($segments);
            if (! isset($array[$segment]) || ! is_array($array[$segment])) {
                $array[$segment] = [];
            }
            $array =& $array[$segment];
        }
        $array[array_shift($segments)] = $value;
    }

    /**
     * Returns value from array using "dot notation".
     * If the key does not exist in the array, the default value will be returned instead.
     *
     * @param  array  $array   Array to extract from
     * @param  string $path    Array path
     * @param  mixed  $default Default value
     *
     * @return mixed
     *
     * @access  public
     */
    public static function get(array $array, string $path, $default = null)
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        foreach ($segments as $segment) {
            // Check
            if (! is_array($array) || ! isset($array[$segment])) {
                return $default;
            }

            // Write
            $array = $array[$segment];
        }

        // Return
        return $array;
    }

    /**
     * Deletes an array value using "dot notation".
     *
     * @param  array  $array Array you want to modify
     * @param  string $path  Array path
     *
     * @return mixed
     *
     * @access  public
     */
    public static function delete(array &$array, string $path) : bool
    {
        // Get segments from path
        $segments = explode('.', $path);

        // Loop through segments
        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (! isset($array[$segment]) || ! is_array($array[$segment])) {
                return false;
            }

            $array =& $array[$segment];
        }

        unset($array[array_shift($segments)]);

        return true;
    }

    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array  $array Array
     * @param  string $prepend Prepend string
     *
     * @return array
     *
     * @access  public
     */
    public static function dot(array $array, string $prepend = '') : array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value) && ! empty($value)) {
                $result = array_merge($result, static::dot($value, $prepend . $key . '.'));
            } else {
                $result[$prepend . $key] = $value;
            }
        }

        return $result;
    }

     /**
      * Expands a dot notation array into a full multi-dimensional array.
      *
      * @param  array $array
      *
      * @return array
      *
      * @access  public
      */
    public static function undot(array $array) : array
    {
        $result = [];

        foreach ($array as $key => $value) {
            static::set($result, $key, $value);
        }

        return $result;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  array $array The search array
     * @param  mixed $path  Array path
     *
     * @return bool
     *
     * @access  public
     */
    public static function keyExists(array $array, $path) : bool
    {
        foreach (explode('.', $path) as $segment) {
            if (! is_array($array) or ! array_key_exists($segment, $array)) {
                return false;
            }

            $array = $array[$segment];
        }

        return true;
    }

    /**
     * Returns a random value from an array.
     *
     * @param  array $array Array path
     *
     * @return mixed
     *
     * @access  public
     */
    public static function random(array $array)
    {
        return $array[array_rand($array)];
    }

    /**
     * Returns TRUE if the array is associative and FALSE if not.
     *
     * @param  array $array Array to check
     *
     * @return bool
     *
     * @access  public
     */
    public static function isAssoc(array $array) : bool
    {
        return (bool) count(array_filter(array_keys($array), 'is_string'));
    }

    /**
     * Converts an array to a JSON string
     *
     * @param array $array   The source array
     * @param int   $options Options, default is 0
     * @param int   $depth   Options, default is 512
     *
     * @return string  The JSON string
     *
     * @access  public
     */
    public static function toJson(array $array, int $options = 0, int $depth = 512) : string
    {
        return json_encode($array, $options, $depth);
    }

    /**
     * Create an new Array from JSON string.
     *
     * @param string $json     The JSON string
     * @param bool   $assoc    Is assoc, default is true
     * @param int    $depth    Depth, default is 512
     * @param int    $options  Options, default is 0
     *
     * @return array
     *
     * @access  public
     */
    public static function createFromJson(string $json, bool $assoc = true, int $depth = 512, int $options = 0) : array
    {
        return json_decode($json, $assoc, $depth, $options);
    }

    /**
     * Create an new Array object via string.
     *
     * @param string      $str       The input string.
     * @param string|null $delimiter The boundary string.
     * @param string|null $regEx     Use the $delimiter or the $regEx, so if $pattern is null, $delimiter will be used.
     *
     * @return array
     */
    public static function createFromString(string $str, string $delimiter = null, string $regEx = null) : array
    {
        if ($regEx) {
            preg_match_all($regEx, $str, $array);

            if (! empty($array)) {
                $array = $array[0];
            }
        } else {
            $array = explode($delimiter, $str);
        }

        array_walk(
            $array,
            static function (&$val) : void {
                if (! is_string($val)) {
                    return;
                }

                $val = trim($val);
            }
        );

        return $array;
    }

    /**
     * Returns the first element of an array
     *
     * @param   array $array The source array
     *
     * @return  mixed  The first element
     */
    public static function first(array $array)
    {
        return array_shift($array);
    }

    /**
     * Returns the last element of an array
     *
     * @param   array $array The source array
     *
     * @return  mixed  The last element
     */
    public static function last(array $array)
    {
        return array_pop($array);
    }

    /**
     * Overwrites an array with values from input arrays.
     * Keys that do not exist in the first array will not be added!
     *
     * @param   array $array1 master array
     * @param   array $array2 input arrays that will overwrite existing values
     *
     * @return  array
     */
    public static function overwrite(array $array1, array $array2) : array
    {
        foreach (array_intersect_key($array2, $array1) as $key => $value) {
            $array1[$key] = $value;
        }

        if (func_num_args() > 2) {
            foreach (array_slice(func_get_args(), 2) as $array2) {
                foreach (array_intersect_key($array2, $array1) as $key => $value) {
                    $array1[$key] = $value;
                }
            }
        }

        return $array1;
    }

    /**
     * Returns the average value of the current array.
     *
     * @param  array $array    Array
     * @param  int   $decimals The number of decimal-numbers to return.
     *
     * @return int|double
     */
    public static function average(array $array, int $decimals = 0)
    {
        $count = self::size($array);

        if (! $count) {
            return 0;
        }

        if (! is_int($decimals)) {
            $decimals = 0;
        }

        return round(array_sum($array) / $count, $decimals);
    }

    /**
     * Counts all elements in an array.
     *
     * @param array $array Array
     * @param int   $mode  [optional] If the optional mode parameter is set to
     *                     COUNT_RECURSIVE (or 1), count
     *                     will recursively count the array. This is particularly useful for
     *                     counting all the elements of a multidimensional array. count does not detect infinite recursion.
     */
    public static function size(array $array, int $mode = COUNT_NORMAL) : int
    {
        return count($array, $mode);
    }

    /**
     * Return an array with elements in reverse order.
     *
     * @param array $array         Array
     * @param bool  $preserve_keys Default is false FALSE - numeric keys are preserved.
     *                             Non-numeric keys are not affected by this setting and will always be preserved.
     *
     * @return array
     */
    public function reverse(array $array, bool $preserve_keys = false) : array
    {
        return array_reverse($array, $preserve_keys);
    }
}
