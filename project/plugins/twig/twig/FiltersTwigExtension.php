<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;

class FiltersTwigExtension extends AbstractExtension
{
    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array
     */
    public function getFilters() : array
    {
        return [
            new \Twig\TwigFilter('shortcode', [$this, 'shortcode']),
            new \Twig\TwigFilter('markdown', [$this, 'markdown']),
        ];
    }

    public function shortcode($value) : string
    {
        return !empty($value) ? flextype('parsers')->shortcode()->process($value) : '';
    }

    public function markdown($value) : string
    {
        return !empty($value) ? flextype('parsers')->markdown()->parse($value) : '';
    }
}
