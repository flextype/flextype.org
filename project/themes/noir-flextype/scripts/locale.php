<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir\Scripts;

use Slim\Http\Environment;
use Slim\Http\Uri;
use Twig\Extension\AbstractExtension;

class LocaleTwigExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('locale', [$this, 'locale']),
        ];
    }

    public function locale() : string
    {
        $uri = Uri::createFromEnvironment(new Environment($_SERVER))->getPath();
        $locale = explode('/', $uri)[0];
        $locale = empty($locale) ? 'en' : $locale;
        return $locale;
    }
}

flextype('twig')->addExtension(new LocaleTwigExtension());
