<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir\Scripts;

use Twig\Extension\AbstractExtension;

class DumpExtension extends AbstractExtension
{
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('dump', 'var_dump'),
        ];
    }
}

flextype('twig')->addExtension(new DumpExtension());
