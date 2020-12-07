<?php

declare(strict_types=1);

namespace Atomastic\Filesystem;

use Symfony\Component\Finder\Finder;
use Atomastic\Macroable\Macroable;

use function chmod;
use function fileperms;
use function glob;
use function preg_match;
use function sprintf;
use function strpos;
use function substr;

class Filesystem
{
    use Macroable;
    
    /**
     * Create a Finder instance.
     */
    public function find(): Finder
    {
        return new Finder();
    }

    /**
     * Create a File instance.
     */
    public function file($path): File
    {
        return new File($path);
    }

    /**
     * Create a Directory instance.
     */
    public function directory($path): Directory
    {
        return new Directory($path);
    }

    /**
     * Determine if the given path is a stream path.
     *
     * @param  string $path Path to check.
     *
     * @return bool Returns TRUE if the given path is stream path, FALSE otherwise.
     */
    public function isStream(string $path): bool
    {
        return strpos($path, '://') !== false;
    }

   /**
    * Determine if the given path is absolute path.
    *
    * @param  string $path Path to check.
    *
    * @return bool Returns TRUE if the given path is absolute path, FALSE otherwise.
    */
    public function isAbsolute(string $path): bool
    {
        return (bool) preg_match('#([a-z]:)?[/\\\\]|[a-z][a-z0-9+.-]*://#Ai', $path);
    }

    /**
     * Determine if the given path is a Windows path.
     *
     * @param  string $path Path to check.
     *
     * @return bool true if windows path, false otherwise
     */
    public function isWindowsPath(string $path): bool
    {
        return preg_match('/^[A-Z]:\\\\/i', $path) || substr($path, 0, 2) === '\\\\';
    }

    /**
     * Find path names matching a given pattern.
     *
     * @param  string $pattern The pattern.
     * @param  int    $flags   Valid flags.
     *
     * @return array Returns an array containing the matched files/directories, an empty array if no file matched.
     */
    public function glob(string $pattern, int $flags = 0): array
    {
        return glob($pattern, $flags);
    }
}
