<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir\Scripts;

use Slim\Http\Environment;
use Slim\Http\Uri;
use Twig\Extension\AbstractExtension;

class TokensTwigExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new \Twig\TwigFunction('tokens', [$this, 'tokens']),
        ];
    }

    public function tokens(): array
    {
        $tokens['entries']['uuid']  = bin2hex(random_bytes(16));
        $tokens['registry']['uuid'] = bin2hex(random_bytes(16));
        $tokens['files']['uuid'] = bin2hex(random_bytes(16));
        $tokens['folders']['uuid'] = bin2hex(random_bytes(16));
        $tokens['images']['uuid'] = bin2hex(random_bytes(16));
        $tokens['access']['uuid'] = bin2hex(random_bytes(16));

        return $tokens;
    }
}

flextype('twig')->addExtension(new TokensTwigExtension());
