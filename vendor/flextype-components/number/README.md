# Number Component
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/number/blob/master/LICENSE)

The Number Component contains methods that can be useful when working with numbers.

### Installation

```
composer require flextype-components/number
```

### Usage

```php
use Flextype\Component\Number\Number;
```

Convert bytes in 'KB','MB','GB','TiB','PiB'
```php
echo Number::byteFormat(10000);
```

Convert 'KB','MB','GB' in bytes
```php
echo Number::convertToBytes('10MB');
```

Converts a number into a more readable human-type number.
```php
echo Number::quantity(7000); // 7K
echo Number::quantity(7500); // 8K
echo Number::quantity(7500, 1); // 7.5K
```


Checks if the value is between the minimum and maximum (min & max included).
```php
if (Number::between(2, 10, 5)) {
    // do something...
}
```

Checks the value for an even number.
```php
if (Number::even(2)) {
    // do something...
}
```

Checks if the value is greather than a given minimum.
```php
if (Number::greaterThan(2, 10)) {
     // do something...
}
```

Checks if the value is smaller than a given maximum.
```php
if (Number::smallerThan(2, 10)) {
     // do something...
}
```

Checks if the value is not greater than or equal a given maximum.
```php
if (Number::maximum(2, 10)) {
     // do something...
}
```

Checks if the value is greater than or equal to a given minimum.
```php
if (Number::minimum(2, 10)) {
     // do something...
}
```

Checks the value for an odd number.
```php
if (Number::odd(2)) {
     // do something...
}
```

## License
See [LICENSE](https://github.com/flextype-components/number/blob/master/LICENSE)
