<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Atomastic\Arrays\Arrays;
use Twig\Extension\AbstractExtension;

class ArraysTwigExtension extends AbstractExtension
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
            new \Twig\TwigFunction('arrays', [$this, 'arrays']),
        ];
    }

    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $items the supplied values.
     *
     * @param  mixed $items Items
     *
     * @return Atomastic\Arrays\Arrays<Arrays>
     */
    function arrays($items = []): Arrays
    {
        return Arrays::create($items);
    }
}
