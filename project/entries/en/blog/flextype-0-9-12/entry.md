---
title: Flextype 0.9.12 release
tags: release
template: blog-post
published_at: '07-12-2020 09:46'
author:
  name: Sergey Romanenko
---

### Features

* **core** add Atomastic Components instead of Flextype Components ([#478](https://github.com/flextype/flextype/issues/478))

    Added:
    - atomastic/session
    - atomastic/arrays
    - atomastic/filesystem
    - atomastic/registry
    - atomastic/strings

* **entries** Entries API return Arrays Object instead of plain array on fetch. ([#485](https://github.com/flextype/flextype/issues/485))

    From no we have ability to work with entries singles and collections as with smart objects
    for further data manipulations with help of Atomastic Arrays Component.

    Example:
    ```php
    // Fetch random 10 posts created by Awilum and sort them by published_at field.
    $posts = flextype('entries')
               ->fetchCollection('blog')
               ->where('author.name', 'eq', 'Awilum')
               ->sortBy('published_at')
               ->limit(10)
               ->random();
    ```

* **entries** Standardize Entries API fetch. ([#486](https://github.com/flextype/flextype/issues/486))

* **entries** Standardize Media Files API fetch. ([#487](https://github.com/flextype/flextype/issues/487))

* **entries** Standardize Media Folders API fetch. ([#488](https://github.com/flextype/flextype/issues/488))

* **entries** Add ability to extend Core class with Macros. ([#489](https://github.com/flextype/flextype/issues/489))

* **cache** add new cache engine - PHPFastCache instead of Doctrine Cache ([#457](https://github.com/flextype/flextype/issues/457))

    #### New config for PhpFastCache
    https://github.com/flextype/flextype/blob/dev/src/flextype/settings.yaml#L127-L241  

    #### New methods from PhpFastCache
    We are start using PhpFastCache PSR16 adapter  
    https://github.com/PHPSocialNetwork/phpfastcache   


* **core** Unit Test powered by PestPHP.

* **media** add new `move()` method instead of `rename()`

* **entries** add new `move()` method instead of `rename()`

* **core** add new `PATH['tmp']` constant ([#470](https://github.com/flextype/flextype/issues/470))

    Now we have:

    `PATH['tmp']` constant instead of `PATH['cache']` and `PATH['logs']`

* **markdown** add markdown basic settings ([#471](https://github.com/flextype/flextype/issues/471))

    ```yaml
    markdown:
      auto_line_breaks: false
      auto_url_links: false
      escape_markup: false
    ```

* **markdown** add ability to access markdown parser instance ([#468](https://github.com/flextype/flextype/issues/468))

    Usage:

    ```php
    $markdown = flextype('markdown')->getInstance();
    ```

* **entries** add new Flextype Entries Memory Storage (Flextype EMS). New private property `$storage` for storing current requested entry(or entries) data and all Entries CRUD operations data in memory with ability to change them dynamically on fly. New public methods `getStorage()` `setStorage()` ([#467](https://github.com/flextype/flextype/issues/467))

    Structure (Flextype EMS):

    ```php
    $storage = [
        'fetch' => [
          'id' => '',
          'data' => '',
        ],
        'create' => [
          'id' => '',
          'data' => '',
        ],
        'update' => [
          'id' => '',
          'data' => '',
        ],
        'delete' => [
          'id' => '',
        ],
        'copy' => [
          'id' => '',
          'new_id' => '',
        ],
        'move' => [
          'id' => '',
          'new_id' => '',
        ],
        'has' => [
          'id' => '',
        ],
    ];
    ```

    Accessing storage example:

    ```php
    flextype('emitter')->addListener('onEntryAfterInitialized', static function () : void {
        flextype('entries')->setStorage('fetch.data.title', 'New title');
    });

    $entry = flextype('entries')->fetchSingle('about');

    echo $entry['title'];
    ```

* **entries** add new events: `onEntryHas`, `onEntryInitialized`, `onEntriesInitialized` ([#467](https://github.com/flextype/flextype/issues/467))

* **helpers** add new support helper `find()` for files and directories searching instead of `find_filter()`

* **helpers** add new support helper `filter()` for data collection filtering instead of `arrays_filter()`

### Bug Fixes

* **entries** fix issue with `delete()` method ([#465](https://github.com/flextype/flextype/issues/465))

* **media** fix issue with `exif_read_data()` on files upload.

### Refactoring

* **entries** remove App from all core namespaces ([#469](https://github.com/flextype/flextype/issues/469))

### BREAKING CHANGES

* **entries** removed properties from Entries API ([#467](https://github.com/flextype/flextype/issues/467))

    ```php  
    $entry_id
    $entry
    $entry_create_data
    $entry_update_data
    $entries_id
    $entries
    ```

    Use public methods `getStorage()` `setStorage()` instead.

    Example:

    ```php
    // old
    flextype('entries')->entry['title'] = 'New title';

    // new
    flextype('entries')->setStorage('fetch.data.title', 'New title');

    // old
    $title = flextype('entries')->entry['title'];

    // new
    $title = flextype('entries')->getStorage('fetch.data.title');
    $title = flextype('entries')->getStorage('fetch.data')['title'];
    ```
* **core** Removed App from all core namespaces ([#469](https://github.com/flextype/flextype/issues/469))

    **We should have**

    ```
    use Flextype\Foundation\Entries\Entries;
    ```

    **instead of**

    ```
    use Flextype\App\Foundation\Entries\Entries;
    ```

* **core** use new `PATH['tmp']` constant instead of `PATH['cache']` and `PATH['logs']` ([#470](https://github.com/flextype/flextype/issues/470))

* **cache** old cache config removed, use new config for PhpFastCache ([#457](https://github.com/flextype/flextype/issues/457))

* **cache** use methods `has()` `set()` `get()` instead of `contains()` `save()` `fetch()` ([#457](https://github.com/flextype/flextype/issues/457))

* **core** remove flextype-components/session ([#473](https://github.com/flextype/flextype/issues/473))

* **core** remove flextype-components/cookie ([#473](https://github.com/flextype/flextype/issues/473))

* **core** remove flextype-components/number ([#474](https://github.com/flextype/flextype/issues/474))

* **core** remove flextype-components/filesystem ([#474](https://github.com/flextype/flextype/issues/474))

* **core** remove flextype-components/arrays ([#474](https://github.com/flextype/flextype/issues/474))

### Update from Flextype 0.9.11 to Flextype 0.9.12

1. Backup your Site First!
2. **Read BREAKING CHANGES section!**
3. Download flextype-0.9.12.zip
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
