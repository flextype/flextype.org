---
title: Flextype 0.9.9 release
tags: release
template: blog-post
published_at: '05-08-2020 09:46'
author:
  name: Sergey Romanenko
---


### Features
* **core** Moving to PHP 7.2.5 #444
* **core** Add PhpArrayFileAdapter and set PhpArrayFile Cache as a default fallback cache driver instead of Filesystem Cache driver. This new feature give us performance boost up to 25%
* **core** Add preflight to Flextype basic checks and performance boost.
* **core** Update all namespaces and core infrastructure. #437
* **core** Add Symfony Finder Component and `find_filter()` helper.
* **cache** Cache API improvements

    * Cache ID generation enhancements
    * add new public function `fetchMultiple(array $keys)`
    * add new public function `saveMultiple(array $keysAndValues, $lifetime = 0)`
    * add new public function `deleteMultiple(array $keys)`
    * add new public function `deleteAll()`
    * add new public function `flushAll()`
    * add new public function `purge(string $directory)`
    * add new public function `purgeAll()`
    * add new public function `getStats()`
    * add new events `onCacheBeforePurgeAll`, `onCacheAfterPurgeAll`, `onCacheBeforePurge`, `onCacheAfterPurge`

* **core** New Media API for work with media uploads.

    New objects:

    ```
    $flextype['media_files_meta']
    $flextype['media_folders_meta']
    $flextype['media_files']
    $flextype['media_folders']
    ```

    See: https://docs.flextype.org/en/core/media

* **core** New simplified parsers and serializers functionality #438

    New objects:

    ```
    $flextype['markdown']
    $flextype['shortcode']
    $flextype['json']
    $flextype['yaml']
    $flextype['frontmatter']
    ```

    New methods:

    ```
    $flextype->markdown->parse(string $input)

    $flextype->shortcode->add(string $name, $handler)
    $flextype->shortcode->parse(string $input, bool $cache = true)

    $flextype->json->decode(string $input, bool $cache = true, bool $assoc = true, int $depth = 512, int $flags = 0)
    $flextype->json->encode($input, int $options = 0, int $depth = 512) : string

    $flextype->yaml->decode(string $input, bool $cache = true, int $flags = 0) : array
    $flextype->yaml->encode($input, int $inline = 2, int $indent = 4, int $flags = 0) : string

    $flextype->frontmatter->decode(string $input, bool $cache = true)
    $flextype->frontmatter->encode($input) : string
    ```

* **entries** New simplified logic for entries methods: `fetch()` `fetchSingle()` and `fetchCollection()`

    We are stop doing unneeded things like extra scanning folders and files updates and etc... for fetching entries collections that's slowdowns the fetching process.

    We have improved filtering abilities for entries collections.

    From now there is a possible to path a much more rules for collections filtering inside the `fetchCollection()` and with using a standalone helper functions like `collect_filter()` and `find_filter()`

    * `public function fetch(string $path, bool $collection = false, $filter = []) : array`
       Fetch single entry or collections of entries.
    * `public function fetchSingle(string $path) : array`
       Fetch single entry.
    * `public function fetchCollection(string $path, $filter = []) : array`
       Fetch entries collection.

    See: https://docs.flextype.org/en/core/entries#methods

* **entries** New events added for Entries API.

    ```
    onEntryCreate
    onEntryCopy
    onEntryRename
    onEntryDelete
    onEntryUpdate
    onEntryAfterCacheInitialized
    onEntryAfterInitialized
    onEntriesAfterInitialized
    ```

* **entries** New decoupled and configurable fields added for entries instead of hardcoded.

    Entry fields decoupled into: `/flextype/Foundation/Entries/Fields/`

    Entry fields added into `flextype.settings.entries.fields`

    ```
    fields:
      slug:
        enabled: true
      published_at:
        enabled: true
      published_by:
        enabled: true
      modified_at:
        enabled: true
      created_at:
        enabled: true
      created_by:
        enabled: true
      routable:
        enabled: true
      parsers:
        enabled: true
      visibility:
        enabled: true
      uuid:
        enabled: true
    ```

* **entries** Add ability to set individual cache control for specific entries.

    ```
    cache:
      enabled: true

    or

    cache:
      enabled: false
    ```

* **entries** Add new Entries API class properties.

    ```
    /**
     * Current entry path
     *
     * @var string
     * @access public
     */
    public $entry_path = null;

    /**
     * Current entry create data array
     *
     * @var array
     * @access public
     */
    public $entry_create_data = [];

    /**
     * Current entry create data array
     *
     * @var array
     * @access public
     */
    public $entry_update_data = [];
    ```

* **collections** New Collection functionality on top of Doctrine Collections.

    We are able to use collections for any type of items, not just for entries.
    New Collection are simple and powerful!

    See: https://docs.flextype.org/en/core/collections

* **settings** Set max_file_size 8mb for uploads.

* **yaml** YAML set default inline = 5 and indent = 2

* **vendors** New Arrays library for Accessing PHP Arrays via DOT notation.

* **rest-api** New Files Rest API.

    | Method | Endpoint | Description |
    | --- | --- | --- |
    | GET | /api/files | Fetch file(files) |
    | POST | /api/files | Upload file |
    | PUT | /api/files | Rename file |
    | PUT | /api/files/copy | Copy file |
    | DELETE | /api/files | Delete file |
    | PATCH | /api/files/meta | Updates file meta information |
    | POST | /api/files/meta | Updates file meta information |
    | DELETE | /api/files/meta | Delete file meta information |

* **rest-api** New Folders Rest API.

    | Method | Endpoint | Description |
    | --- | --- | --- |
    | GET | /api/folders | Fetch folder(folders) |
    | POST | /api/folders | Create folder |
    | PUT | /api/folders | Rename folder |
    | PUT | /api/folders/copy | Copy folder |
    | DELETE | /api/folders | Delete folder |

### Bug Fixes

* **frontmatter** remove UTF-8 BOM if it exists.
* **frontmatter** fix line endings to Unix style.
* **entries** fix method `rename()` in Entries API #433
* **entries** fix issue with parsing content on entry fetch #441
* **rest-api** fix Rest API JSON Response #445
* **core** fix all namespaces #437
* **core** fix flextype config loading.
* **serializers** fix YAML native parser.
* **plugins** fix method `getPluginsCacheID()` for Plugins API

### Refactoring
* **pimple** remove unused $flextype variable and cleanup dependencies.
* **yaml** save and mute error_reporting for native YAML parser.
* **cors** remove unused parameter $args
* **plugins**  remove dead variables.
* **shortcode** update return type for shortcode add() method.
* **cache** update $driver type for DoctrineCache.

### Vendor Updates

* **core:** Update vendor league/glide to 1.6.0
* **core:** Update vendor doctrine/cache to 1.10.2
* **core:** Update vendor doctrine/collections to 1.6.6
* **core:** Update vendor respect/validation to 2.0.16
* **core:** Update vendor monolog/monolog to 2.1.1
* **core:** Update vendor thunderer/shortcode to 0.7.4
* **core:** Update vendor flextype-components/filesystem to 2.0.7
* **core:** Update vendor flextype-components/registry to 3.0.0
* **core:** Update vendor flextype-components/number to 1.1.1
* **core:** Update vendor composer/semver to 3.0.0
* **core:** Update vendor symfony/yaml to 5.1.3
* **core:** Update vendor ramsey/uuid to 4.1.0

### BREAKING CHANGES

* **entries** Wildcard * removed from parsers field.
* **entries** Cache setup removed from parsers field.
* **settings** `/project/config/settings.yaml` move to `/project/config/flextype/settings.yaml`
* **constants** remove constant `PATH['config']`, use - `PATH['project'] . '/config/'`
* **core:** remove Date Component from the system.
* **core:** remove Text Component from the system.
* **cache:** removed methods clear() and clearAll(), use purge() and purgeAll() instead.
* **cache:** change return type for methods `save()`, `delete()` from void too bool.
