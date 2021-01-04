<a name="1.8.0"></a>
# [1.8.0](https://github.com/flextype-plugins/twig/compare/v1.6.0...v1.7.0) (2021-01-03)

### Features

* **core** update code base for new Flextype 0.9.15

<a name="1.7.1"></a>
# [1.7.1](https://github.com/flextype-plugins/twig/compare/v1.7.0...v1.7.1) (2021-01-01)

### Bug Fixes

* **extension** fix filter for Markdown

<a name="1.7.0"></a>
# [1.7.0](https://github.com/flextype-plugins/twig/compare/v1.6.0...v1.7.0) (2020-12-30)

### Features

* **core** update code base for new Flextype 0.9.14
* **core** Moving to PHP 7.4
* **core** use new TWIG Plugin 1.7.0
* **extension** new Constants Extension
* **extension** new Filesystem Extension
* **extension** new Flextype Extension
* **extension** new Filters Extension

New docs on the way here https://github.com/flextype-plugins/twig/

BREAKING CHANGES

* in the templates use `flextype.registry` instead of `registry`
* in the templates use `flextype.entries` instead of `entries`
* in the templates use `flextype.media` instead of `media_*`

<a name="1.6.0"></a>
# [1.6.0](https://github.com/flextype-plugins/twig/compare/v1.5.1...v1.6.0) (2020-12-20)

### Features

* **core** update code base for new Flextype 0.9.13

<a name="1.5.1"></a>
# [1.5.1](https://github.com/flextype-plugins/twig/compare/v1.5.0...v1.5.1) (2020-12-10)

### Bug fixes

* **media** fix namespace for media

<a name="1.5.0"></a>
# [1.5.0](https://github.com/flextype-plugins/twig/compare/v1.4.0...v1.5.0) (2020-12-10)

### Features

* **core** add Media support

    ```
    media_files.fetchSingle()
    media_files.fetchCollection()
    media_files.has()
    media_files.getFileLocation()

    media_files_meta.getFileMetaLocation()

    media_folders.fetchSingle()
    media_folders.fetchCollection()
    media_folders.has()
    media_folders.getDirectoryLocation()

    media_files_meta.getDirectoryMetaLocation()
    ```

<a name="1.4.0"></a>
# [1.4.0](https://github.com/flextype-plugins/twig/compare/v1.3.0...v1.4.0) (2020-12-07)

### Features

* **core** update code base for new Flextype 0.9.12

<a name="1.3.0"></a>
# [1.3.0](https://github.com/flextype-plugins/twig/compare/v1.2.0...v1.3.0) (2020-08-25)

### Features

* **core** update code base for new Flextype 0.9.11

<a name="1.2.0"></a>
# [1.2.0](https://github.com/flextype-plugins/twig/compare/v1.1.1...v1.2.0) (2020-08-19)

### Features

* **core** update code base for new Flextype 0.9.10

<a name="1.1.1"></a>
# [1.1.1](https://github.com/flextype-plugins/twig/compare/v1.1.0...v1.1.1) (2020-08-05)

### Bug Fixes

* **core** fixes for new Twig 3

<a name="1.1.0"></a>
# [1.1.0](https://github.com/flextype-plugins/twig/compare/v1.0.7...v1.1.0) (2020-08-05)

### Features

* **core** update code base for new Flextype 0.9.9

<a name="1.0.7"></a>
# [1.0.7](https://github.com/flextype-plugins/twig/compare/v1.0.6...v1.0.7) (2020-07-02)

### Bug fixes
* **extension** fix markdown and shortcodes extensions

<a name="1.0.6"></a>
# [1.0.6](https://github.com/flextype-plugins/twig/compare/v1.0.5...v1.0.6) (2020-07-01)

### Bug fixes
* **extension** fix markdown and shortcodes extensions

<a name="1.0.5"></a>
# [1.0.5](https://github.com/flextype-plugins/twig/compare/v1.0.4...v1.0.5) (2020-06-25)

### Bug fixes

* **core:** fix parser_parse() method

<a name="1.0.4"></a>
# [1.0.4](https://github.com/flextype-plugins/twig/compare/v1.0.3...v1.0.4) (2020-06-13)

### Feature

* **core:** add FlashTwigExtension

<a name="1.0.3"></a>
# [1.0.3](https://github.com/flextype-plugins/twig/compare/v1.0.2...v1.0.3) (2020-06-09)

### Feature

* **core:** add ArrTwigExtension

<a name="1.0.2"></a>
# [1.0.2](https://github.com/flextype-plugins/twig/compare/v1.0.1...v1.0.2) (2020-05-07)

### Bug fixes

* **core:** fix markdown filter

<a name="1.0.1"></a>
# [1.0.1](https://github.com/flextype-plugins/twig/compare/v1.0.0...v1.0.1) (2020-05-07)

### Features

* **core:** add new Shortcode Twig filter

    ```
    {{ entry.content|shortcode }}
    ```

<a name="1.0.0"></a>
# [1.0.0](https://github.com/flextype-plugins/twig) (2020-04-28)
* Initial Release
