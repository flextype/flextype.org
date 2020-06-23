<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype;

use Twig_Extension;
use Twig_SimpleFunction;

class SerializerTwigExtension extends Twig_Extension
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
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new Twig_SimpleFunction('serializer_decode', [$this, 'decode']),
            new Twig_SimpleFunction('serializer_encode', [$this, 'encode']),
            new Twig_SimpleFunction('serializer_get_info', [$this, 'getSerializerInfo']),
        ];
    }

    /**
     * Get Serializer Info
     */
    public function getSerializerInfo(string $parser) : array
    {
        return $this->flextype['serializer']->getSerializerInfo($parser);
    }

    /**
     * Encode
     */
    public function encode($input, string $parser)
    {
        return $this->flextype['serializer']->encode($input, $parser);
    }

    /**
     * Decode
     */
    public function decode(string $input, string $parser, bool $cache = true)
    {
        return $this->flextype['serializer']->decode($input, $parser, $cache);
    }
}
