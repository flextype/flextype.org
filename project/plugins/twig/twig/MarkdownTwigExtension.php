<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;

class MarkdownTwigExtension extends AbstractExtension
{
    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array
     */
    public function getFilters() : array
    {
        return [
            new \Twig\TwigFilter('markdown', [$this, 'markdown']),
        ];
    }

    /**
     * Markdown process
     */
    public function markdown($input, bool $cache = true) : string
    {
        if (!empty($input)) {
            return flextype('parsers')->markdown()->parse($input, $cache);
        }

        return '';
    }
}
