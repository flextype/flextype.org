<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;

class JsonTwigExtension extends AbstractExtension
{
    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('json_decode', [$this, 'decode']),
            new \Twig\TwigFunction('json_encode', [$this, 'encode']),
        ];
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array
     */
    public function getFilters() : array
    {
        return [
            new \Twig\TwigFilter('json_decode', [$this, 'decode']),
            new \Twig\TwigFilter('json_encode', [$this, 'encode']),
        ];
    }

    /**
     * Encode JSON
     */
    public function encode($input) : string
    {
        return flextype('json')->encode($input);
    }

    /**
     * Decode JSON
     */
    public function decode(string $input, bool $cache = true)
    {
        return flextype('json')->decode($input, $cache);
    }
}
