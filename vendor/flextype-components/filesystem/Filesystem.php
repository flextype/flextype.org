<?php

declare(strict_types=1);

/**
 * Filesystem Component
 * Founded by Sergey Romanenko and maintained by Community.
 */

namespace Flextype\Component\Filesystem;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use const FILEINFO_MIME_TYPE;
use const PATHINFO_EXTENSION;
use function array_filter;
use function chmod;
use function clearstatcache;
use function fileperms;
use function filetype;
use function finfo_close;
use function finfo_file;
use function finfo_open;
use function function_exists;
use function is_dir;
use function octdec;
use function pathinfo;
use function preg_match;
use function scandir;
use function sprintf;
use function substr;
use function unlink;
use function reset;

class Filesystem
{
    /**
     * Permissions
     *
     * @var array
     */
    protected static $permissions = [
        'file' => [
            'public'  => 0644,
            'private' => 0600,
        ],
        'dir'  => [
            'public'  => 0755,
            'private' => 0700,
        ],
    ];

    /**
     * Mime type list
     *
     * @var array
     */
    public static $mime_types = [
        'aac'        => 'audio/aac',
        'atom'       => 'application/atom+xml',
        'avi'        => 'video/avi',
        'bmp'        => 'image/x-ms-bmp',
        'c'          => 'text/x-c',
        'class'      => 'application/octet-stream',
        'css'        => 'text/css',
        'csv'        => 'text/csv',
        'deb'        => 'application/x-deb',
        'dll'        => 'application/x-msdownload',
        'dmg'        => 'application/x-apple-diskimage',
        'doc'        => 'application/msword',
        'docx'       => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'exe'        => 'application/octet-stream',
        'flv'        => 'video/x-flv',
        'gif'        => 'image/gif',
        'gz'         => 'application/x-gzip',
        'h'          => 'text/x-c',
        'htm'        => 'text/html',
        'html'       => 'text/html',
        'ini'        => 'text/plain',
        'jar'        => 'application/java-archive',
        'java'       => 'text/x-java',
        'jpeg'       => 'image/jpeg',
        'jpg'        => 'image/jpeg',
        'js'         => 'text/javascript',
        'json'       => 'application/json',
        'mid'        => 'audio/midi',
        'midi'       => 'audio/midi',
        'mka'        => 'audio/x-matroska',
        'mkv'        => 'video/x-matroska',
        'mp3'        => 'audio/mpeg',
        'mp4'        => 'application/mp4',
        'mpeg'       => 'video/mpeg',
        'mpg'        => 'video/mpeg',
        'odt'        => 'application/vnd.oasis.opendocument.text',
        'ogg'        => 'audio/ogg',
        'pdf'        => 'application/pdf',
        'php'        => 'text/x-php',
        'png'        => 'image/png',
        'psd'        => 'image/vnd.adobe.photoshop',
        'py'         => 'application/x-python',
        'ra'         => 'audio/vnd.rn-realaudio',
        'ram'        => 'audio/vnd.rn-realaudio',
        'rar'        => 'application/x-rar-compressed',
        'rss'        => 'application/rss+xml',
        'safariextz' => 'application/x-safari-extension',
        'sh'         => 'text/x-shellscript',
        'shtml'      => 'text/html',
        'swf'        => 'application/x-shockwave-flash',
        'tar'        => 'application/x-tar',
        'tif'        => 'image/tiff',
        'tiff'       => 'image/tiff',
        'torrent'    => 'application/x-bittorrent',
        'txt'        => 'text/plain',
        'wav'        => 'audio/wav',
        'webp'       => 'image/webp',
        'wma'        => 'audio/x-ms-wma',
        'xls'        => 'application/vnd.ms-excel',
        'xml'        => 'text/xml',
        'zip'        => 'application/zip',
    ];

    /**
     * List contents of a directory.
     *
     * @param string $directory The directory to list.
     * @param bool   $recursive Whether to list recursively.
     *
     * @return array A list of file metadata.
     */
    public static function listContents(string $directory = '', bool $recursive = false) : array
    {
        $result = [];

        if (! is_dir($directory)) {
            return [];
        }

        $iterator = $recursive ? self::getRecursiveDirectoryIterator($directory) : self::getDirectoryIterator($directory);

        foreach ($iterator as $file) {
            $path = self::getFilePath($file);

            if (preg_match('#(^|/|\\\\)\.{1,2}$#', $path)) {
                continue;
            }

            $result[] = self::normalizeFileInfo($file);
        }

        return array_filter($result);
    }

    /**
     * Get directory timestamp
     *
     * @param string $directory The directory
     *
     * @return int directory timestamp
     */
    public static function getDirTimestamp(string $directory) : int
    {
        $_directory  = new RecursiveDirectoryIterator(
            $directory,
            FilesystemIterator::KEY_AS_PATHNAME |
            FilesystemIterator::CURRENT_AS_FILEINFO |
            FilesystemIterator::SKIP_DOTS
        );
        $_iterator   = new RecursiveIteratorIterator(
            $_directory,
            RecursiveIteratorIterator::SELF_FIRST
        );
        $_resultFile = $_iterator->current();
        foreach ($_iterator as $file) {
            if ($file->getMtime() <= $_resultFile->getMtime()) {
                continue;
            }

            $_resultFile = $file;
        }

        return $_resultFile->getMtime();
    }

    /**
     * Returns the mime type of a file. Returns false if the mime type is not found.
     *
     * @param  string $file  Full path to the file
     * @param  bool   $guess Set to false to disable mime type guessing
     *
     * @return mixed
     */
    public static function getMimeType(string $file, bool $guess = true)
    {
        // Get mime using the file information functions
        if (function_exists('finfo_open')) {
            $info = finfo_open(FILEINFO_MIME_TYPE);

            $mime = finfo_file($info, $file);

            finfo_close($info);

            return $mime;
        }

        // Just guess mime by using the file extension
        if ($guess === true) {
            $mime_types = self::$mime_types;

            $extension = pathinfo($file, PATHINFO_EXTENSION);

            return $mime_types[$extension] ?? false;
        }

        return false;
    }

    /**
     * Get a file's timestamp.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The timestamp or false on failure.
     */
    public static function getTimestamp(string $path)
    {
        return self::getMetadata($path)['timestamp'];
    }

    /**
     * Get a file's size.
     *
     * @param string $path The path to the file.
     *
     * @return int|false The file size or false on failure.
     */
    public static function getSize(string $path)
    {
        return self::getMetadata($path)['size'];
    }

    /**
     * Get a file's metadata.
     *
     * @param string $path The path to the file.
     *
     * @return array|false The file metadata or false on failure.
     */
    public static function getMetadata(string $path)
    {
        $info = new SplFileInfo($path);

        return self::normalizeFileInfo($info);
    }

    /**
     * Get a file's visibility.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The visibility (public|private) or false on failure.
     */
    public static function getVisibility(string $path)
    {
        clearstatcache(false, $path);
        $permissions = octdec(substr(sprintf('%o', fileperms($path)), -4));

        return $permissions & 0044 ? 'public' : 'private';
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path       The path to the file.
     * @param string $visibility One of 'public' or 'private'.
     *
     * @return bool True on success, false on failure.
     */
    public static function setVisibility(string $path, string $visibility) : bool
    {
        $type    = is_dir($path) ? 'dir' : 'file';
        $success = chmod($path, self::$permissions[$type][$visibility]);

        return $success !== false;
    }

    /**
     * Delete a file.
     *
     * @return bool True on success, false on failure.
     */
    public static function delete(string $path) : bool
    {
        return @unlink($path);
    }

    /**
     * Delete a directory.
     *
     * @return bool True on success, false on failure.
     */
    public static function deleteDir(string $dirname) : bool
    {
        if (! is_dir($dirname)) {
            return false;
        }

        // Delete dir
        if (is_dir($dirname)) {
            $ob = scandir($dirname);
            foreach ($ob as $o) {
                if ($o === '.' || $o === '..') {
                    continue;
                }

                if (filetype($dirname . '/' . $o) === 'dir') {
                    self::deleteDir($dirname . '/' . $o);
                } else {
                    unlink($dirname . '/' . $o);
                }
            }
        }

        reset($ob);
        rmdir($dirname);

        return true;
    }

    /**
     * Create a directory.
     *
     * @param string $dirname    The name of the new directory.
     * @param string $visibility Visibility
     *
     * @return bool True on success, false on failure.
     */
    public static function createDir(string $dirname, string $visibility = 'public') : bool
    {
        $umask = umask(0);

        if (! is_dir($dirname) && ! mkdir($dirname, self::$permissions['dir'][$visibility], true)) {
            return false;
        }

        umask($umask);

        return true;
    }

    /**
     * Copy a file(s).
     *
     * @param string $path      Path to the existing file.
     * @param string $newpath   The new path of the file.
     * @param bool   $recursive Recursive copy files.
     *
     * @return bool True on success, false on failure.
     */
    public static function copy(string $path, string $newpath, bool $recursive = false)
    {
        if (! $recursive) {
            return copy($path, $newpath);
        }

        if (! self::has($newpath)) {
            mkdir($newpath);
        }

        $splFileInfoArr = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($splFileInfoArr as $fullPath => $splFileinfo) {
            //skip . ..
            if (in_array($splFileinfo->getBasename(), ['.', '..'])) {
                continue;
            }

            //get relative path of source file or folder
            $_path = str_replace($path, '', $splFileinfo->getPathname());

            if ($splFileinfo->isDir()) {
                mkdir($newpath . '/' . $_path);
            } else {
                copy($fullPath, $newpath . '/' . $_path);
            }
        }
    }

    /**
     * Rename a file.
     *
     * @param string $path    Path to the existing file.
     * @param string $newpath The new path of the file.
     *
     * @return bool True on success, false on failure.
     */
    public static function rename(string $path, string $newpath) : bool
    {
        return rename($path, $newpath);
    }

    /**
     * Write a file.
     *
     * @param string $path       The path of the new file.
     * @param string $contents   The file contents.
     * @param string $visibility An optional configuration array.
     * @param int    $flags      Flags
     *
     * @return bool True on success, false on failure.
     */
    public static function write(string $path, string $contents, string $visibility = 'public', int $flags = LOCK_EX) : bool
    {
        if (file_put_contents($path, $contents, $flags) === false) {
            return false;
        }

        self::setVisibility($path, $visibility);

        return true;
    }

    /**
     * Check whether a file exists.
     */
    public static function has(string $path) : bool
    {
        return file_exists($path);
    }

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The file contents or false on failure.
     */
    public static function read(string $path)
    {
        $contents = file_get_contents($path);

        if ($contents === false) {
            return false;
        }

        return $contents;
    }

    /**
     * Normalize the file info.
     *
     * @return array|void
     */
    protected static function normalizeFileInfo(SplFileInfo $file)
    {
        return self::mapFileInfo($file);
    }

    /**
     * @return array
     */
    protected static function mapFileInfo(SplFileInfo $file) : array
    {
        $normalized = [
            'type' => $file->getType(),
            'path' => self::getFilePath($file),
        ];

        $normalized['timestamp'] = $file->getMTime();

        if ($normalized['type'] === 'file') {
            $normalized['size']      = $file->getSize();
            $normalized['filename']  = $file->getFilename();
            $normalized['basename']  = $file->getBasename('.' . $file->getExtension());
            $normalized['extension'] = $file->getExtension();
        }

        if ($normalized['type'] === 'dir') {
            $normalized['dirname'] = $file->getFilename();
        }

        return $normalized;
    }

    /**
     * Get the normalized path from a SplFileInfo object.
     */
    protected static function getFilePath(SplFileInfo $file) : string
    {
        $path = $file->getPathname();

        $path = trim(str_replace('\\', '/', $path));

        return $path;
    }

    protected static function getRecursiveDirectoryIterator(string $path, int $mode = RecursiveIteratorIterator::SELF_FIRST) : RecursiveIteratorIterator
    {
        return new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
            $mode
        );
    }

    protected static function getDirectoryIterator(string $path) : \DirectoryIterator
    {
        return new \DirectoryIterator($path);
    }
}
