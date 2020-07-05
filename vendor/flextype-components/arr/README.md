<h1 align="center">Arr Component</h1>

<p align="center">
<a href="https://github.com/flextype-components/arr/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-components/arr.svg?label=version&color=black"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-components/arr"><img src="https://img.shields.io/github/downloads/flextype-components/arr/total.svg?color=black" alt="Total downloads"></a>
</p>

The Array Component contains methods that can be useful when working with arrays.

### Installation

```
composer require flextype-components/arr
```

### Documentation

#### Class: \Flextype\Component\Arr\Arr


| Visibility | Function |
|:-----------|:---------|
| public static | <strong>average(</strong><em>array</em> <strong>$array</strong>, <em>int/\integer</em> <strong>$decimals</strong>)</strong> : <em>int/\Flextype\Component\Arr\double</em><br /><em>Returns the average value of the current array.</em> |
| public static | <strong>createFromJson(</strong><em>\string</em> <strong>$json</strong>, <em>\boolean</em> <strong>$assoc=true</strong>, <em>\integer</em> <strong>$depth=512</strong>, <em>int/\integer</em> <strong>$options</strong>)</strong> : <em>array</em><br /><em>Create an new Array from JSON string.</em> |
| public static | <strong>createFromString(</strong><em>\string</em> <strong>$str</strong>, <em>\string</em> <strong>$delimiter=null</strong>, <em>\string</em> <strong>$regEx=null</strong>)</strong> : <em>array</em><br /><em>Create an new Array object via string.</em> |
| public static | <strong>delete(</strong><em>array</em> <strong>$array</strong>, <em>\string</em> <strong>$path</strong>)</strong> : <em>mixed</em><br /><em>Deletes an array value using "dot notation".</em> |
| public static | <strong>dot(</strong><em>array</em> <strong>$array</strong>, <em>\string</em> <strong>$prepend=`''`</strong>)</strong> : <em>array</em><br /><em>Flatten a multi-dimensional associative array with dots.</em> |
| public static | <strong>first(</strong><em>array</em> <strong>$array</strong>)</strong> : <em>mixed The first element</em><br /><em>Returns the first element of an array</em> |
| public static | <strong>get(</strong><em>array</em> <strong>$array</strong>, <em>\string</em> <strong>$path</strong>, <em>mixed</em> <strong>$default=null</strong>)</strong> : <em>mixed</em><br /><em>Returns value from array using "dot notation". If the key does not exist in the array, the default value will be returned instead.</em> |
| public static | <strong>isAssoc(</strong><em>array</em> <strong>$array</strong>)</strong> : <em>bool</em><br /><em>Returns TRUE if the array is associative and FALSE if not.</em> |
| public static | <strong>keyExists(</strong><em>array</em> <strong>$array</strong>, <em>mixed</em> <strong>$path</strong>)</strong> : <em>bool</em><br /><em>Checks if the given dot-notated key exists in the array.</em> |
| public static | <strong>last(</strong><em>array</em> <strong>$array</strong>)</strong> : <em>mixed The last element</em><br /><em>Returns the last element of an array</em> |
| public static | <strong>overwrite(</strong><em>array</em> <strong>$array1</strong>, <em>array</em> <strong>$array2</strong>)</strong> : <em>array</em><br /><em>Overwrites an array with values from input arrays. Keys that do not exist in the first array will not be added!</em> |
| public static | <strong>random(</strong><em>array</em> <strong>$array</strong>)</strong> : <em>mixed</em><br /><em>Returns a random value from an array.</em> |
| public | <strong>reverse(</strong><em>array</em> <strong>$array</strong>, <em>\boolean</em> <strong>$preserve_keys=false</strong>)</strong> : <em>array</em><br /><em>Return an array with elements in reverse order. Non-numeric keys are not affected by this setting and will always be preserved.</em> |
| public static | <strong>set(</strong><em>array</em> <strong>$array</strong>, <em>\string</em> <strong>$path</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>void</em><br /><em>Sets an array value using "dot notation".</em> |
| public static | <strong>size(</strong><em>array</em> <strong>$array</strong>, <em>int/\integer</em> <strong>$mode</strong>)</strong> : <em>void</em><br /><em>Counts all elements in an array. COUNT_RECURSIVE (or 1), count will recursively count the array. This is particularly useful for counting all the elements of a multidimensional array. count does not detect infinite recursion.</em> |
| public static | <strong>sort(</strong><em>array</em> <strong>$array</strong>, <em>\string</em> <strong>$field</strong>, <em>\string</em> <strong>$direction=`'ASC'`</strong>, <em>\Flextype\Component\Arr\const</em> <strong>$method</strong>)</strong> : <em>array</em><br /><em>Sorts a multi-dimensional array by a certain field path</em> |
| public static | <strong>toJson(</strong><em>array</em> <strong>$array</strong>, <em>int/\integer</em> <strong>$options</strong>, <em>\integer</em> <strong>$depth=512</strong>)</strong> : <em>string The JSON string</em><br /><em>Converts an array to a JSON string</em> |
| public static | <strong>undot(</strong><em>array</em> <strong>$array</strong>)</strong> : <em>array</em><br /><em>Expands a dot notation array into a full multi-dimensional array.</em> |

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-components/arr/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
