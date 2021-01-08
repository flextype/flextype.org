<h1 align="center">Icon Plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/icon/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/icon.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/icon"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/icon"><img src="https://img.shields.io/github/downloads/flextype-plugins/icon/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.15-green.svg?color=black" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Icon plugin to present most popular icons sets in SVG format for Flextype.  

This plugin currently contains 3 primary SVG icon sets:
* [Font Awesome](https://fontawesome.com) -  A set of 1600+ free high-quality SVG icons by [Fonticons, Inc.](https://twitter.com/fontawesome)
* [Bootstrap Icons](https://icons.getbootstrap.com) - A set of 1200+ free high-quality SVG icons by [Bootstrap Team](https://getbootstrap.com/docs/5.0/about/team/)
* [Tabler Icons](https://tablericons.com/) - A set of 950+ free high-quality SVG icons by [Csaba Kissi](https://twitter.com/csaba_kissi)

## Dependencies

The following dependencies need to be installed for Icon Plugin.

## System

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.15 | [download](https://github.com/flextype/flextype/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=2.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/icon`
3. Download Icon Plugin and unzip plugin content to the folder `/project/plugins/icon`

## Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 1 | Icon plugin priority |

## Documentation

Global function `icon()`

```php
/**
 * Get SVG icon from specific icons set.
 *
 * @param string|null  $name Icon name.
 * @param string|null  $set  Icon set:
 *                             - tabler
 *                             - bootstrap
 *                             - fontawesome|brands,
 *                             - fontawesome|regular
 *                             - fontawesome|solid
 * @param string|null  $class CSS Class.
 *
 * @return string
 */
function icon(?string $name = null, ?string $set = 'fontawesome|solid', ?string $class = null): string
```

### Usage

**Display icon in the twig templates**

```
{{ icon('apple', 'fontawesome|brands') }}
```

**Display icon in the entry content**
```
[icon name="apple" set="fontawesome|brands"]
```

**Display icon in the php**

```php
echo icon('apple', 'fontawesome|brands');
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/icon/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
