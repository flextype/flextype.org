<?php

declare(strict_types=1);

namespace Flextype\Component\Arrays;

use function array_key_exists;
use function array_merge;
use function array_shift;
use function count;
use function explode;
use function is_array;
use function is_null;

class Arrays
{
    /**
     * Expands a dot notation array into a full multi-dimensional array.
     *
     * @param array $array Array
     *
     * @return array
     */
    public static function undot(array $array) : array
    {
        $results_array = [];
        foreach ($array as $key => $value) {
            self::set($results_array, $key, $value);
        }

        return $results_array;
    }

    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array  $array   Array
     * @param  string $prepend Prepend string
     *
     * @return array
     *
     * @access  public
     */
    public static function dot(array $array, string $prepend = '') : array
    {
        $results = [];

        foreach ($array as $key => $value) {
            if (is_array($value) && ! empty($value)) {
                $results = array_merge($results, static::dot($value, $prepend . $key . '.'));
            } else {
                $results[$prepend . $key] = $value;
            }
        }

        return $results;
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param array  $array Array you want to modify
     * @param string $key   Array path
     * @param mixed  $value Value to set
     *
     * @return array
     *
     * @access  public
     */
    public static function set(array &$array, string $key, $value) : array
    {
        if (is_null($key)) {
            return $array = $value;
        }

        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);
            if (! isset($array[$key]) || ! is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  array $array The search array
     * @param  mixed $key   Array path
     *
     * @access  public
     */
    public static function has(array $array, $key) : bool
    {
        foreach (explode('.', $key) as $segment) {
            if (! is_array($array) or ! array_key_exists($segment, $array)) {
                return false;
            }

            $array = $array[$segment];
        }

        return true;
    }

    /**
     * Returns value from array using "dot notation".
     * If the key does not exist in the array, the default value will be returned instead.
     *
     * @param  array  $array   Array to extract from
     * @param  string $key     Array path
     * @param  mixed  $default Default value
     *
     * @return mixed
     *
     * @access  public
     */
    public static function get(array $array, string $key, $default = null)
    {
        // Get segments from path
        $segments = explode('.', $key);

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
     * @param  string $key   Array path
     *
     * @return mixed
     *
     * @access  public
     */
    public static function delete(array &$array, string $key) : bool
    {
        // Get segments from path
        $segments = explode('.', $key);

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
}
