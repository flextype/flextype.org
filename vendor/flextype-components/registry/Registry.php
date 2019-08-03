<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <hello@romanenko.digital>
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
    private $registry = [];

    /**
     * Get registry array
     *
     * @return array
     */
    public function dump() : array
    {
        return $this->registry;
    }

    /**
     * Checks if an object with this name is in the registry.
     *
     * @param  string $name The name of the registry item to check for existence.
     * @return bool
     */
    public function has(string $name) : bool
    {
        if (Arr::keyExists($this->registry, $name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Registers a given value under a given name.
     *
     * @param  string $name  The name of the value to store.
     * @param  mixed  $value The value that needs to be stored.
     * @return void
     */
    public function set(string $name, $value = null) : void
    {
        Arr::set($this->registry, $name, $value);
    }

    /**
     * Get item from the registry.
     *
     * @param  string $name The name of the item to fetch.
     * @param  mixed  $default Default value
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        if ( ! $this->has($name)) {
            throw new \RuntimeException('No item "' . $name . '" exists in the registry.');
        }

        return Arr::get($this->registry, $name, $default);
    }

}
