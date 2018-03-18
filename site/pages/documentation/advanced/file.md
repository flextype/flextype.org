---
title: File
description: Documentation for Fansoro Developers and Fansoro Users.
template: documentation
---

File class contains methods that assist in working with files.  

### Returns true if the File exists.
```
if (File::exists('filename.txt')) {
  // Do something...
}
```

### Delete file
```
File::delete('filename.txt');
```

### Rename file
```
File::rename('filename1.txt', 'filename2.txt');
```

### Copy file
```
File::copy('folder1/filename.txt', 'folder2/filename.txt');
```

### Get the File extension.
```
echo File::ext('filename.txt');
```

### Get the File name
```
echo File::name('filename.txt');
```

### Get list of files in directory recursive
```
$files = File::scan('folder');
$files = File::scan('folder', 'txt');
$files = File::scan('folder', array('txt', 'log'));
$files = File::scan('folder', array('txt', 'log'), false);
```

### Fetch the content from a file or URL.
```
echo File::getContent('filename.txt');
```

### Writes a string to a file.
```
File::setContent('filename.txt', 'Content ...');
```

### Get time(in Unix timestamp) the file was last changed
```
echo File::lastChange('filename.txt');
```

### Get last access time
```
echo File::lastAccess('filename.txt');
```

### Returns the mime type of a file.
```
echo File::mime('filename.txt');
```

### Forces a file to be downloaded.
```
File::download('filename.txt');
```

### Display a file in the browser.
```
File::display('filename.txt');
```

### Tests whether a file is writable for anyone.
```
if (File::writable('filename.txt')) {
  // do something...
}
```
