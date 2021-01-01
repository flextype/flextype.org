<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use const PHP_VERSION;

class ConstantsTwigExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * Register Global variables in an extension
     */
    public function getGlobals() : array
    {
        return [
            'PATH_PROJECT' => PATH['project'],
            'PHP_VERSION' => PHP_VERSION,
        ];
    }
}
