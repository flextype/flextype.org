---
title: Flextype 0.9.11 release
tags: release
template: blog-post
published_at: '25-08-2020 09:46'
---


### Features

* New helper function added for access all Flextype features in one place

    ```php
    flextype($container_name = null, $container = [])
    ```

    **IMPORTANT**

    Do not use `$flextype` object to access Flextype features, use `flextype()` helper function.

### Bug Fixes

* **core** fix bug - Cannot access protected property Flextype\App\Foundation\Flextype::$container ([#462](https://github.com/flextype/flextype/issues/462))
* **core** fix bug - Cannot use object of type Flextype\App\Foundation\Flextype as array ([#461](https://github.com/flextype/flextype/issues/461))
* **media** fix Media exif_read_data warning - File not supported ([#464](https://github.com/flextype/flextype/issues/464))

### Refactoring

* **plugins** remove $flextype variable from plugins init method.
* **entries** update return type for fetch() method.
* **entries** add additional check for getTimestamp() method in the getCacheID()
* **entries** remove dead code from fetchCollection() method.

### Vendor Updates

* **core:** Update vendor flextype-components/filesystem to 2.0.8
* **core:** Update vendor ramsey/uuid to 4.1.1


### Update from Flextype 0.9.10 to Flextype 0.9.11

1. Backup your Site First!
2. **Read BREAKING CHANGES section!**
3. Download flextype-0.9.11.zip
4. Unzip the contents to a new folder on your local computer.
5. Remove on your server this folders and files:
    ```
    src/
    vendor/
    index.php
    ```
6. Upload on your server this folders and files:
    ```
    src/
    vendor/
    index.php
    ```
7. Clear browser cache!
