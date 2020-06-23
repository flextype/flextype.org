<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype;

use Twig_Extension;
use Twig_Extension_GlobalsInterface;

class RegistryTwigExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
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
            'registry' => new RegistryTwig($this->flextype),
        ];
    }
}

class RegistryTwig
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
     * Get registry array
     *
     * @return array
     */
    public function dump() : array
    {
        return $this->flextype['registry']->dump();
    }

    /**
     * Checks if an object with this name is in the registry.
     *
     * @param  string $name The name of the registry item to check for existence.
     * @return bool
     */
    public function has(string $name) : bool
    {
        return $this->flextype['registry']->has($name);
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
        $this->flextype['registry']->set($name, $value);
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
        return $this->flextype['registry']->get($name, $default);
    }
}
