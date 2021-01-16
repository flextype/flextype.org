---
title: Reading Time
description: Estimated reading time plugin for Flextype.
icon:
  name: clock
  set: fontawesome|solid
category: content
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/reading-time
documentation: https://github.com/flextype-plugins/reading-time
template: plugin
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/reading-time`
3. Download Reading Time Plugin and unzip plugin content to the folder `/project/plugins/reading-time`

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 100 | Reading Time plugin priority |

Function `readingTime()` in namespace `Flextype\Plugin\ReadingTime`

```php
/**
 * Get reading time
 *
 * @return string
 */
 function readingTime(string $content, array $options = []): string
```

### Usage

Display reading time with custom translates in the twig templates

```twig
{{ readingTime(entry.content, {
                'minute': 'Minute',
                'minutes': 'Minutes',
                'second':  'Second',
                'seconds': 'Seconds'
                }) }}
```

Display reading time with custom translates and format in the twig templates

```twig
{{ readingTime(entry.content, {
                'minute': 'Minute',
                'minutes': 'Minutes',
                'second':  'Second',
                'seconds': 'Seconds',
                'format': '{minutes_count} {minutes_label} – {seconds_count} {seconds_label}'
                }) }}
```

Display reading time with custom translates and format that alternative format that hides the minute label in the twig templates

```twig
{{ readingTime(entry.content, {
                'minute': 'Minute',
                'minutes': 'Minutes',
                'second':  'Second',
                'seconds': 'Seconds',
                'format': '{minutes_count} {minutes_label} – {seconds_count} {seconds_label}'
                }) }}
```

Display page view counter in the php

```php
echo Flextype\Plugin\ReadingTime\readingTime($content, $options);
```
