# Cookie Component
![version](https://img.shields.io/badge/version-1.2.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/cookie/blob/master/LICENSE)

Cookie component contains methods that assist in working with cookies.

### Installation

```
composer require flextype-components/cookie
```

### Usage

```php
use Flextype\Component\Cookie\Cookie;
```

Set a cookie
```php
Cookie::set('username', 'Awilum');
```

Get a cookie
```php
$username = Cookie::get('username');
```

Delete a cookie
```php
Cookie::delete('username');
```

## License
See [LICENSE](https://github.com/flextype-components/cookie/blob/master/LICENSE)
