# Assets Component
![version](https://img.shields.io/badge/version-1.0.3-brightgreen.svg "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/flextype-components/assets/blob/master/LICENSE)

Assets Component for managing assets in your application.

### Installation

```
composer require flextype-components/assets
```

### Usage

```php
use Flextype\Component\Assets\Assets;
```

Add new asset
```php
Assets::add('js', 'jquery.js', 'site', 1);
Assets::add('js', 'site.js', 'site', 2);
Assets::add('css', 'site.css', 'site', 1);
Assets::add('css', 'theme.css', 'site', 2);
```

Get assets for current namespace and asset type
```php
$css = Assets::get('css', 'site');
$js  = Assets::get('js', 'site');
```


## License
See [LICENSE](https://github.com/flextype-components/assets/blob/master/LICENSE)
