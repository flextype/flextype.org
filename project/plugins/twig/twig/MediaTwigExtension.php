<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Atomastic\Arrays\Arrays;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class MediaTwigExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * Register Global variables in an extension
     */
    public function getGlobals(): array
    {
        return [
            'media' => new MediaTwig(),
        ];
    }
}

class MediaTwig
{
    /**
     * Create a Media Files instance.
     */
    public function files(): MediaFiles
    {
        return new MediaTwigFiles();
    }

    /**
     * Create a Media Files instance.
     */
    public function folders(): MediaFolders
    {
        return new MediaTwigFolders();
    }
}

class MediaTwigFiles
{
    public function meta(): MediaTwigFilesMeta
    {
        return new MediaTwigFilesMeta();
    }

    public function fetch(string $path, array $options = []): Arrays
    {
        return flextype('media')->files()->fetch($path, $options);
    }

    public function has(string $path): bool
    {
        return flextype('media')->files()->has($path);
    }

    public function getFileLocation(string $path): bool
    {
        return flextype('media')->files()->getFileLocation($path);
    }
}


class MediaTwigFilesMeta
{
    public function getFileMetaLocation(string $path): bool
    {
        return flextype('media')->files()->meta()->getFileMetaLocation($path);
    }
}

class MediaTwigFolders
{
    public function meta(): MediaTwigFoldersMeta
    {
        return new MediaTwigFoldersMeta();
    }

    public function fetch(string $path, array $options = []): Arrays
    {
        return flextype('media')->folders()->fetch($path, $options);
    }

    public function has(string $path): bool
    {
        return flextype('media')->folders()->has($path);
    }

    public function getDirectoryLocation(string $path): bool
    {
        return flextype('media')->folders()->getDirectoryLocation($path);
    }
}


class MediaTwigFoldersMeta
{
    public function getDirectoryMetaLocation(string $path): bool
    {
        return flextype('media')->folders()->meta()->getDirectoryMetaLocation($path);
    }
}
