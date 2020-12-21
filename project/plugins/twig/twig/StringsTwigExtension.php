<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Atomastic\Strings\Strings;
use Twig\Extension\AbstractExtension;

class StringsTwigExtension extends AbstractExtension
{
    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('strings', [$this, 'strings']),
        ];
    }

    /**
     * Create a new stringable object from the given string.
     *
     * Initializes a Strings object and assigns both $string and $encoding properties
     * the supplied values. $string is cast to a string prior to assignment. Throws
     * an InvalidArgumentException if the first argument is an array or object
     * without a __toString method.
     *
     * @param mixed  $string   Value to modify, after being cast to string. Default: ''
     * @param mixed  $encoding The character encoding. Default: UTF-8
     */
    function strings($string = '', $encoding = 'UTF-8'): Strings
    {
        return new Strings($string, $encoding);
    }
}
