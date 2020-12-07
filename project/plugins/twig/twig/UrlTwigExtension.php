<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Slim\Http\Environment;
use Slim\Http\Uri;

class UrlTwigExtension extends AbstractExtension
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
            new \Twig\TwigFunction('url', [$this, 'url'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Get Site URL
     */
    public function url() : string
    {
        if (flextype('registry')->has('flextype.settings.url') && flextype('registry')->get('flextype.settings.url') != '') {
            return flextype('registry')->get('flextype.settings.url');
        } else {
            return Uri::createFromEnvironment(new Environment($_SERVER))->getBaseUrl();
        }
    }
}
