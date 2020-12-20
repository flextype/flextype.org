---
title: Flextype 0.9.13 release
tags: release
template: blog-post
published_at: '20-12-2020 09:46'
---

### Features

* **media-files** we will use `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#508](https://github.com/flextype/flextype/issues/508))

    ```php
    /**
     * Fetch.
     *
     * @param string $id      The path to file.
     * @param array  $options Options array.
     *
     * @access public
     *
     * @return self Returns instance of The Arrays class.
     */
    public function fetch(string $id, array $options = []): Arrays
    ```

    Media Files API is macroable and we will able to add any custom fetch methods for receiving data from different sources.

    ```php
    flextype('media')->files()::macro('fetchFromOtherStorage', function(string $id, array $options) {
      // fetch data from Other Storage using $id and $options
    });

    $data = flextype('media')->files()-> fetchFromOtherStorage($id, $options);
    ```

* **media-folders** we will use `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#509](https://github.com/flextype/flextype/issues/509))

    ```php
    /**
     * Fetch.
     *
     * @param string $id      The path to folder.
     * @param array  $options Options array.
     *
     * @access public
     *
     * @return self Returns instance of The Arrays class.
     */
    public function fetch(string $id, array $options = []): Arrays
    ```

    Media Folders API is macroable and we will able to add any custom fetch methods for receiving data from different sources.

    ```php
    flextype('media')->folders()::macro('fetchFromOtherStorage', function(string $id, array $options) {
      // fetch data from Other Storage using $id and $options
    });

    $data = flextype('media')->folders()-> fetchFromOtherStorage($id, $options);
    ```

* **entries** we will use `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#495](https://github.com/flextype/flextype/issues/495))

    ```php
    /**
    * Fetch.
    *
    * @param string $id      Unique identifier of the entry.
    * @param array  $options Options array.
    *
    * @access public
    *
    * @return mixed
    */
    public function fetch(string $id, array $options = []): Arrays
    ```

    Entries API is macroable and we will able to add any custom fetch methods for receiving data from different sources.

    ```php
    flextype('entries')::macro('fetchXML', function(string $id, array $options) {
    // fetch data from XML using $id and $options
    });

    $data = flextype('entries')->fetchXML($id, $options);
    ```

* **images** we will use `media/` folder instead of `uploads/entries/` ([#516](https://github.com/flextype/flextype/issues/516))

* **serializers** standardise serializers container names with macroable ability. ([#518](https://github.com/flextype/flextype/issues/518))

    **New methods to access Serializers:**  

    ```php
    flextype('serializers')->yaml()
    flextype('serializers')->json()
    flextype('serializers')->frontmatter()
    ```

    **Adding macros:**  

    ```php
    flextype('serializers')::macro('NAME', CALLBACK_FUNCTION() {});
    ```

* **parsers** standardise parsers container names with macroable ability. ([#519](https://github.com/flextype/flextype/issues/519))

    **New methods to access Parsers:**  

    ```php
    flextype('parsers')->shortcode()
    flextype('parsers')->markdown()
    ```

    **Adding macros:**  

    ```php
    flextype('parsers')::macro('NAME', CALLBACK_FUNCTION() {});
    ```

* **media** standardise media container names with macroable ability for Media API. ([#517](https://github.com/flextype/flextype/issues/517))

    New macroable common class for all media - `class Media`  

    **New methods to access Media API:**  

    ```php
    flextype('media')->files()
    flextype('media')->files()->meta()
    flextype('media')->folders()
    flextype('media')->folders()->meta()
    ```

    **Adding macros:**  

    ```php
    flextype('media')::macro('NAME', CALLBACK_FUNCTION() {});
    flextype('media')->files()::macro('NAME', CALLBACK_FUNCTION() {});
    flextype('media')->files()->meta()::macro('NAME', CALLBACK_FUNCTION() {});
    flextype('media')->folders()::macro('NAME', CALLBACK_FUNCTION() {});
    flextype('media')->folders()->meta()::macro('NAME', CALLBACK_FUNCTION() {});
    ```

* **fields** add new field `registry.get` for Registry API ([#494](https://github.com/flextype/flextype/issues/494))

    Registry API provides method `get()` for retrieving data from registry and we should able to access them inside entries frontmatter header for retrieving data right in the entries.

    **Basic Example**

    Sample entry with several queries and with several nested queries inside of children entries.

    File: `/project/entries/registry-root/entry.md`

    ```yaml
    ---
    title: Root
    registry:
      get:
        flextype:
          key: flextype.manifest.name
        author.name:
          key: flextype.manifest.author.name
        license:
          key: flextype.manifest.license
    entries:
      fetch:
        level1:
          id: registry-root/level-1
    ---
    ```

    **Setting for this fields**

    File: `/project/config/flextype/settings.yaml`

    ```yaml
    entries:
      fields:
        registry:
          get:
            enabled: true
    ```

    Valid values for setting **enabled** is **true** or **false**

* **fields** add new field `entries.fetch` for Entries API ([#492](https://github.com/flextype/flextype/issues/492))

    Entries API provides methods for entries fetch: `fetch()` and we should able to access them inside entries frontmatter header for fetching data right in the entries. Also, we will able to add and use any kind of fetch methods with our macroable functionality.  

    **Basic Example**  

    Catalog entry with several queries and with several nested queries inside of children entries.

    File: `/project/entries/catalog/entry.md`

    ```yaml
    ---
    title: Catalog
    visibility: visible
    entries:
      fetch:
        label1:
          id: discounts/50-off
          options:
            filter:
              limit: 4
        bikes:
          id: catalog/bikes
          options:
            collection: true
            filter:
              where:
                -
                  key: brand
                  operator: eq
                  value: gt
              limit: 10
        discounts:
          id: discounts
          options:
            collection: true
            filter:
              where:
                -
                  key: title
                  operator: eq
                  value: '30% off'
                -
                  key: category
                  operator: eq
                  value: bikes
    ---
    ```

    **Setting for this fields**  

    File: `/project/config/flextype/settings.yaml`

    ```yaml
    entries:
      fields:
        entries:
          fetch:
            enabled: true
            result: toObject
    ```

    Valid values for setting **enabled** is **true** or **false**  
    Valid values for setting **result** is **toObject** or **toArray**  

* **fields** add new field `media.files.fetch` and `media.folders.fetch` for Media API's ([#501](https://github.com/flextype/flextype/issues/501)) ([#500](https://github.com/flextype/flextype/issues/500))

    Media API's provides methods for files and folders fetch: `fetch()` and we should able to access them inside entries frontmatter header for fetching data right in the entries. Also, we will able to add and use any kind of fetch methods with our macroable functionality.

    ```yaml
    ---
    title: Media
    media:
      folders:
        fetch:
          macroable_folder:
            id: 'foo'
            options:
              method: fetchExtraData
          foo_folder:
            id: 'foo'
          collection_of_folders:
            id: '/'
            options:
              collection: true
      files:
        fetch:
          macroable_file:
            id: 'foo'
            options:
              method: fetchExtraData
          foo_file:
            id: foo.txt
          collection_of_files:
            id: '/'
            options:
              collection: true
    ---
    ```

    **Setting for this fields**  

    File: `/project/config/flextype/settings.yaml`

    ```yaml
    entries:
      fields:
        media:
          files:
            fetch:
              enabled: true
              result: toObject
          folders:
            fetch:
              enabled: true
              result: toObject
    ```

    Valid values for setting **enabled** is **true** or **false**    
    Valid values for setting **result** is **toObject** or **toArray**   


* **entries** add new method `deleteStorage()` for Entries API ([#498](https://github.com/flextype/flextype/issues/498))

* **entries** add new method `hasStorage()` for Entries API ([#497](https://github.com/flextype/flextype/issues/497))

* **core** add new method `isApiRequest` to Determine API Request in the basic core functionality. ([#507](https://github.com/flextype/flextype/issues/507))

* **rest-api-entries** add ability to send options for `fetch()` methods in Entries Rest API. ([#504](https://github.com/flextype/flextype/issues/504))

    **Fetch single**
    ```
    GET /api/entries?id=YOUR_ENTRY_ID&token=YOUR_ENTRIES_TOKEN
    ```

    **Fetch single with options**
    ```
    GET /api/entries?id=YOUR_ENTRY_ID&options=[filter]&token=YOUR_ENTRIES_TOKEN
    ```

    **Fetch collection**
    ```
    GET /api/entries?id=YOUR_ENTRY_ID&options[collection]=true&token=YOUR_ENTRIES_TOKEN
    ```

    **Fetch collection with options**
    ```
    GET /api/entries?id=YOUR_ENTRY_ID&options[collection]=true&options=[find]&[filter]&token=YOUR_ENTRIES_TOKEN
    ```

* **rest-api-entries** add ability to call macroable fetch methods. ([#505](https://github.com/flextype/flextype/issues/505))

    With help of query option `?options[method]=` we should able to call any macroable fetch methods.

    ### Example

    **Macroable method XML**

    ```
    flextype('entries')::macro('fetchXml', function(string $id, array $options) {
      return ['XML DATA HERE'];
    });
    ```

    **HTTP GET:**

    ```
    GET /api/entries?id=YOUR_ID&options[method]=fetchXml&token=YOUR_ENTRIES_TOKEN
    ```

* **rest-api-media** reorganize endpoints for Media Rest API ([#514](https://github.com/flextype/flextype/issues/514))

* **rest-api-media** add ability to call macroable fetch methods for Folder. ([#512](https://github.com/flextype/flextype/issues/512))

    With help of query option `?options[method]=` we should able to call any macroable fetch methods.

    ### Example

    **Macroable method**

    ```
    flextype('media')->folders()::macro('fetchFromOtherStorage', function(string $id, array $options) {
      // fetch data from Other Storage using $id and $options
    });
    ```

    **HTTP GET:**

    ```
    GET /api/folders?id=YOUR_MEDIA_FILES_ID&options[method]= fetchFromOtherStorage&token=YOUR_MEDIA_FOLDERS_TOKEN
    ```

* **rest-api-media** add ability to call macroable fetch methods for Files. ([#513](https://github.com/flextype/flextype/issues/513))

    With help of query option `?option[method]=` we should able to call any macroable fetch methods.

    ### Example

    **Macroable method**

    ```
    flextype('media')->files()::macro('fetchFromOtherStorage', function(string $id, array $options) {
      // fetch data from Other Storage using $id and $options
    });
    ```

    **HTTP GET:**

    ```
    GET /api/files?id=YOUR_MEDIA_FILES_ID&option[method]=fetchFromOtherStorage&token=YOUR_MEDIA_FILES_TOKEN
    ```

### Bug Fixes

* **fields** fix issue with slug field in Entries API ([#520](https://github.com/flextype/flextype/issues/520))

* **core** fix issue with invalid timezone setting ([#490](https://github.com/flextype/flextype/issues/490))

* **entries** fix issue with not exists entries collections. ([#503](https://github.com/flextype/flextype/issues/503))

* **entries** fix issue with collisions in Entries API $storage for entries fetching. ([#496](https://github.com/flextype/flextype/issues/496))

* **rest-api-entries** fix issue with 404 status code in Entries Rest API ([#502](https://github.com/flextype/flextype/issues/502))

* **rest-api** fix issue with Rest API endpoints initialisation. ([#506](https://github.com/flextype/flextype/issues/506))

### BREAKING CHANGES

* **media** standardise media container names with macroable ability for Media API. ([#517](https://github.com/flextype/flextype/issues/517))

    | NEW CONTAINER           | OLD CONTAINER              |   
    |------------------|------------------|
    | media      | media_files, media_files_meta, media_folders, media_folders_meta      |

* **parsers** standardise parsers container names with macroable ability. ([#519](https://github.com/flextype/flextype/issues/519))

    | NEW CONTAINER           | OLD CONTAINER              |   
    |------------------|------------------|
    | parsers      | shortcode, markdown       |

* **serializers** standardise serializers container names with macroable ability. ([#518](https://github.com/flextype/flextype/issues/518))

    | NEW CONTAINER           | OLD CONTAINER              |   
    |------------------|------------------|
    | serializers      | yaml, json, frontmatter       |

* **rest-api-media** reorganize endpoints for Media Rest API ([#514](https://github.com/flextype/flextype/issues/514))

    |  | NEW ENDPOINT | OLD ENDPOINT |
    |---|---|---|
    | **GET** |  /api/media/files |  /api/files |
    | **POST** |  /api/media/files |  /api/files |
    | **PUT** |  /api/media/files |  /api/files |
    | **PATCH** |  /api/media/files |  /api/files |
    | **DELETE** |  /api/media/files |  /api/files |
    | **POST** |  /api/media/files/copy |  /api/files/copy |
    | **PATCH** |  /api/media/files/meta |  /api/files/meta |
    | **POST** |  /api/media/files/meta |  /api/files/meta |
    | **DELETE** |  /api/media/files/meta |  /api/files/meta |
    | **GET** |  /api/media/folders |  /api/folders |
    | **POST** |  /api/media/folders |  /api/folders |
    | **PATCH** |  /api/media/folders |  /api/folders |
    | **DELETE** |  /api/media/folders |  /api/folders |
    | **POST** |  /api/media/folders/copy |  /api/folders/copy |

    **Tokens:**
    - token for files should be moved from `/tokens/files/` to `/tokens/media/files/`
    - token for folders should be moved from `/tokens/folders/` to `/tokens/media/folders/`

    **Settings:**
    ```yaml
    api:
      ...
      media:
        files:
          enabled: true
          default_token:
        folders:
          enabled: true
          default_token:
    ```

* **helpers** `filter` helper return `array` result every time and not `int` or `bool`. ([#493](https://github.com/flextype/flextype/issues/493))

* **helpers** `filter` helper not support `slice_offset` and `slice_limit` because they are are duplicates already exists functionality `offset` and `limit`. ([#493](https://github.com/flextype/flextype/issues/493))

* **helpers** `filter` helper not support `count` and `exists`. ([#493](https://github.com/flextype/flextype/issues/493))

* **entries** we have changes in the events names for Entries API ([#499](https://github.com/flextype/flextype/issues/499))

    Events:

    **onEntriesFetch**  
    **onEntriesFetchSingle** instead of **onEntryInitialized**  
    **onEntriesFetchSingleCacheHasResult** instead of **onEntryAfterCacheInitialized**  
    **onEntriesFetchSingleNoResult**  
    **onEntriesFetchSingleHasResult** instead of **onEntryAfterInitialized**  
    **onEntriesFetchCollection** instead of **onEntriesInitialized**  
    **onEntriesFetchCollectionHasResult** instead of **onEntriesAfterInitialized**  
    **onEntriesFetchCollectionNoResult**  
    **onEntriesMove** instead of **onEntryMove**  
    **onEntriesUpdate** instead of **onEntryUpdate**  
    **onEntriesCreate** instead of **onEntryCreate**  
    **onEntriesDelete** instead of **onEntryDelete**  
    **onEntriesCopy** instead of **onEntryCopy**  
    **onEntriesHas** instead of **onEntryHas**  

* **entries** Flextype EMS structure is changes because of issues with collisions ([#496](https://github.com/flextype/flextype/issues/496))

    Updated structure:

    ```php
    $storage = [
        'fetch' => [
          'id' => '',
          'data' => [],
          'options' => [
              'find' => [],
              'filter' => [],
          ],
        ],
        'create' => [
          'id' => '',
          'data' => [],
        ],
        'update' => [
          'id' => '',
          'data' => [],
        ],
        'delete' => [
          'id' => '',
        ],
        'copy' => [
          'id' => '',
          'newID' => '',
        ],
        'move' => [
          'id' => '',
          'newID' => '',
        ],
        'has' => [
          'id' => '',
        ],
    ];
    ```
* **rest-api-entries** Entries Rest API - for collection fetch we should define this in the request query `&options[collection]=true`

* **rest-api-entries** Entries Rest API - instead of `&filter=[]` we should define filtering in the request query like this `&options[find]` and `&options[filter]`

* **rest-api-media-files** Media Files Rest API - for collection fetch we should define this in the request query `&options[collection]=true`

* **rest-api-media-folders** Media Folders Rest API - instead of `&filter=[]` we should define filtering in the request query like this `&options[find]` and `&options[filter]`

* **images** we will use `media/` folder instead of `uploads/entries/` ([#516](https://github.com/flextype/flextype/issues/516))

    - folder `uploads/entries/` should should be renamed to `media/entries/` related to this ticket: #515
    - in the endpoint `/api/images/{path:.+}` path for entries, should starts with `/entries/`.

    **Example:**  

    **old:** `/api/images/home/banner.jpg`
    **new:** `/api/images/entries/home/banner.jpg`

* **entries** we should use only `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#495](https://github.com/flextype/flextype/issues/495))

    - method `fetchSingle()` removed. Use `fetch($id, $options)` method.
    - methods `fetchCollection` removed. Use  `fetch($id, ['collection' => true])` method.

* **media-folders** we should use only `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#509](https://github.com/flextype/flextype/issues/509))

    - method `fetchSingle()` removed. Use `fetch($id, $options)` method.
    - methods `fetchCollection` removed. Use  `fetch($id, ['collection' => true])` method.

* **media-files** we should use only `fetch()` method as entry point to execute different methods with `fetch` prefix. ([#508](https://github.com/flextype/flextype/issues/508))

    - method `fetchSingle()` removed. Use `fetch($id, $options)` method.
    - methods `fetchCollection` removed. Use  `fetch($id, ['collection' => true])` method.

<a name="0.9.12"></a>
# [0.9.12](https://github.com/flextype/flextype/compare/v0.9.11...v0.9.12) (2020-12-07)

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

### Update from Flextype 0.9.12 to Flextype 0.9.13

1. Backup your Site First!
2. **Read BREAKING CHANGES section!**
3. Download flextype-0.9.13.zip
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
