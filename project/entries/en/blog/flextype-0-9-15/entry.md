---
title: Flextype 0.9.15 release
tags: release
template: blog-post
published_at: '03-01-2021 09:46'
author:
  name: Sergey Romanenko
---

### Features

* **media** add method `has()` for Media Folders ([#534](https://github.com/flextype/flextype/issues/534))
* **entries** simplify functionality to work with online entries storage. ([#536](https://github.com/flextype/flextype/issues/536))
* **parsers** move markdown and shortcode settings under parsers setting. ([#539](https://github.com/flextype/flextype/issues/539))

### Bug Fixes

* **entries** fix issue with individual entries cache field ([#537](https://github.com/flextype/flextype/issues/537))
* **plugins** fix issue with empty manifest and settings yaml files ([#538](https://github.com/flextype/flextype/issues/538))

### BREAKING CHANGES

* **entries** according to this ticket ([#536](https://github.com/flextype/flextype/issues/536)) we have several changes for entries storage.

    * use `flextype('entries')->storage()->get()` instead of `flextype('entries')->getStorage()`
    * use `flextype('entries')->storage()->set()` instead of `flextype('entries')->setStorage()`
    * use `flextype('entries')->storage()->has()` instead of `flextype('entries')->hasStorage()`
    * use `flextype('entries')->storage()->delete()` instead of `flextype('entries')->deleteStorage()`

    note: all method from Atomastic Arrays are available for Arrays Storage Object manipulations
    docs: https://github.com/atomastic/arrays

### Update from Flextype 0.9.14 to Flextype 0.9.15

1. Backup your Site First!
2. Download flextype-0.9.15.zip
4. Unzip the contents to a new folder on your local computer.
5. Remove on your server this folders and files:
    ```
    src/
    vendor/
    var/
    index.php
    ```
6. Upload on your server this folders and files:
    ```
    src/
    vendor/
    index.php
    ```
7. Update all your plugins!
8. Clear browser cache!
