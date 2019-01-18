# Token Component
![version](https://img.shields.io/badge/version-1.2.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/token/blob/master/LICENSE)

The Token component generate and store a unique token which can be used to help prevent [CSRF](http://wikipedia.org/wiki/Cross_Site_Request_Forgery) attacks.   

### Installation

```
composer require flextype-components/token
```

### Usage

Generate token
```php
use Flextype\Component\Token\Token;

$token = Token::generate();
```

Generate token in the template
```php
<?php use Flextype\Component\Token\Token; ?>
<input type="hidden" name="csrf" value="<?php echo Token::generate(); ?>">
```

Check that the given token matches the currently stored security token.  
```php
use Flextype\Component\Token\Token;

if (Token::check($token)) {
    // Pass
}
```

## License
See [LICENSE](https://github.com/flextype-components/token/blob/master/LICENSE)
