<a name="1.10.0"></a>
# [1.10.0](https://github.com/flextype-plugins/site/compare/v1.9.0...v1.10.0) (2021-01-07)

### Features

* Update code base for new Icon 2.0.0

<a name="1.9.0"></a>
# [1.9.0](https://github.com/flextype-plugins/site/compare/v1.8.0...v1.9.0) (2021-01-03)

### Features

* **core** add plugin.php file
* **core** improve controllers handling in routes for performance enhancements

### Bug Fixes

* **bootstrap** fix and improve bootstrap loading.

<a name="1.8.0"></a>
# [1.8.0](https://github.com/flextype-plugins/site/compare/v1.7.0...v1.8.0) (2020-12-30)

### Features

* **core** update code base for new Flextype 0.9.14
* **core** Moving to PHP 7.4
* **core** use new TWIG Plugin 1.7.0
* **routes** use new `onFlextypeBeforeRun` event for site routing.

BREAKING CHANGES

* removed `$entry` property, use entries storage functionality instead.
* removed even `onSiteEntryAfterInitialized`, use event `onEntriesFetchSingleHasResult` instead.
* removed template variable `query` and `uri`, use an full power of new `$request` variable.

<a name="1.7.0"></a>
# [1.7.0](https://github.com/flextype-plugins/site/compare/v1.6.1...v1.7.0) (2020-12-23)

### Features

* **core** add ability to use variables $args and $request inside templates

<a name="1.6.1"></a>
# [1.6.1](https://github.com/flextype-plugins/site/compare/v1.6.0...v1.6.1) (2020-12-20)

### Bug Fixes

* **bootstrap** fix and improve bootstrap loading.

<a name="1.6.0"></a>
# [1.6.0](https://github.com/flextype-plugins/site/compare/v1.5.0...v1.6.0) (2020-12-20)

### Features

* **core** update code base for new Flextype 0.9.13

<a name="1.5.0"></a>
# [1.5.0](https://github.com/flextype-plugins/site/compare/v1.4.0...v1.5.0) (2020-12-07)

### Features

* **core** update code base for new Flextype 0.9.12

<a name="1.4.0"></a>
# [1.4.0](https://github.com/flextype-plugins/site/compare/v1.3.0...v1.4.0) (2020-08-25)

### Features

* **core** update code base for new Flextype 0.9.11

<a name="1.3.0"></a>
# [1.3.0](https://github.com/flextype-plugins/site/compare/v1.2.0...v1.3.0) (2020-08-19)

### Features

* **core** update code base for new Flextype 0.9.10

<a name="1.2.0"></a>
# [1.2.0](https://github.com/flextype-plugins/site/compare/v1.1.0...v1.2.0) (2020-08-06)

### Features

* **core** add Themes functionality
* **core** add ability to include Theme bootstrap file.

<a name="1.1.0"></a>
# [1.1.0](https://github.com/flextype-plugins/site/compare/v1.0.2...v1.1.0) (2020-08-05)

### Features

* **core** update code base for new Flextype 0.9.9

<a name="1.0.2"></a>
# [1.0.2](https://github.com/flextype-plugins/site/compare/v1.0.1...v1.0.2) (2020-06-13)

### Features

* **route:** add csrf for all site routes

<a name="1.0.1"></a>
# [1.0.1](https://github.com/flextype-plugins/site/compare/v1.0.0...v1.0.1) (2020-05-05)

### Bug Fixes

* **core:** fix dependencies

<a name="1.0.0"></a>
# [1.0.0](https://github.com/flextype-plugins/site) (2020-04-28)
* Initial Release
