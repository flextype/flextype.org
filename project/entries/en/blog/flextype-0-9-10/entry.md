---
title: Flextype 0.9.10 release
tags: release
template: blog-post
published_at: '19-08-2020 09:46'
author:
  name: Sergey Romanenko
---


### Features

* **core** Moving to PHP 7.3.0 ([#456](https://github.com/flextype/flextype/issues/456))
* **core** add new class `Flextype` that extends `Slim\App` ([#458](https://github.com/flextype/flextype/issues/458))

    with methods:

    ```
    /**
     * Get Dependency Injection Container.
     *
     * @param string $key DI Container key.
     */
    public function container(?string $key = null)

    /**
     * Returns Flextype Instance
     */
    public static function getInstance()

    /**
     * This method will returns the current Flextype version
     */
    public static function getVersion() : string
    ```

* **collection** Add `only()` method for Collection ([#455](https://github.com/flextype/flextype/issues/455))

    Example:
    ```
    ...->only(['id', 'title'])->...
    ```

* **entries** Rename path to id in Entries API ([#453](https://github.com/flextype/flextype/issues/453))

    New implementation
    ```
    // Entry properties
    $entry_id
    $entries_id

    // Arguments
    $id
    $new_id
    ```

* **shortcode** add New Shortcode ([#454](https://github.com/flextype/flextype/issues/454))

    ```
    [raw] Raw shortcode content [/raw]
    ```

* **shortcode** add New Shortcode Methods ([#454](https://github.com/flextype/flextype/issues/454))

    ```
    // Get shortcode instance.
    getInstance()

    // Add shortcode handler.
    addHandler(string $name, $handler)

    // Add event handler.
    addEventHandler($name, $handler)

    // Processes text and replaces shortcodes.
    process(string $input, bool $cache = true)
    ```

### Bug Fixes

* **entries** fix issue with entries paths on Windows ([#460](https://github.com/flextype/flextype/issues/460))
* **cache** fix issue with `purge()` method. ([#451](https://github.com/flextype/flextype/issues/451))
* **entries** fix wrong Implementation of Slug Field for Entries ([#452](https://github.com/flextype/flextype/issues/452))
* **entries** add new entry field `id` ([#452](https://github.com/flextype/flextype/issues/452))

### BREAKING CHANGES

* **entries** Rename path to id in Entries API ([#453](https://github.com/flextype/flextype/issues/453))

    Old Entry properties
    ```
    $entry_path
    $entries_path
    ```

    New Entry properties
    ```
    $entry_id
    $entries_id
    ```

* **entries** fix wrong Implementation of Slug Field for Entries ([#452](https://github.com/flextype/flextype/issues/452))

    From now we have entry fields:

    `slug` with current entry slug.

    Example:
    ```
    flextype-0.9.10
    ```

    `id` with current entry full path as it is was for slug field.

    Example:
    ```
    blog/flextype-0.9.10
    ```

* **shortcode** We should use `process()` method instead of `parse()` for shortcode processing. ([#454](https://github.com/flextype/flextype/issues/454))

    Example of new usage in PHP:

    ```
    ...->shortcode->process($input, $cache);
    ```

* **core** `$container`, `$flextype` and `$app` objects removed! ([#458](https://github.com/flextype/flextype/issues/458))

    We should use new object `$flextype` as it is a consolidate entry point to all Flextype features.

    Here is some examples:

    ```
    // OLD
    $app->get(...)
    $app->post(...)
    ...

    // NEW
    $flextype->get(...)
    $flextype->post(...)
    ...
    ```
    ```
    // OLD
    $container['registry'] = static function ($container) {
    return new Registry($container);
    };

    $container->registry->get(...)

    // NEW
    $flextype->container()['registry'] = static function () use ($flextype) {
    return new Registry($flextype);
    };

    $flextype->container('registry')->get(....)
    ```

* **core** class `Container` removed! ([#458](https://github.com/flextype/flextype/issues/458))

    We should use `$flextype` object to access all Flextype features inside Service Controllers and Models.

    Here is some examples:

    ```
    // OLD
    class FooController extends Container
    {
      public function bar()
      {
          return $this->registry->get('.....');
      }
    }

    // NEW
    class FooController
    {
      protected $flextype;

      public function __construct($flextype)
      {
          $this->flextype = $flextype;
      }

      public function bar()
      {
          return $this->flextype->container('registry')->get('.....');
      }
    }
    ```


### Update from Flextype 0.9.9 to Flextype 0.9.10

1. Backup your Site First!
2. **Read BREAKING CHANGES section!**
3. Download flextype-0.9.10.zip
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
7. Remove folder `var/` !
8. Clear browser cache!
