<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir\Scripts;

use Slim\Http\Environment;
use Slim\Http\Uri;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Atomastic\Arrays\Arrays;

class Blog {

}

class BlogTwigExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        return [
            'blog' => new Blog()
        ];
    }
}

flextype('twig')->addExtension(new BlogTwigExtension());
