# Text Component
![version](https://img.shields.io/badge/version-1.1.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/text/blob/master/LICENSE)

Text Component is a set of methods to help with the manipulation of strings.

### Installation

```
composer require flextype-components/text
```

### Usage

```php
use Flextype\Component\Text\Text;
```

Translit function ua,ru to latin
```php
echo Text::translitIt('Привет');
```

Removes any leading and traling slashes from a string
```php
echo Text::trimSlashes('some text here/');
```

Reduces multiple slashes in a string to single slashes.
```php
echo Text::reduceSlashes('some//text//here');
```

Removes single and double quotes from a string
```php
echo Text::stripQuotes('some "text" here');
```

Convert single and double quotes to entities
```php
echo Text::quotesToEntities('some "text" here');
```

Creates a random string of characters
```php
echo Text::random();
```

Add's string_1 to a string or increment the ending number to allow string_2, string_3, etc
```php
$str = Text::increment($str);
```

Cut string
```php
echo Text::cut('Some text here', 5);
```

Lowercase
```php
echo Text::lowercase('Some text here');
```

Uppercase
```php
echo Text::uppercase('some text here');
```

Get length
```php
echo Text::length('Some text here');
```

Create a lorem ipsum text
```php
echo Text::lorem(2);
```

Extract the last `$num` characters from a string.
```php
echo Text::right('Some text here', 4);
```

Extract the first `$num` characters from a string.
```php
echo Text::left('Some text here', 4);
```

Replaces newline with `<br>` or `<br />`.
```php
echo Text::nl2br("Some \n text \n here");
```

Replaces `<br>` and `<br />` with newline.
```php
echo Text::br2nl("Some <br /> text <br /> here");
```

Converts & to &amp;.
```php
echo Text::ampEncode("M&CMS");
```

Converts &amp; to &.
```php
echo Text::ampDecode("M&amp;CMS");
```

Convert plain text to html
```php
echo Text::toHtml('test');
```

Create safe string. Use to create safe usernames or filenames.
```php
$safe_string = Text::safeString('hello world');
```

Encrypt string
```php
$encrypt_string = Text::encryptString('password', 'string_salt');
```

## License
See [LICENSE](https://github.com/flextype-components/text/blob/master/LICENSE)
