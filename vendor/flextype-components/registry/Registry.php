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

use Flextype\Component\Arr\Arr;

class Registry
{
    /**
     * Registry of variables
     *
     * @var array
     */
    private static $registry = [];

    /**
     * Checks if an object with this name is in the registry.
     *
     * if (Registry::exists('var')) {
     *     // Do something...
     * }
     *
     * @param  string $name The name of the registry item to check for existence.
     * @return bool
     */
    public static function exists(string $name) : bool
    {
        if (Arr::keyExists(Registry::$registry, $name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Registers a given value under a given name.
     *
     * Registry::set('var', 'value');
     *
     * @param  string          $name  The name of the value to store.
     * @param  mixed $value The value that needs to be stored.
     * @return void
     */
    public static function set(string $name, $value = null) : void
    {
        Arr::set(Registry::$registry, $name, $value);
    }

    /**
     * Fetch an item from the registry.
     *
     * $var = Registry::get('var', 'value');
     *
     * @param  string $name The name of the item to fetch.
     * @param  mixed  $default Default value
     * @return mixed
     */
    public static function get(string $name, $default = null)
    {
        if ( ! Registry::exists($name)) {
            throw new \RuntimeException('No item "' . $name . '" exists in the registry.');
        }

        return Arr::get(Registry::$registry, $name, $default);
    }

}
