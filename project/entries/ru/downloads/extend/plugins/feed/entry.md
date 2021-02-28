---
title: Feed
description: Feed plugin for Flextype supports Atom 1.0, RSS and JSON feed types and allows you to generate feeds for entries.
icon:
  name: rss-square
  set: fontawesome|solid
category: seo
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/feed
documentation: https://github.com/flextype-plugins/feed
template: plugin
seo:
  title: Get Feed Plugin for Open Source Hybrid Content Management System
  description: Feed Plugin for Open Source Hybrid Content Management System supports Atom 1.0, RSS and JSON feed types and allows you to generate feeds
  keywords: Flextype Feed Plugin, Flextype CMS Feed Plugin, Headless CMS Feed Plugin, Download Flat File CMS Feed Plugin, Download Flat File Content Management System Feed Plugin, Download PHP CMS Feed Plugin, Feed Plugin, Plugin, Feed, Content, Management, System, PHP, CMS
---

#### Features

Feed plugin for Flextype supports Atom 1.0, RSS and JSON feed types and allows you to generate feeds for entries.

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/feed`
3. Download Feed Plugin and unzip plugin content to the folder `/project/plugins/feed`

#### Settings

| Key      | Value | Description                         |
| -------- | ----- | ----------------------------------- |
| enabled  | true  | true or false to disable the plugin |
| priority | 100   | Feed plugin priority                |
| feed     | []    | Feed specific data                  |

#### Usage

In `project/config/plugins/feed/settings.yaml` you may create unlimited feed for you entries.

Lets create RSS, ATOM and JSON feed for blog collection:

```yaml
feed:
  blog-rss:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      Feedat: rss
      route: '/blog.rss'
  blog-atom:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      Feedat: atom
      route: '/blog.atom'
  blog-json:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      Feedat: json
      route: '/blog.json'
```

#### Display feed urls in the TWIG templates

You may easily display feed urls from example above in TWIG templates:

```twig
<a href="{{ url() }}/blog.atom">Atom 1.0</a>
<a href="{{ url() }}/blog.rss">RSS</a>
<a href="{{ url() }}/blog.json">JSON</a>
```
