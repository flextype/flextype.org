<h1 align="center">Sitemap Plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/themes-admin/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/sitemap.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/sitemap"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/sitemap"><img src="https://img.shields.io/github/downloads/flextype-plugins/sitemap/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.12-green.svg?color=black" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Sitemap plugin provide automatically generated XML sitemap for Flextype.

## Dependencies

The following dependencies need to be downloaded and installed for Sitemap Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.12 | [download](https://github.com/flextype/flextype/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=1.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/sitemap`
3. Download Sitemap Plugin and unzip plugin content to the folder `/project/plugins/sitemap`

## Documentation

### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 95 | sitemap plugin priority |
| route | sitemap.xml | sitemap route |
| ignore | [] | List of entries to ignore |
| additions | [] | List of additions to add |
| default.changefreq | daily | How frequently the page is likely to change. This value provides general information to search engines and may not correlate exactly to how often they crawl the page. Valid values are: always, hourly, daily, weekly, monthly, yearly, never. More info in |
| default.priority | 1 | The priority of this URL relative to other URLs on your site. Valid values range from 0.0 to 1.0. This value does not affect how your pages are compared to pages on other sites—it only lets the search engines know which pages you deem most important for the crawlers. The default priority of a page is 1. |
| date_format | Y-m-d | Date format |

### Ignore entry(entries)

You can ignore your specific entries by providing a list of slug's to ignore.

```yaml
ignore:
  - blog/blog-post-to-ignore
  - ignore-this-entry
```

You can also use a entry Frontmatter to signal that the sitemap should ignore it:
```yaml
sitemap:
  ignore: true
```

### Set default values for entry(entries)

```yaml
sitemap:
  changefreq: weekly
  priority: 0.8
```

### Manually add entry(entries) to the sitemap

```yaml
additions:
  -
    loc: something-special
    lastmod: '2020-04-16'
    changefreq: hourly
    priority: 0.3
```

### Dynamically adding entry(entries) to the sitemap

```php
flextype('emitter')->addListener('onSitemapAfterInitialized', function() {
    flextype('SitemapController')->sitemap[] = ['loc' => 'something-special-to-add',
                                               'lastmod' => '03-07-2020 09:46',
                                               'changefreq' => 'daily',
                                               'priority' => 1.0];
});

```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/sitemap/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
