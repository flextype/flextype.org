<h1 align="center">Filesystem Component</h1>
<p align="center">
Filesystem Component provide a fluent, object-oriented interface for working with filesystem.
</p>
<p align="center">
<a href="https://github.com/atomastic/filesystem/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/filesystem.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/filesystem"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://packagist.org/packages/atomastic/filesystem"><img src="https://poser.pugx.org/atomastic/filesystem/downloads" alt="Total downloads"></a> <img src="https://github.com/atomastic/filesystem/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/filesystem/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/filesystem?utm_source=github.com&utm_medium=referral&utm_content=atomastic/filesystem&utm_campaign=Badge_Grade"><img src="https://api.codacy.com/project/badge/Grade/990baa96ada542f9ae21a41c2a25ddf9"></a> <a href="https://codeclimate.com/github/atomastic/filesystem/maintainability"><img src="https://api.codeclimate.com/v1/badges/ecbddff212c0e3a61216/maintainability" /></a> <a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fatomastic%2Ffilesystem?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fatomastic%2Ffilesystem.svg?type=shield"/></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Exteding](#extending)
* [Methods](#methods)
  - [Filesystem](#filesystem)
  - [File](#file)
  - [Directory](#directory)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/filesystem
```

### Usage

```php
use Atomastic\Filesystem\Filesystem;

// Create a Filesystem instance.
$filesystem = new Filesystem();

// Using global helper function filesystem()
$filesystem = filesystem();
```

### Extending

Filesystem are "macroable", which allows you to add additional methods to the Filesystem class at run time. For example, the following code adds a customMethod method to the Filesystem class:

```php
use Atomastic\Filesystem\Filesystem;
use Atomastic\Macroable\Macroable;

Filesystem::macro('countFiles', function($path) {
    return count(iterator_to_array($this->find()->in($path)->files(), false));
});

$filesytem = new Filesystem();

echo $filesytem->countFiles('/directory');
```

##### The above example will output:

```
1
```


### Methods

#### Filesystem

| Method | Description |
|---|---|
| <a href="#filesystem_directory">`directory()`</a> | Create a Directory instance. |
| <a href="#filesystem_find">`find()`</a> | Create a Finder instance. |
| <a href="#filesystem_file">`file()`</a> | Create a File instance. |
| <a href="#filesystem_isAbsolute">`isAbsolute()`</a> | Determine if the given path is absolute path. |
| <a href="#filesystem_isStream">`isStream()`</a> | Determine if the given path is a stream path. |
| <a href="#filesystem_isWindowsPath">`isWindowsPath()`</a> | Determine if the given path is a Windows path. |
| <a href="#filesystem_glob">`glob()`</a> | Find path names matching a given pattern. |

#### Methods Details

##### <a name="filesystem_directory"></a> Method: `directory()`

```php
/**
 * Create a Directory instance.
 */
public function directory($path): Directory
```

##### Example

```php  
$directory = $filesystem->directory('/foo');
```

##### <a name="filesystem_find"></a> Method: `find()`

```php
/**
 * Create a Finder instance.
 */
public function find(): Finder
```

##### Example

```php  
$result = $filesystem->find()->in('/foo')->files()->name('*.txt');
```

##### <a name="filesystem_file"></a> Method: `file()`

```php
/**
 * Create a File instance.
 */
public function file($path): File
```

##### Example

```php  
$file = $filesystem->file('/foo/1.txt');
```

##### <a name="filesystem_isAbsolute"></a> Method: `isAbsolute()`

```php
/**
 * Determine if the given path is absolute path.
 *
 * @param  string $path Path to check.
 *
 * @return bool Returns TRUE if the given path is absolute path, FALSE otherwise.
 */
 public function isAbsolute(string $path): bool
```

##### Example

```php  
$result = $filesystem->isAbsolute('c:\file');
```

##### <a name="filesystem_isWindowsPath"></a> Method: `isWindowsPath()`

```php
/**
 * Determine if the given path is a Windows path.
 *
 * @param  string $path Path to check.
 *
 * @return bool true if windows path, false otherwise
 */
public function isWindowsPath(string $path): bool
```

##### Example

```php  
$result = $filesystem->isWindowsPath('c:\file');
```


##### <a name="filesystem_glob"></a> Method: `glob()`

```php
/**
 * Find path names matching a given pattern.
 *
 * @param  string $pattern The pattern.
 * @param  int    $flags   Valid flags.
 *
 * @return array Returns an array containing the matched files/directories, an empty array if no file matched.
 */
public function glob(string $pattern, int $flags = 0): array
```

##### Example

```php  
$result = $filesystem->glob($this->tempDir . '/*.html');
```

#### File

| Method | Description |
|---|---|
| <a href="#file_append">`append()`</a> | Append to a file. |
| <a href="#file_basename">`basename()`</a> | Get the trailing name component from a file path. |
| <a href="#file_chmod">`chmod()`</a> |  Get/Set UNIX mode of a file. |
| <a href="#file_copy">`copy()`</a> | Copy a file to a new location. |
| <a href="#file_delete">`delete()`</a> | Delete the file at a given path. |
| <a href="#file_exists">`exists()`</a> | Checks the existence of file and returns false if any of them is missing. |
| <a href="#file_lastModified">`lastModified()`</a> | Get the file's last modification time. |
| <a href="#file_lastAccess">`lastAccess()`</a> | Get the file's last access time. |
| <a href="#file_extension">`extension()`</a> | Get the file extension from a file path. |
| <a href="#file_get">`get()`</a> | Get the contents of a file. |
| <a href="#file_hash">`hash()`</a> | Get the MD5 hash of the file at the given path. |
| <a href="#file_isFile">`isFile()`</a> | Determine if the given path is a regular file. |
| <a href="#file_isReadable">`isReadable()`</a> | Determine if the given path is readable. |
| <a href="#file_isWritable">`isWritable()`</a> | Determine if the given path is writable. |
| <a href="#file_mimeType">`mimeType()`</a> | Get the mime-type of a given file. |
| <a href="#file_name">`name()`</a> | Get the file name from a file path. |
| <a href="#file_path">`path()`</a> | Return current path. |
| <a href="#file_prepend">`prepend()`</a> | Prepend to a file. |
| <a href="#file_put">`put()`</a> | Write the contents of a file. |
| <a href="#file_size">`size()`</a> | Gets file size in bytes. |
| <a href="#file_type">`type()`</a> | Get the file type of a given file. |

#### Methods Details

##### <a name="file_append"></a> Method: `append()`

```php
/**
 * Append to a file.
 *
 * @param  string $data The data to write.
 *
 * @return int|bool Returns the number of bytes that were written to the file, or FALSE on failure.
 */
public function append(string $data)
```

##### Example

```php  
$filesystem->file('/foo/1.txt')->append(' world');
```

##### <a name="file_basename"></a> Method: `basename()`

```php
/**
 * Get the trailing name component from a file path.
 *
 * @return string The trailing name of a given file.
 */
public function basename(): string
```

##### Example

```php  
$result = $filesystem->file($this->tempDir . '/1.txt')->basename();
```

##### <a name="file_chmod"></a> Method: `chmod()`

```php
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
```

##### Example

```php  
// Set chmod
$filesystem->file('/foo/1.txt')->chmod(0755);

// Get chmod
$result = $filesystem->file('/foo/1.txt')->chmod();
```

##### <a name="file_copy"></a> Method: `copy()`

```php
/**
 * Copy a file to a new location.
 *
 * @param  string $destination The destination path.
 *                             If the destination file already exists, it will be overwritten.
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function copy(string $destination): bool
```

##### Example

```php  
$filesystem->file('/foo/1.txt')->copy('/foo/2.txt');
```

##### <a name="file_delete"></a> Method: `delete()`

```php
/**
 * Delete the file at a given path.
 *
 * @return bool Returns true or false if any of them is failure.
 */
public function delete(): bool
```

##### Example

```php  
$filesystem->file('/foo/1.txt')->delete();
```

#### Directory

| Method | Description |
|---|---|
| <a href="#directory_clean">`clean()`</a> | Empty the specified directory of all files and directories. |
| <a href="#directory_chmod">`chmod()`</a> |  Get/Set UNIX mode of a directory. |
| <a href="#directory_copy">`copy()`</a> | Copy a directory from one location to another. |
| <a href="#directory_create">`create()`</a> | Create a directory. |
| <a href="#directory_delete">`delete()`</a> | Delete a directory. |
| <a href="#directory_exists">`exists()`</a> | Checks the existence of directory and returns false if any of them is missing. |
| <a href="#directory_isDirectory">`isDirectory()`</a> | Determine if the given path is a directory. |
| <a href="#directory_move">`move()`</a> | Move a directory. |
| <a href="#directory_path">`path()`</a> | Return current path. |
| <a href="#directory_size">`size()`</a> | Gets size of a given directory in bytes. |

#### Methods Details

##### <a name="directory_clean"></a> Method: `clean()`

```php
/**
 * Empty the specified directory of all files and directories.
 *
 * @param  string $directory Directory to cleanup.
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function clean(): bool
```

##### Example

```php  
$filesystem->directory($this->tempDir . '/1')->clean();
```

##### <a name="directory_chmod"></a> Method: `chmod()`

```php
/**
 * Get/Set UNIX mode of a directory.
 *
 * @param  int|null $mode The mode parameter consists of three octal number components
 *                        specifying access restrictions for the owner, the user group
 *                        in which the owner is in, and to everybody else in this order.
 *
 * @return mixed
 */
public function chmod(?int $mode = null)
```

##### Example

```php  
// Set chmod
$filesystem->directory('/foo')->chmod(0755);

// Get chmod
$result = $filesystem->directory('/foo')->chmod();
```

##### <a name="directory_copy"></a> Method: `copy()`

```php
/**
 * Copy a directory from one location to another.
 *
 * @param  string   $destination The destination path.
 * @param  int|null $flags       Flags may be provided which will affect the behavior of some methods.
 *                               A list of the flags can found under FilesystemIterator predefined constants.
 *                               https://www.php.net/manual/en/class.filesystemiterator.php#filesystemiterator.constants
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function copy(string $destination, ?int $flags = null): bool
```

##### Example

```php  
$filesystem->directory('/foo')->copy('/bar');
```

##### <a name="directory_create"></a> Method: `create()`

```php
/**
 * Create a directory.
 *
 * @param  int  $mode      The mode is 0777 by default, which means the widest possible access.
 * @param  bool $recursive Allows the creation of nested directories specified in the path.
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function create(int $mode = 0755, bool $recursive = false): bool
```

##### Example

```php  
$filesystem->directory('/foo')->create();
```

##### <a name="directory_delete"></a> Method: `delete()`

```php
/**
 * Delete a directory.
 *
 * @param  string $directory Directory to delete.
 * @param  bool   $preserve  The directory itself may be optionally preserved.
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function delete(bool $preserve = false): bool
```

##### Example

```php  
$filesystem->directory('/foo')->delete();
```

##### <a name="directory_exists"></a> Method: `exists()`

```php
/**
 * Checks the existence of directory and returns false if any of them is missing.
 *
 * @return bool Returns true or false if any of them is missing.
 */
public function exists(): bool
```

##### Example

```php  
$result = $filesystem->directory('/foo')->exists();
```

##### <a name="directory_isDirectory"></a> Method: `isDirectory()`

```php
/**
 * Determine if the given path is a directory.
 *
 * @return bool Returns TRUE if the given path exists and is a directory, FALSE otherwise.
 */
public function isDirectory(): bool
```

##### Example

```php  
$result = $filesystem->directory('/foo')->isDirectory();
```

##### <a name="directory_move"></a> Method: `move()`

```php
/**
 * Move a directory.
 *
 * @param  string $destination The destination path.
 *
 * @return bool Returns TRUE on success or FALSE on failure.
 */
public function move(string $destination): bool
```

##### Example

```php  
$filesystem->directory($this->tempDir . '/1')->move($this->tempDir . '/2');
```

##### <a name="directory_path"></a> Method: `path()`

```php
/**
 * Return current path.
 *
 * @return string|null Current path
 */
public function path(): ?string
```

##### Example

```php  
$result = $filesystem->directory('/foo')->path();
```

##### <a name="directory_size"></a> Method: `size()`

```php
/**
 * Gets size of a given directory in bytes.
 *
 * @return int Returns the size of the directory in bytes.
 */
public function size(): int
```

##### Example

```php  
$result = $filesystem->directory('/foo')->size();
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/filesystem/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
