<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Filesystem;

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
     * @return array A list of file metadata.
     */
    public static function listContents(string $directory = '', bool $recursive = false)
    {
        $result = [];

        if (!is_dir($directory)) {
            return [];
        }

        $iterator = $recursive ? Filesystem::getRecursiveDirectoryIterator($directory) : Filesystem::getDirectoryIterator($directory);

        foreach ($iterator as $file) {
            $path = Filesystem::getFilePath($file);

            if (preg_match('#(^|/|\\\\)\.{1,2}$#', $path)) {
                continue;
            }

            $result[] = Filesystem::normalizeFileInfo($file);
        }

        return array_filter($result);
    }

    /**
     * Returns the mime type of a file. Returns false if the mime type is not found.
     *
     * @param  string  $file  Full path to the file
     * @param  bool    $guess Set to false to disable mime type guessing
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

        } else {

            // Just guess mime by using the file extension
            if ($guess === true) {
                $mime_types = Filesystem::$mime_types;

                $extension = pathinfo($file, PATHINFO_EXTENSION);

                return isset($mime_types[$extension]) ? $mime_types[$extension] : false;
            } else {
                return false;
            }
        }
    }

    /**
     * Get a file's timestamp.
     *
     * @param string $path The path to the file.
     * @return string|false The timestamp or false on failure.
     */
    public static function getTimestamp(string $path)
    {
        return Filesystem::getMetadata($path)['timestamp'];
    }

    /**
     * Get a file's size.
     *
     * @param string $path The path to the file.
     * @return int|false The file size or false on failure.
     */
    public static function getSize(string $path)
    {
        return Filesystem::getMetadata($path)['size'];
    }

    /**
     * Get a file's metadata.
     *
     * @param string $path The path to the file.
     * @return array|false The file metadata or false on failure.
     */
    public static function getMetadata(string $path)
    {
        $info = new \SplFileInfo($path);

        return Filesystem::normalizeFileInfo($info);
    }

    /**
     * Get a file's visibility.
     *
     * @param string $path The path to the file.
     * @return string|false The visibility (public|private) or false on failure.
     */
    public static function getVisibility(string $path)
    {
        clearstatcache(false, $path);
        $permissions = octdec(substr(sprintf('%o', fileperms($path)), -4));
        $visibility = $permissions & 0044 ? 'public' : 'private';

        return $visibility;
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path       The path to the file.
     * @param string $visibility One of 'public' or 'private'.
     * @return bool True on success, false on failure.
     */
    public static function setVisibility(string $path, string $visibility)
    {
        $type = is_dir($path) ? 'dir' : 'file';
        $success = chmod($path, Filesystem::$permissions[$type][$visibility]);

        if ($success === false) {
            return false;
        }

        return true;
    }

    /**
     * Delete a file.
     *
     * @param string $path
     * @return bool True on success, false on failure.
     */
    public static function delete(string $path)
    {
        return @unlink($path);
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     * @return bool True on success, false on failure.
     */
     public static function deleteDir(string $dirname) : bool
     {
         if (!is_dir($dirname)) {
             return false;
         }

         // Delete dir
         if (is_dir($dirname)) {
             $ob = scandir($dirname);
             foreach ($ob as $o) {
                 if ($o != '.' && $o != '..') {
                     if (filetype($dirname.'/'.$o) == 'dir') {
                         Filesystem::deleteDir($dirname.'/'.$o);
                     } else {
                         unlink($dirname.'/'.$o);
                     }
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
     * @param string $dirname     The name of the new directory.
     * @param string  $visibility  Visibility
     * @return bool True on success, false on failure.
     */
    public static function createDir(string $dirname, string $visibility = 'public')
    {
        $umask = umask(0);

        if (!is_dir($dirname) && !mkdir($dirname, Filesystem::$permissions['dir'][$visibility], true)) {
            return false;
        }

        umask($umask);

        return true;
    }

    /**
     * Copy a file(s).
     *
     * @param string $path       Path to the existing file.
     * @param string $newpath    The new path of the file.
     * @param bool   $recursive  Recursive copy files.
     * @return bool True on success, false on failure.
     */
    public static function copy(string $path, string $newpath, bool $recursive = false)
    {
        if ($recursive) {

            if (!Filesystem::has($newpath)) {
                mkdir($newpath);
            }

            $splFileInfoArr = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);

            foreach ($splFileInfoArr as $fullPath => $splFileinfo) {
                //skip . ..
                if (in_array($splFileinfo->getBasename(), [".", ".."])) {
                    continue;
                }

                //get relative path of source file or folder
                $_path = str_replace($path, "", $splFileinfo->getPathname());

                if ($splFileinfo->isDir()) {
                    mkdir($newpath."/".$_path);
                } else {
                    copy($fullPath, $newpath."/".$_path);
                }
            }
        } else {
            return copy($path, $newpath);
        }
    }

    /**
     * Rename a file.
     *
     * @param string $path    Path to the existing file.
     * @param string $newpath The new path of the file.
     * @return bool True on success, false on failure.
     */
    public static function rename(string $path, string $newpath)
    {
        return rename($path, $newpath);
    }

    /**
     * Write a file.
     *
     * @param string  $path           The path of the new file.
     * @param string  $contents       The file contents.
     * @param string  $visibility     An optional configuration array.
     * @param int     $flags          Flags
     * @return bool True on success, false on failure.
     */
    public static function write(string $path, string $contents, string $visibility = 'public', int $flags = LOCK_EX)
    {
        if (file_put_contents($path, $contents, $flags) === false) {
            return false;
        }

        Filesystem::setVisibility($path, $visibility);

        return true;
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     * @return bool
     */
    public static function has(string $path)
    {
        return file_exists($path);
    }

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     * @return string|false The file contents or false on failure.
     */
    public static function read($path)
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
     * @param \SplFileInfo $file
     * @return array|void
     */
    protected static function normalizeFileInfo(\SplFileInfo $file)
    {
        return Filesystem::mapFileInfo($file);
    }

    /**
     * @param \SplFileInfo $file
     * @return array
     */
    protected static function mapFileInfo(\SplFileInfo $file)
    {
        $normalized = [
            'type' => $file->getType(),
            'path' => Filesystem::getFilePath($file),
        ];

        $normalized['timestamp'] = $file->getMTime();

        if ($normalized['type'] === 'file') {
            $normalized['size'] = $file->getSize();
            $normalized['filename'] = $file->getFilename();
            $normalized['basename'] = $file->getBasename('.'.$file->getExtension());
            $normalized['extension'] = $file->getExtension();
        }

        if ($normalized['type'] === 'dir') {
            $normalized['dirname'] = $file->getFilename();
        }

        return $normalized;
    }

    /**
     * Get the normalized path from a SplFileInfo object.
     *
     * @param \SplFileInfo $file
     * @return string
     */
    protected static function getFilePath(\SplFileInfo $file)
    {
        $path = $file->getPathname();

        $path = trim(str_replace('\\', '/', $path));

        return $path;
    }

    /**
     * @param string $path
     * @param int    $mode
     * @return \RecursiveIteratorIterator
     */
    protected static function getRecursiveDirectoryIterator(string $path, int $mode = \RecursiveIteratorIterator::SELF_FIRST)
    {
        return new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
            $mode
        );
    }

    /**
     * @param string $path
     * @return \DirectoryIterator
     */
    protected static function getDirectoryIterator(string $path)
    {
        $iterator = new \DirectoryIterator($path);

        return $iterator;
    }
}
