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

namespace Flextype\Component\Debug;

class Debug
{
    /**
     * Time
     *
     * @var array
     */
    protected static $time = [];

    /**
     * Memory
     *
     * @var array
     */
    protected static $memory = [];

    /**
     * Save current time for current point
     *
     * Debug::elapsedTimeSetPoint('point_name');
     *
     * @param string $point_name Point name
     */
    public static function elapsedTimeSetPoint(string $point_name) : void
    {
        Debug::$time[$point_name] = microtime(true);
    }

    /**
     * Get elapsed time for current point
     *
     * echo Debug::elapsedTime('point_name');
     *
     * @param  string $point_name Point name
     * @return string
     */
    public static function elapsedTime(string $point_name) : string
    {
        if (isset(Debug::$time[$point_name])) return sprintf("%01.4f", microtime(true) - Debug::$time[$point_name]);
    }

    /**
     * Save current memory for current point
     *
     * Debug::memoryUsageSetPoint('point_name');
     *
     * @param string $point_name Point name
     */
    public static function memoryUsageSetPoint(string $point_name) : void
    {
        Debug::$memory[$point_name] = memory_get_usage();
    }

    /**
     * Get memory usage for current point
     *
     * echo Debug::memoryUsage('point_name');
     *
     * @param  string $point_name Point name
     * @return string
     */
    public static function memoryUsage(string $point_name) : string
    {
        if (isset(Debug::$memory[$point_name])) {
            $unit = array('B', 'KB', 'MB', 'GB', 'TiB', 'PiB');
            $size = memory_get_usage() - Debug::$memory[$point_name];
            $memory_usage = @round($size/pow(1024, ($i=floor(log($size, 1024)))), 2).' '.$unit[($i < 0 ? 0 : $i)];
            return $memory_usage;
        }
    }

    /**
     * Print the variable $data and exit if exit = true
     *
     * Debug::dump($data);
     *
     * @param mixed   $data Data
     * @param bool    $exit Exit
     */
    public static function dump($data, bool $exit = false) : void
    {
        echo "<pre>dump \n---------------------- \n\n" . print_r($data, true) . "\n----------------------</pre>";
        if ($exit) exit;
    }
}
