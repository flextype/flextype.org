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

Converts a number of bytes to a human readable number by taking the
number of that unit that the bytes will go into it.
```php
echo Num::format_bytes('204800');     // 200 kB
echo Num::format_bytes('214901', 1);  // 209.9 kB
echo Num::format_bytes('2249010', 1); // 2.1 MB
echo Num::format_bytes('badbyteshere'); // false
```

Converts a file size number to a byte value.
```php
echo Number::convertToBytes('200K');  // 204800
echo Number::convertToBytes('5MiB');  // 5242880
echo Number::convertToBytes('2.5GB'); // 2684354560
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

Transforms a number by masking characters in a specified mask format, and
ignoring characters that should be injected into the string without
matching a character from the original string (defaults to space).
```php
// ************5678
echo Number::maskString('1234567812345678', '************0000');

// **** **** **** 5678
echo Number::maskString('1234567812345678', '**** **** **** 0000');

// **** - **** - **** - 5678
echo Number::maskString('1234567812345678', '**** - **** - **** - 0000', ' -');
```

Formats a number by injecting non-numeric characters in a specified
format into the string in the positions they appear in the format.
```php
// (123) 456-7890
echo Number::format('1234567890', '(000) 000-0000');

// 123.456.7890
echo Number::format('1234567890', '000.000.0000');
```

Formats a phone number.
```php
// (061) 234 5678
echo Number::formatPhone('0612345678');

// (06) 123 456 78
echo Number::formatPhone('0612345678', '(00) 000 000 00');
```

Formats (masks) a credit card.
```php
// **** **** **** 2938
echo Number::maskСreditСard('1234263583742938');

// 1234 **** **** ****
echo Number::maskСreditСard('1234123412341234', '0000 **** **** ****');
```

Formats a credit card expiration string. Expects 4-digit string (MMYY).
```php
// 12-34
echo Number::formatExp('1234');

// 12/34
echo Number::formatExp('1234', '00/00');
```


## License
See [LICENSE](https://github.com/flextype-components/number/blob/master/LICENSE)
