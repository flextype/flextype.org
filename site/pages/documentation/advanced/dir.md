---
title: Dir
description: Documentation for Fansoro Developers and Fansoro Users.
template: documentation
---

Dir class contains methods that assist in working with directories.

### Creates a directory
```
Dir::create('folder1');
```

### Checks if this directory exists.
```
if (Dir::exists('folder1')) {
  // Do something...
}
```  

### Check dir permission
```
$dir_perm = Dir::checkPerm('folder1');
```

### Delete directory
```
Dir::delete('folder1');
```

### Get list of directories
```
$dirs = Dir::scan('folders');
```

### Check if a directory is writable.
```
if (Dir::writable('folder1')) {
  // Do something...
}
```

### Get directory size.
```
echo Dir::size('folder1');
```
