# Html Component
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/html/blob/master/LICENSE)

Html Component contains methods that can be useful when working with HTML.

### Installation

```
composer require flextype-components/html
```

### Usage

```php
use Flextype\Component\Html\Html;
```

Registers a custom macro.
```php
// Registering a Html macro
Html::macro('my_element', function() {
    return '<element id="flextype">';
});

// Calling a custom Html macro
echo Html::my_element();

// Registering a Html macro with parameters
Html::macro('my_element', function($id = '') {
    return '<element id="'.$id.'">';
});

// Calling a custom Html macro with parameters
echo Html::my_element('flextype');
```

Convert special characters to HTML entities. All untrusted content  
should be passed through this method to prevent XSS injections.
```php
echo Html::toText('test');
```

Compiles an array of HTML attributes into an attribute string.  
Attributes will be sorted using Html::$attribute_order for consistency.
```php
echo '<div'.Html::attributes($attrs).'>'.$content.'</div>';
```

Create br tags
```php
echo Html::br(2);
```

Create &nbsp;
```php
echo Html::nbsp(2);
```

Create an arrow
```php
echo Html::arrow('right');
```

Create HTML link anchor.
```php
echo Html::anchor('About', 'http://sitename.com/about');
```

Create HTML <h> tag
```php
echo Html::heading('Title', 1);
```

Generate document type declarations
```php
echo Html::doctype('html5');
```

Create image
```php
echo Html::image('data/files/pic1.jpg');
```

Obfuscate an e-mail address to prevent spam-bots from sniffing it.
```php
echo Html::email('hello@flextype.org');
```

Obfuscate a string to prevent spam-bots from sniffing it.  

This method obfuscate the value, randomly convert each  
letter to its entity or hexadecimal representation, keeping a  
bot from sniffing the randomly obfuscated letters.
```php
echo Html::obfuscate('hello@flextype.org');
```

## License
See [LICENSE](https://github.com/flextype-components/html/blob/master/LICENSE)
