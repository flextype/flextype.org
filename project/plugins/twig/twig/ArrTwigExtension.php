<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype;

use Twig_Extension;
use Twig_Extension_GlobalsInterface;
use Flextype\Component\Arr\Arr;

class ArrTwigExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    /**
     * Flextype Dependency Container
     */
    private $flextype;

    /**
     * Constructor
     */
    public function __construct($flextype)
    {
        $this->flextype = $flextype;
    }

    /**
     * Register Global variables in an extension
     */
    public function getGlobals()
    {
        return [
            'arr' => new ArrTwig($this->flextype),
        ];
    }
}

class ArrTwig
{
    /**
     * Flextype Dependency Container
     */
    private $flextype;

    /**
     * Constructor
     */
    public function __construct($flextype)
    {
        $this->flextype = $flextype;
    }

    /**
     * Sorts a multi-dimensional array by a certain column
     *
     * @param  array  $array     The source array
     * @param  string $field     The name of the column
     * @param  string $direction Order type DESC (descending) or ASC (ascending)
     * @param  const  $method    A PHP sort method flag or 'natural' for natural sorting, which is not supported in PHP by sort flags
     * @return array
     */
     public function sort(array $array, string $field, string $direction = 'ASC', $method = SORT_REGULAR) : array
     {
         return Arr::sort($array, $field, $direction, $method);
     }


    /**
     * Sets an array value using "dot notation".
     *
     * @access  public
     * @param   array    $array  Array you want to modify
     * @param   string   $path   Array path
     * @param   mixed    $value  Value to set
     */
    public function set(array &$array, string $path, $value)
    {
        Arr::set($array, $path, $value);
        return $array;
    }

    /**
     * Returns value from array using "dot notation".
     * If the key does not exist in the array, the default value will be returned instead.
     *
     * @param  array  $array   Array to extract from
     * @param  string $path    Array path
     * @param  mixed  $default Default value
     * @return mixed
     */
    public function get(array $array, string $path, $default = null)
    {
        return Arr::get($array, $path, $default);
    }

    /**
     * Deletes an array value using "dot notation".
     *
     * @access  public
     * @param  array   $array Array you want to modify
     * @param  string  $path  Array path
     * @return bool
     */
    public function delete(array &$array, string $path) : bool
    {
        Arr::delete($array, $path);
        return $array;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  array   $array The search array
     * @param  mixed   $path  Array path
     * @return bool
     */
    public function keyExists(array $array, $path) : bool
    {
        return Arr::keyExists($array, $path);
    }

    /**
     * Returns a random value from an array.
     *
     * @access  public
     * @param  array $array Array path
     * @return mixed
     */
    public function random(array $array)
    {
        return Arr::random($array);
    }

    /**
     * Returns TRUE if the array is associative and FALSE if not.
     *
     * @param  array   $array Array to check
     * @return bool
     */
    public function isAssoc(array $array) : bool
    {
        return Arr::isAssoc($array);
    }

    /**
     * Converts an array to a JSON string
     *
     * @param   array   $array The source array
     * @return  string  The JSON string
     */
    public function toJson(array $array, int $options = 0, int $depth = 512) : string
    {
        return Arr::toJson($array, $options, $depth);
    }

    /**
     * Create an new Array from JSON string.
     *
     * @param string $json The JSON string
     * @return array
     */
    public function createFromJson(string $json, bool $assoc = true, int $depth = 512 , int $options = 0) : array
    {
        return Arr::createFromJson($json, $assoc, $depth, $options);
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
    public function createFromString(string $str, string $delimiter = null, string $regEx = null) : array
    {
        return Arr::createFromString($str, $delimiter, $regEx);
    }

    /**
     * Returns the first element of an array
     *
     * @param   array  $array The source array
     * @return  mixed  The first element
     */
    public function first(array $array)
    {
        return Arr::first($array);
    }

    /**
     * Returns the last element of an array
     *
     * @param   array  $array The source array
     * @return  mixed  The last element
     */
    public function last(array $array)
    {
        return Arr::last($array);
    }

    /**
    * Overwrites an array with values from input arrays.
    * Keys that do not exist in the first array will not be added!
    *
    * @param   array   $array1 master array
    * @param   array   $array2 input arrays that will overwrite existing values
    * @return  array
    */
    public function overwrite(array $array1, array $array2) : array
    {
        Arr::overwrite($array1, $array2);
    }

    /**
     * Returns the average value of the current array.
     *
     * @param  array $array Array
     * @param  int   $decimals The number of decimal-numbers to return.
     * @return int|double
     */
    public function average(array $array, int $decimals = 0)
    {
        return Arr::average($array, $decimals);
    }

    /**
     * Counts all elements in an array.
     *
     * @param array $array Array
     * @param int $mode [optional] If the optional mode parameter is set to
     *                  COUNT_RECURSIVE (or 1), count
     *                  will recursively count the array. This is particularly useful for
     *                  counting all the elements of a multidimensional array. count does not detect infinite recursion.
     *
     * @return int
     */
    public function size(array $array, int $mode = COUNT_NORMAL) : int
    {
        return Arr::size($array, $mode);
    }

    /**
     * Return an array with elements in reverse order.
     *
     * @param array $array Array
     * @param bool  $preserve_keys Default is false FALSE - numeric keys are preserved.
     *                             Non-numeric keys are not affected by this setting and will always be preserved.
     * @return array
     */
    public function reverse(array $array, bool $preserve_keys = false) : array
    {
        return Arr::reverse($array, $preserve_keys);
    }
}
