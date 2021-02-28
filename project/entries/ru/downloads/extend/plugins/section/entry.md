---
title: Section
description: Section plugin provides a basic way to work with content sections.
icon:
  name: layer-group
  set: fontawesome|solid
category: content
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/section
documentation: https://github.com/flextype-plugins/section
template: plugin
seo:
  title: Get Section Plugin for Open Source Hybrid Content Management System
  description: Section Plugin to provides a basic way to work with content sections for Open Source Hybrid Content Management System
  keywords: Flextype Section Plugin, Flextype CMS Section Plugin, Headless CMS Section Plugin, Download Flat File CMS Section Plugin, Download Flat File Content Management System Section Plugin, Download PHP CMS Section Plugin, Section Plugin, Plugin, Section, Content, Management, System, PHP, CMS
---

Section plugin provides a basic way to work with content sections.

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/section`
3. Download Section Plugin and unzip plugin content to the folder `/project/plugins/section`

#### Settings

| Key     | Value | Description                         |
| ------- | ----- | ----------------------------------- |
| enabled | true  | true or false to disable the plugin |

#### Usage in page content

Create section
```html
[section_create id=section-name]Section content here[/section_create]
```

Get section
```html
[section_fetch id=section-name]
```
