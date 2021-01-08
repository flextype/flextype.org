<h1 align="center">Site Plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/site/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/site.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/site"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/site"><img src="https://img.shields.io/github/downloads/flextype-plugins/site/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.15-green.svg" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Site plugin to display entries content on the website frontend.

## Dependencies

The following dependencies need to be downloaded and installed for Site Plugin.

### System

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.15 | [download](https://github.com/flextype/flextype/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=2.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |
| [noir](https://github.com/flextype-themes/noir) | >=1.0.0 | [download](https://github.com/flextype-themes/noir/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/site`
3. Download Site Plugin and unzip plugin content to the folder `/project/plugins/site`

## Documentation

### Twig variables for Site Plugin

| Variable | Description |
|---|---|
| entry | The entry object with all the information about the current page you are currently on. |
| query | The Query Params |
| uri | The URI string |

#### Examples

```twig
{{ entry.title }} {# returns the current entry title #}
```

### Theming

#### Theme Installation

1. Unzip theme to the folder `/project/themes/`
2. Go to `/project/config/settings.yaml` and update `theme` setting with your theme name.
3. Save your changes.

#### Theme Configuration

You can easily access theme configuration and theme information from your Twig and PHP files.

### Accessing Theme Information

Information from the currently active theme can get from the `registry` object.

Example information from `/project/themes/noir/theme.yaml`

```yaml
name: Noir
version: 1.0.0
description: Noir theme for Flextype
author:
  name: Sergey Romanenko
  email: support@flextype.org
  url: https://flextype.org
homepage: https://github.com/flextype-themes/noir
bugs: https://github.com/flextype-themes/noir/issues
license: MIT
```

You can reach any of these items via registry `themes` by using the standard dot-syntax:

Usage:

```twig
Theme name: {{ flextype.registry.get('themes.noir.manifest.name') }}
Theme version: {{ flextype.registry.get('themes.noir.manifest.version') }}
```

Result:

```twig
Theme name: Noir
Theme version: 1.0.0
```

You can also reach these same values from a Flextype theme(s) with PHP syntax:

Usage:

```php
$theme_name = flextype('registry')->get('themes.noir.manifest.name');
$theme_version = flextype('registry')->get('themes.noir.manifest.version');
```

### Accessing Theme Configuration

Themes have default and project configuration files, named `settings.yaml` located in `/project/themes/<themename>/` and in `/project/config/themes/<themename>/`

For example, let us consider the Noir theme and there is a file called `settings.yaml` in the themes site settings folder. The contents of this configuration file look like this:

```yaml
enabled: true
```

Let us add some custom theme settings.

Open `/project/config/themes/noir/settings.yaml` and add new variable with value `highlight: red`

```yaml
enabled: true
highlight: red
```

Then in your theme templates you can access these variable using the `themes.noir` object:

```twig
<h1 style="color:{{ flextype.registry.get('themes.noir.settings.highlight') }}">
    BUILD FAST, FLEXIBLE, EASIER TO MANAGE WEBSITES WITH FLEXTYPE.
</h1>
```

Result:

<h1 style="color:red">BUILD FAST, FLEXIBLE, EASIER TO MANAGE WEBSITES WITH FLEXTYPE.</h1>


In PHP you can access the current theme configuration like this:

```php
$highlight = flextype('registry')->get('themes.noir.settings.highlight');
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/site/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
