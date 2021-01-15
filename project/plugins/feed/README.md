<h1 align="center">Feed Plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/feed/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/feed.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/feed"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/feed"><img src="https://img.shields.io/github/downloads/flextype-plugins/feed/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.16-green.svg?color=black" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Feed plugin for Flextype supports Atom 1.0, RSS and JSON feed types and allows you to generate feeds for entries.  

## Dependencies

The following dependencies need to be downloaded and installed for Feed Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.16 | [download](https://github.com/flextype/flextype/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=2.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/feed`
3. Download Feed Plugin and unzip plugin content to the folder `/project/plugins/feed`

## Documentation

### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 100 | Feed plugin priority |
| feed | [] | Feed specific data |

### Usage

Inside `project/config/plugins/feed/settings.yaml` you may create unlimited feed for you entries.

Lets create RSS, ATOM and JSON feed for blog collection:

```yaml
feed:
  blog-rss:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      length: 400
      format: rss
      route: '/blog.rss'
  blog-atom:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      length: 400
      format: json
      route: '/blog.atom'
  blog-json:
    id: blog
    options:
      title: Blog
      description: Blog description
      collection: true
      length: 400
      format: json
      route: '/blog.json'
```

#### Display feed urls in the TWIG templates

You may easily display feed urls from example above in TWIG templates:

```twig
<a href="{{ url() }}/blog.atom">Atom 1.0</a>
<a href="{{ url() }}/blog.rss">RSS</a>
<a href="{{ url() }}/blog.json">JSON</a>
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/feed/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
