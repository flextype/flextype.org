---
title: Page View Counter
description: Page View Counter plugin will help you to know how many readers of every page on your website.
icon:
  name: eye
  set: fontawesome|solid
category: content
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/page-view-counter
documentation: https://github.com/flextype-plugins/page-view-counter
template: plugin
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/page-view-counter`
3. Download Page View Counter Plugin and unzip plugin content to the folder `/project/plugins/page-view-counter`

#### Settings

| Key      | Value | Description                         |
| -------- | ----- | ----------------------------------- |
| enabled  | true  | true or false to disable the plugin |
| priority | 100   | Page View Counter plugin priority   |

Function `pageViewCounter()` in namespace `Flextype\Plugin\PageViewCounter`

```php
/**
 * Get page view counter
 *
 * @return int
 */
function pageViewCounter(): int
```

#### Usage

**Display page view counter in the twig templates**

```
{{ pageViewCounter() }}
```

**Display page view counter in the entry content**
```
[pageViewCounter]
```

**Display page view counter in the php**

```php
echo Flextype\Plugin\PageViewCounter\pageViewCounter();
```
