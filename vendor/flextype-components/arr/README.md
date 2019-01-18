# Arr Component
![version](https://img.shields.io/badge/version-1.2.4-brightgreen.svg?style=flat-square)
![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

The Array Component contains methods that can be useful when working with arrays.

### Installation

```
composer require flextype-components/arr
```

### Usage

```php
use Flextype\Component\Arr\Arr;
```

Sorts a multi-dimensional array by a certain column
```php
$new_array = Arr::sort($old_array, 'title');
```

Sets an array value using "dot notation".
```php
Arr::set($array, 'foo.bar', 'value');
```

Return value from array using "dot notation".  
If the key does not exist in the array, the default value will be returned instead.
```php
$login = Arr::get($_POST, 'login');  

$array = array('foo' => 'bar');  
$foo = Arr::get($array, 'foo');  

$array = array('test' => array('foo' => 'bar'));  
$foo = Arr::get($array, 'test.foo');
```

Delete an array value using "dot notation".
```php
Arr::delete($array, 'foo.bar');
```

Checks if the given dot-notated key exists in the array.
```php  
if (Arr::keyExists($array, 'foo.bar')) {
    // Do something...
}
```

Returns a random value from an array.
```php
$random = Arr::random(array('php', 'js', 'css', 'html'));
```

Returns TRUE if the array is associative and FALSE if not.
```php
if (Arr::isAssoc($array)) {
    // Do something...
}
```

Returns TRUE if the array is associative and FALSE if not.
```php
$array1 = array('name' => 'john', 'mood' => 'happy', 'food' => 'bacon');
$array2 = array('name' => 'jack', 'food' => 'tacos', 'drink' => 'beer');

// Overwrite the values of $array1 with $array2
$array = Arr::overwrite($array1, $array2);

// The output of $array will now be:
array('name' => 'jack', 'mood' => 'happy', 'food' => 'tacos')
```

Converts an array to a JSON string
```php
$array = [
  'cat'  => 'miao',
  'dog'  => 'wuff',
  'bird' => 'tweet'
];

echo Arr::json($array);
// output: {"cat":"miao","dog":"wuff","bird":"tweet"}
```

Returns the first element of an array
```php
$array = [
  'cat',
  'dog',
  'bird',
];

$first = Arr::first($array);
// first: 'cat'
```

Returns the last element of an array
```php
$array = [
  'cat',
  'dog',
  'bird',
];

$last = Arr::last($array);
// first: 'bird'
```

Converts an array to a JSON string
```php
$array = [
   'cat'  => 'miao',
   'dog'  => 'wuff',
   'bird' => 'tweet'
];

// output: {"cat":"miao","dog":"wuff","bird":"tweet"}
echo Arr::toJson($array);
```

Create an new Array from JSON string.
```php
$str = '{"firstName":"John", "lastName":"Doe"}';

// Array['firstName' => 'John', 'lastName' => 'Doe']
$array = Arr::createFromJson($str);
```

Create an new Array object via string.
```php
$array = Arr::createFromString('cat, dog, bird', ',');
```

Counts all elements in an array.
```php
$size = Arr::size($array);
```

Return an array with elements in reverse order.
```php
$array = Arr::reverse($array);
```

## License
See [LICENSE](https://github.com/flextype-components/arr/blob/master/LICENSE)
