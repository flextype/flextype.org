<?php

declare(strict_types=1);

namespace Atomastic\Filesystem;

use ErrorException as IOException;

use function copy;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function fileatime;
use function filemtime;
use function filesize;
use function filetype;
use function finfo_file;
use function finfo_open;
use function is_file;
use function is_readable;
use function is_writable;
use function md5_file;
use function pathinfo;
use function rename;
use function unlink;

use const FILE_APPEND;
use const FILEINFO_MIME_TYPE;
use const LOCK_EX;
use const PATHINFO_BASENAME;
use const PATHINFO_EXTENSION;
use const PATHINFO_FILENAME;

class File
{
    /**
     * Path property
     *
     * Current file absolute path
     *
     * @var string|null
     */
    public $path;

    /**
     * Constructor
     *
     * @param string $path Path to file.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Write the contents of a file.
     *
     * @param  string $data The data to write.
     * @param  bool   $lock Acquire an exclusive lock on the file while proceeding to the writing.
     *
     * @return int|bool Returns the number of bytes that were written to the file, or FALSE on failure.
     */
    public function put(string $data, bool $lock = false)
    {
        return file_put_contents($this->path, $data, $lock ? LOCK_EX : 0);
    }

    /**
     * Get the contents of a file.
     *
     * @return string|false The file contents or false on failure.
     */
    public function get()
    {
        $contents = file_get_contents($this->path);

        if ($contents === false) {
            return false;
        }

        return $contents;
    }

    /**
     * Prepend to a file.
     *
     * @param  string $data The data to write.
     *
     * @return int|bool Returns the number of bytes that were written to the file, or FALSE on failure.
     */
    public function prepend(string $data)
    {
        if ($this->exists($this->path)) {
            return $this->put($data . $this->get($this->path));
        }

        return $this->put($data);
    }

    /**
     * Append to a file.
     *
     * @param  string $data The data to write.
     *
     * @return int|bool Returns the number of bytes that were written to the file, or FALSE on failure.
     */
    public function append(string $data)
    {
        return file_put_contents($this->path, $data, FILE_APPEND);
    }

    /**
     * Delete the file at a given path.
     *
     * @return bool Returns true or false if any of them is failure.
     */
    public function delete(): bool
    {
        $result = true;

        try {
            if (! @unlink($this->path)) {
                $result = false;
            }
        } catch (IOException $e) {
            $result = false;
        }

        return $result;
    }

    /**
     * Checks the existence of file and returns false if any of them is missing.
     *
     * @return bool Returns true or false if any of them is missing.
     */
    public function exists(): bool
    {
        if (! file_exists($this->path)) {
            return false;
        }

        return true;
    }

    /**
     * Get the file's last modification time.
     *
     * @return int Returns the time the file was last modified.
     */
    public function lastModified(): int
    {
        return filemtime($this->path);
    }

    /**
     * Get the file's last access time.
     *
     * @return int Returns the time the file was last assecc.
     */
    public function lastAccess(): int
    {
        return fileatime($this->path);
    }

    /**
     * Get the mime-type of a given file.
     *
     * @return string The mime-type of a given file.
     */
    public function mimeType(): string
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $this->path);
    }

    /**
     * Get the file type of a given file.
     *
     * @return string The file type of a given file.
     */
    public function type(): string
    {
        return filetype($this->path);
    }

    /**
     * Get the file extension from a file path.
     *
     * @return string The extension of a given file.
     */
    public function extension(): string
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    /**
     * Get the trailing name component from a file path.
     *
     * @return string The trailing name of a given file.
     */
    public function basename(): string
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    /**
     * Get the file name from a file path.
     *
     * @return string The file name of a given file.
     */
    public function name(): string
    {
        return pathinfo($this->path, PATHINFO_FILENAME);
    }

    /**
     * Return current path.
     *
     * @return string|null Current path
     */
    public function path(): ?string
    {
        return $this->path;
    }

    /**
     * Copy a file to a new location.
     *
     * @param  string $destination The destination path.
     *                             If the destination file already exists, it will be overwritten.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function copy(string $destination): bool
    {
        return copy($this->path, $destination);
    }

    /**
     * Move a file to a new location.
     *
     * @param  string $destination The destination path.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function move(string $destination): bool
    {
        return rename($this->path, $destination);
    }

    /**
     * Gets file size in bytes.
     *
     * @return int Returns the size of the file in bytes.
     */
    public function size(): int
    {
        return filesize($this->path);
    }

    /**
     * Get the MD5 hash of the file at the given path.
     *
     * @return string Returns a string on success, FALSE otherwise.
     */
    public function hash(): string
    {
        return md5_file($this->path);
    }

    /**
     * Determine if the given path is readable.
     *
     * @return bool Returns TRUE if the given path exists and is readable, FALSE otherwise.
     */
    public function isReadable(): bool
    {
        return is_readable($this->path);
    }

    /**
     * Determine if the given path is writable.
     *
     * @return bool Returns TRUE if the given path exists and is writable, FALSE otherwise.
     */
    public function isWritable(): bool
    {
        return is_writable($this->path);
    }

    /**
     * Determine if the given path is a regular file.
     *
     * @return bool Returns TRUE if the filename exists and is a regular file, FALSE otherwise.
     */
    public function isFile(): bool
    {
        return is_file($this->path);
    }

    /**
     * Get/Set UNIX mode of a file.
     *
     * @param  int|null $mode The mode parameter consists of three octal number components
     *                        specifying access restrictions for the owner, the user group
     *                        in which the owner is in, and to everybody else in this order.
     *
     * @return mixed
     */
    public function chmod(?int $mode = null)
    {
        if ($mode) {
            return chmod($this->path, $mode);
        }

        return substr(sprintf('%o', fileperms($this->path)), -4);
    }
}
