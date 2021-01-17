---
title: Redirect
description: Simple redirect plugin for Flextype.
icon:
  name: directions
  set: fontawesome|solid
category: content
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/redirect
documentation: https://github.com/flextype-plugins/redirect
template: plugin
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/redirect`
3. Download Redirect Plugin and unzip plugin content to the folder `/project/plugins/redirect`

#### Settings

| Key      | Value | Description                         |
| -------- | ----- | ----------------------------------- |
| enabled  | true  | true or false to disable the plugin |
| priority | 100   | Redirect plugin priority            |
| redirect | []    | Redirect specific data              |

#### Usage

You may define unlimited redirects in `project/config/plugins/redirect/settings.yaml`

Here is basic example of simple redirects:

```yaml
redirect:
  -
    from: '/home'
    to: './'
    status: 301
  -
    from: '/'
    to: './en'
    status: 301
```
