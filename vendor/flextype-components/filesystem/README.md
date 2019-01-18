# Filesystem Component
![version](https://img.shields.io/badge/version-1.1.5-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/filesystem/blob/master/LICENSE)

Filesystem component contains methods that assist in working with files and directories.

### Installation

```
composer require flextype-components/filesystem
```

### Usage

```php
use Flextype\Component\Filesystem\Filesystem;
```

Upload files on the Server with several type of Validations!
```php
Filesystem::uploadFile($_FILES['file'], $files_directory);
```

Returns true if the File exists.
```php
if (Filesystem::fileExists('filename.txt')) {
  // Do something...
}
```

Delete file
```php
Filesystem::deleteFile('filename.txt');
```

Rename file
```php
Filesystem::renameFile('filename1.txt', 'filename2.txt');
```

Copy file
```php
Filesystem::copyFile('folder1/filename.txt', 'folder2/filename.txt');
```

Copy folders with files
```php
Filesystem::recursiveCopy('folder1', 'folder2');
```

Get the File extension.
```php
echo Filesystem::fileExt('filename.txt');
```

Get the File name
```php
echo Filesystem::filename('filename.txt');
```

Get list of files in directory recursive
```php
$files = Filesystem::getFilesList('folder');
$files = Filesystem::getFilesList('folder', 'txt');
$files = Filesystem::getFilesList('folder', array('txt', 'log'));
```

Fetch the content from a file or URL.
```php
echo Filesystem::getFileContent('filename.txt');
```

Writes a string to a file.
```php
Filesystem::setFileContent('filename.txt', 'Content ...');
```

Get time(in Unix timestamp) the file was last changed
```php
echo Filesystem::getFileLastChange('filename.txt');
```

Get last access time
```php
echo Filesystem::getFileLastAccess('filename.txt');
```

Returns the mime type of a file.
```php
echo Filesystem::getFileMimeType('filename.txt');
```

Forces a file to be downloaded.
```php
Filesystem::downloadFile('filename.txt');
```

Display a file in the browser.
```php
Filesystem::displayFile('filename.txt');
```

Tests whether a file is writable for anyone.
```php
if (Filesystem::isFileWritable('filename.txt')) {
  // do something...
}
```

Creates a directory
```php
Filesystem::createDir('folder1');
```

Checks if this directory exists.
```php
if (Filesystem::dirExists('folder1')) {
  // Do something...
}
```  

Check dir permission
```php
echo Filesystem::checkDirPerm('folder1');
```

Delete directory
```php
Filesystem::deleteDir('folder1');
```

Get list of directories
```php
$dirs = Filesystem::getDirList('folders');
```

Check if a directory is writable.
```php
if (Filesystem::isDirWritable('folder1')) {
  // Do something...
}
```

Get directory size.
```php
echo Filesystem::getDirSize('folder1');
```

## License
See [LICENSE](https://github.com/flextype-components/filesystem/blob/master/LICENSE)
