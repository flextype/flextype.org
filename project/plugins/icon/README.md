<h1 align="center">Icon Plugin for <a href="http://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/icon/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/icon/icon.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/icon"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/icon"><img src="https://img.shields.io/github/downloads/flextype-plugins/icon/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.13-green.svg?color=black" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Icon plugin to present [Font Awesome](https://fontawesome.com/) icons set for Flextype.

## Dependencies

The following dependencies need to be installed for Icon Plugin.

## System

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.13 | [download](https://github.com/flextype/flextype/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=1.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/icon`
3. Download jQuery Plugin and unzip plugin content to the folder `/project/plugins/icon`

## Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 80 | jquery plugin priority |

## Documentation

Display icon in the twig templates:

```
{{ icon('fab fa-apple') }}
```

Display icon in the php:

```
echo Icon::icon('fab fa-apple');
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/icon/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
