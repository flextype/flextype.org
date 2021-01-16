---
title: Icon
description: Icon plugin to present Font Awesome icons set for Flextype.
icon:
  name: font-awesome-flag
  set: fontawesome|brands
category: templating, icons
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/icon
documentation: https://github.com/flextype-plugins/icon
template: plugin
---

Icon plugin to present most popular icons sets in SVG format for Flextype.

This plugin currently contains 3 primary SVG icon sets:
* [Font Awesome](https://fontawesome.com) -  A set of 1600+ free high-quality SVG icons by [Fonticons, Inc.](https://twitter.com/fontawesome)
* [Bootstrap Icons](https://icons.getbootstrap.com) - A set of 1200+ free high-quality SVG icons by [Bootstrap Team](https://getbootstrap.com/docs/5.0/about/team/)
* [Tabler Icons](https://tablericons.com/) - A set of 950+ free high-quality SVG icons by [Csaba Kissi](https://twitter.com/csaba_kissi)

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/icon`
3. Download Icon Plugin and unzip plugin content to the folder `/project/plugins/icon`

#### Settings

| Key      | Value | Description                         |
| -------- | ----- | ----------------------------------- |
| enabled  | true  | true or false to disable the plugin |
| priority | 1     | Icon plugin priority                |

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

#### Usage

**Display icon in the twig templates**

```
{{ icon('apple', 'fontawesome|brands') }}
```

**Display icon in the entry content**
```
[raw][icon name="apple" set="fontawesome|brands"][/raw]
```

**Display icon in the php**

```php
echo icon('apple', 'fontawesome|brands');
```
