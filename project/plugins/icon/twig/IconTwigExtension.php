<?php

declare(strict_types=1);

/**
 * Flextype (http://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Icon\Twig;

use Twig\Extension\AbstractExtension;
use Flextype\Plugin\Icon\Models\Icon;

class IconTwigExtension extends AbstractExtension
{
    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('icon', [$this, 'icon'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Get Icon
     */
    public function icon(string $value = null) : string
    {
        return Icon::icon($value);
    }
}
