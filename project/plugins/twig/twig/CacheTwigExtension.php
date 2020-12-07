<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class CacheTwigExtension extends AbstractExtension implements GlobalsInterface
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
            'cache' => flextype('cache'),
        ];
    }
}
