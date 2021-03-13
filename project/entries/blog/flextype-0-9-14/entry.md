---
title: Flextype 0.9.14 release
tags: release
template: blog-post
published_at: '30-12-2020 09:46'
author:
  name: Sergey Romanenko
---

### Features

* **core** Moving to PHP 7.4.0 ([#524](https://github.com/flextype/flextype/issues/524))

* **plugins** Set default plugin priority 100 and SORT them ascending ([#523](https://github.com/flextype/flextype/issues/523))

### Bug Fixes

* **core** fix issue with Rest API endpoints detection. ([#522](https://github.com/flextype/flextype/issues/522))

* **entries** fix issue with empty variable $data in fetch() method. ([#531](https://github.com/flextype/flextype/issues/531))

* **entries** fix issue with deleteStorage() method return data.

### Refactoring

* **core** general code refactoring and improvements.

### Update from Flextype 0.9.13 to Flextype 0.9.14

1. Backup your Site First!
2. Download flextype-0.9.14.zip
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
8. **Read updated PLUGINS BREAKING CHANGES section! - Site Plugin and Twig Plugin has breaking changes**
9. Clear browser cache!
