<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class RegistryTwigExtension extends AbstractExtension implements GlobalsInterface
{

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Register Global variables in an extension
     */
    public function getGlobals() : array
    {
        return [
            'registry' => new RegistryTwig(),
        ];
    }
}

class RegistryTwig
{
    /**
     * Flextype Application
     */


    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Get registry array
     *
     * @return array
     */
    public function dump() : array
    {
        return flextype('registry')->dump();
    }

    /**
     * Checks if an object with this name is in the registry.
     *
     * @param  string $name The name of the registry item to check for existence.
     * @return bool
     */
    public function has(string $name) : bool
    {
        return flextype('registry')->has($name);
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
        flextype('registry')->set($name, $value);
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
        return flextype('registry')->get($name, $default);
    }
}
