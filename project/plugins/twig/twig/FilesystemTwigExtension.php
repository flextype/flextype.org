<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Flextype\Component\Filesystem\Filesystem;
use Twig\Extension\AbstractExtension;
use function basename;
use function strrchr;
use function substr;

class FilesystemTwigExtension extends AbstractExtension
{
    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new \Twig\TwigFunction('filesystem_list_contents', [$this, 'list_contents']),
            new \Twig\TwigFunction('filesystem_has', [$this, 'has']),
            new \Twig\TwigFunction('filesystem_read', [$this, 'read']),
            new \Twig\TwigFunction('filesystem_ext', [$this, 'ext']),
            new \Twig\TwigFunction('filesystem_basename', [$this, 'basename']),
        ];
    }

    public function list_contents(string $directory = '', bool $recursive = false)
    {
        return Filesystem::listContents($directory, $recursive);
    }

    public function has($path)
    {
        return Filesystem::has($path);
    }

    public function read($path)
    {
        return Filesystem::read($path);
    }

    public function ext($file)
    {
        return substr(strrchr($file, '.'), 1);
    }

    public function basename($value, $suffix = '')
    {
        return basename($value, $suffix);
    }
}
