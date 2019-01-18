# Registry Component
![version](https://img.shields.io/badge/version-1.1.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/registry/blob/master/LICENSE)

Registry component provides a mechanism for storing data globally in a well managed fashion, helping to prevent global meltdown.

### Installation

```
composer require flextype-components/registry
```

### Usage

```php
use Flextype\Component\Registry\Registry;
```

Checks if an object with this name is in the registry.
```php
if (Registry::exists('var')) {
    // Do something...
}
```

Registers a given value under a given name.
```php
Registry::set('var', 'value');
```

Fetch an item from the registry.
```php
$var = Registry::get('var', 'value');
```

## License
See [LICENSE](https://github.com/flextype-components/registry/blob/master/LICENSE)
