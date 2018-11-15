# Markdown Plugin for [Flextype](http://flextype.org/)
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square)
![Flextype](https://img.shields.io/badge/Flextype-0.x-green.svg?style=flat-square)
![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

Markdown plugin for parsing text with markdown syntax.

## Installation
1. Unzip plugin to the folder `/site/plugins/`
2. Go to `/site/config/site.yaml` and add plugin name to plugins section.
3. Save your changes.

Example:
```
plugins:
  - markdown
```

## Usage in page content

Basic usage
```
[markdown]__Some Text Here__[/markdown]
```

Usage with parameters
```
[markdown line=true urls_linked=false breaks_enabled=false markup_escaped=false safe_mode=false]
__Some Text Here__
[/markdown]
```


## Usage in the template

Define Flextype namespace in the template if it is not defined yet.
```
<?php namespace Flextype; ?>
```

Basic usage
```
<?php echo Markdown::text('__Some Text Here__'); ?>
```

Usage with parameters
```
<?php echo Markdown::text('__Some Text Here__', false, false, false, false, false); ?>
```


## Settings

```yaml
enabled: true # or `false` to disable the plugin
```

## License
See [LICENSE](https://github.com/flextype-plugins/markdown/blob/master/LICENSE)
