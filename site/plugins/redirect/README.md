# Redirect Plugin for [Flextype](http://flextype.org/)
![version](https://img.shields.io/badge/version-1.3.0-brightgreen.svg?style=flat-square "Version")
![Flexttype](https://img.shields.io/badge/Flextype-0.8.0-green.svg?style=flat-square "Flextype Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-plugins/redirect/blob/master/LICENSE.txt)

Simple redirect plugin for Flextype. It allows you to create a simple redirects for your pages.

## Installation
Unzip plugin to the folder `/site/plugins/`

## Usage in the pages
You can simple add new redirect in the frontmatter of your page
```
redirect: new-page
```

## Create several redirects
This plugins allows you to setup several redirects, just go to the `/site/config/site.yaml` and create section with your redirects.
```
redirects:
  old-page: new-page
  another-old-page: http://www.flextype.org
```

## License
See [LICENSE](https://github.com/flextype-plugins/redirect/blob/master/LICENSE.txt)
