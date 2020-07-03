<h1 align="center">Section plugin for <a href="http://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/section/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/section.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/section"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/section"><img src="https://img.shields.io/github/downloads/flextype-plugins/section/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.8-green.svg" alt="Flextype"></a> <a href="https://flextype.org/en/discord"><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>


Section plugin provides a basic way to work with content sections.

## Dependencies

The following dependencies need to be downloaded and installed for Section Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.8 | [download](https://github.com/flextype/flextype/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/section`
3. Download Section Plugin and unzip plugin content to the folder `/project/plugins/section`

## Documentation

## Usage in page content

Create section
```
[section_create name=section-name]Section content here[/section_create]
```

Get section
```
[section name=section-name]
```

## Settings
enabled: true or false to disable the plugin

```yaml
enabled: true
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/section/blob/master/LICENSE) Copyright (c) 2018-2019 [Sergey Romanenko](https://github.com/Awilum)
