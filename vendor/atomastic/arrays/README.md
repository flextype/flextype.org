<h1 align="center">Arrays Component</h1>
<p align="center">
Arrays Component provide a fluent, object-oriented interface for working with arrays, allowing you to chain multiple arrays operations together using a more readable syntax compared to traditional PHP arrays functions.
</p>
<p align="center">
<a href="https://github.com/atomastic/arrays/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/arrays.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/arrays"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://packagist.org/packages/atomastic/arrays"><img src="https://poser.pugx.org/atomastic/arrays/downloads" alt="Total downloads"></a> <img src="https://github.com/atomastic/arrays/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/arrays/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/arrays?utm_source=github.com&utm_medium=referral&utm_content=atomastic/arrays&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a> <a href="https://codeclimate.com/github/atomastic/arrays/maintainability"><img src="https://api.codeclimate.com/v1/badges/a4c673a4640a3863a9a4/maintainability" /></a> <a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fatomastic%2Farrays?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fatomastic%2Farrays.svg?type=shield"/></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Exteding](#extending)
* [Methods](#methods)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/arrays
```

### Usage

```php
use Atomastic\Arrays\Arrays;

// Using public method __construct()
$arrays = new Arrays();

// Using public static method create()
$arrays = Arrays::create();

// Using global helper function arrays() alias to Arrays::create()
$arrays = arrays();
```

### Extending

Arrays are "macroable", which allows you to add additional methods to the Arrays class at run time. For example, the following code adds a customMethod method to the Arrays class:

```php
use Atomastic\Arrays\Arrays;
use Atomastic\Macroable\Macroable;

Arrays::macro('customMethod', function($arg1 = 1, $arg2 = 1) {
    return $this->count() + $arg1 + $arg2;
});

$arrays = new Arrays([1, 2, 3]);

echo $arrays->customMethod(1, 2);
echo $arrays->customMethod();
```

##### The above example will output:

```
6
5
```

### Methods

| Method | Description |
|---|---|
| <a href="#arrays_append">`append()`</a> | Push an item into the end of an array. |
| <a href="#arrays_all">`all()`</a> | Get all items from stored array. |
| <a href="#arrays_copy">`copy()`</a> | Creates a new Arrays object with the same items. |
| <a href="#arrays_count">`count()`</a> | Return the number of items in a given key. |
| <a href="#arrays_create">`create()`</a> | Create a new arrayable object from the given elements. Initializes a Arrays object and assigns $items the supplied values. |
| <a href="#arrays_createFromJson">`createFromJson()`</a> | Create a new arrayable object from the given JSON string. |
| <a href="#arrays_createFromString">`createFromString()`</a> | Create a new arrayable object from the given string. |
| <a href="#arrays_createWithRange">`createWithRange()`</a> | Create a new arrayable object with a range of elements. |
| <a href="#arrays_chunk">`chunk()`</a> | Create a chunked version of current array. |
| <a href="#arrays_combine">`combine()`</a> | Create an array using the current array as keys and the other array as values. |
| <a href="#arrays_column">`column()`</a> | Get the values of a single column from an arrays items. |
| <a href="#arrays_current">`current()`</a> | Gets the element of the array at the current internal iterator position. |
| <a href="#arrays_customSortKeys">`customSortKeys()`</a> | Sorts array by keys. |
| <a href="#arrays_customSortValues">`customSortValues()`</a> | Sorts array by values. |
| <a href="#arrays_divide">`divide()`</a> | Divide an array into two arrays. One with keys and the other with values. |
| <a href="#arrays_diff">`diff()`</a> | Compute the current array values which not present in the given one. |
| <a href="#arrays_dot">`dot()`</a> | Flatten a multi-dimensional associative array with dots. |
| <a href="#arrays_delete">`delete()`</a> | Deletes an array value using "dot notation". |
| <a href="#arrays_dump">`dump()`</a> | Dumps the arrays items using the given function (print_r by default). |
| <a href="#arrays_dd">`dd()`</a> | Dumps the arrays items using the given function (print_r by default) and die. |
| <a href="#arrays_every">`every()`</a> | Verifies that all elements pass the test of the given callback. |
| <a href="#arrays_except">`except()`</a> | Return slice of an array with just a given keys. |
| <a href="#arrays_extract">`extract()`</a> | Extract the items from the current array using "dot" notation for further manipulations. |
| <a href="#arrays_flush">`flush()`</a> | Flush all values from the array. |
| <a href="#arrays_first">`first()`</a> | Get the first value from the current array. |
| <a href="#arrays_firstKey">`firstKey()`</a> | Get the first key from the current array. |
| <a href="#arrays_filter">`filter()`</a> | Filter the current array for elements satisfying the predicate `$callback` function. |
| <a href="#arrays_flip">`flip()`</a> | Exchanges all keys of current array with their associated values. |
| <a href="#arrays_get">`get()`</a> | Get an item from an array using "dot" notation. |
| <a href="#arrays_getValues">`getValues()`</a> | Return an array of all values stored array. |
| <a href="#arrays_has">`has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#arrays_pull">`pad()`</a> | Pad the current array to the specified size with a given value. |
| <a href="#arrays_prepend">`prepend()`</a> | Push an item into the beginning of an array. |
| <a href="#arrays_pull">`pull()`</a> | Get a value from the array, and remove it. |
| <a href="#arrays_last">`last()`</a> | Get the last value from the current array. |
| <a href="#arrays_lastKey">`lastKey()`</a> | Get the last key from the current array. |
| <a href="#arrays_limit">`limit()`</a> | Extract a slice of the current array with offset 0 and specific length. |
| <a href="#arrays_groupBy">`groupBy()`</a> | Groups the array items by a given key. |
| <a href="#arrays_getIterator">`getIterator()`</a> | Create a new iterator from an ArrayObject instance. |
| <a href="#arrays_indexOf">`indexOf()`</a> | Alias of search() method. Search for a given item and return the index of its first occurrence. |
| <a href="#arrays_intersect">`intersect()`</a> | Compute the current array values which present in the given one. |
| <a href="#arrays_intersectAssoc">`intersectAssoc()`</a> | Compute the current array values with additional index check. |
| <a href="#arrays_intersectKey">`intersectKey()`</a> | Compute the current array using keys for comparison which present in the given one. |
| <a href="#arrays_isEmpty">`isEmpty()`</a> | Check whether the array is empty or not. |
| <a href="#arrays_isEqual">`isEqual()`</a> | Check if the current array is equal to the given `$array` or not. |
| <a href="#arrays_isAssoc">`isAssoc()`</a> | Determines if an array is associative. |
| <a href="#arrays_map">`map()`</a> | Apply the given $callback function to the every element of the current array, collecting the results. |
| <a href="#arrays_merge">`merge()`</a> | Merge the current array with the provided one. |
| <a href="#arrays_next">`next()`</a> | Moves the internal iterator position to the next element and returns this element. |
| <a href="#arrays_nth">`nth()`</a> | Extract array items with every nth item from the array. |
| <a href="#arrays_pipe">`pipe()`</a> | Passes the array to the given callback and return the result. |
| <a href="#arrays_prev">`prev()`</a> | Rewind the internal iterator position and returns this element. |
| <a href="#arrays_product">`product()`</a> | Calculate the product of values in the current array. |
| <a href="#arrays_only">`only()`</a> | Return slice of an array with just a given keys. |
| <a href="#arrays_offset">`offset()`</a> | Extract a slice of the current array with specific offset. |
| <a href="#arrays_offsetGet">`offsetGet()`</a> | Offset to retrieve. |
| <a href="#arrays_offsetSet">`offsetSet()`</a> | Assign a value to the specified offset. |
| <a href="#arrays_offsetUnset">`offsetUnset()`</a> | Unset an offset. |
| <a href="#arrays_offsetExists">`offsetExists()`</a> | Whether an offset exists. |
| <a href="#arrays_reindex">`reindex()`</a> | Create a numerically re-indexed array based on the current array. |
| <a href="#arrays_replace">`replace()`</a> | Replace values in the current array with values in the given one that have the same key. |
| <a href="#arrays_reverse">`reverse()`</a> | Reverse the values order of the current array. |
| <a href="#arrays_toArray">`toArray()`</a> | Get all items from stored array and convert them to array. |
| <a href="#arrays_toJson">`toJson()`</a> | Convert the current array to JSON. |
| <a href="#arrays_toQuery">`toQuery()`</a> | Convert the current array into a query string. |
| <a href="#arrays_toString">`toString()`</a> | Convert the current array to string recursively implodes an array with optional key inclusion. |
| <a href="#arrays_set">`set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#arrays_slice">`slice()`</a> | Extract a slice of the current array. |
| <a href="#arrays_search">`search()`</a> | Searches the array for a given value and returns the first corresponding key if successful. |
| <a href="#arrays_sort">`sort()`</a> | Sorts array by values. |
| <a href="#arrays_sortKeys">`sortKeys()`</a> | Sorts array by keys. |
| <a href="#arrays_sortBy">`sortBy()`</a> | Sorts a associative array by a certain field. |
| <a href="#arrays_shuffle">`shuffle()`</a> | Shuffle the given array and return the result. |
| <a href="#arrays_sum">`sum()`</a> | Calculate the sum of values in the current array. |
| <a href="#arrays_random">`random()`</a> | Returns one or a specified number of items randomly from the array. |
| <a href="#arrays_reduce">`reduce()`</a> | Reduce the array to a single value iteratively combining all values using `$callback.` |
| <a href="#arrays_undot">`undot()`</a> | Expands a dot notation array into a full multi-dimensional array. |
| <a href="#arrays_unique">`unique()`</a> | Remove duplicate values from the current array. |
| <a href="#arrays_walk">`walk()`</a> | Apply the given function to the every element of the current array, discarding the results. |
| <a href="#arrays_where">`where()`</a> | Filters the array items by a given condition. |

#### Methods Details

##### <a name="arrays_append"></a> Method: `append()`

```php
/**
 * Push an item into the end of an array.
 *
 * @param mixed $value The new item to append
 *
 * @return self Returns instance of The Arrays class.
 */
function append($value = null): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ])->append(['tv-series']);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

    [0] => Array
        (
            [0] => tv-series
        )

)
```

##### <a name="arrays_all"></a> Method: `all()`

```php
/**
 *  Get all items from stored array.
 *
 * @return array Returns all items from stored array.
 */
public function all(): array
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

print_r($arrays->all());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

)
```

##### <a name="arrays_copy"></a> Method: `copy()`

```php
/**
 * Creates a new Arrays object with the same items.
 *
 * @return self Returns instance of The Arrays class.
 */
public function copy(): self
```

##### Example

```php
$foo = Arrays::create(['foo', 'bar']);
$bar = $foo->copy();
```

##### <a name="arrays_count"></a> Method: `count()`

```php
/**
 * Return the number of items in a given key.
 *
 * @param  int|string|null $key Key
 *
 * @return int Returns count of items.
 */
public function count($key = null): int
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$total = $arrays->count();

print_r($total);
```

##### The above example will output:

```
1
```

##### <a name="arrays_create"></a> Method: `create()`

```php
/**
 * Create a new arrayable object from the given elements.
 *
 * Initializes a Arrays object and assigns $items the supplied values.
 *
 * @param mixed $items Items
 *
 * @return self Returns instance of The Arrays class.
 */
public static function create($items = []): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);
```

##### <a name="arrays_createFromJson"></a> Method: `createFromJson()`

```php
/**
 * Create a new arrayable object from the given JSON string.
 *
 * @param string $input A string containing JSON.
 * @param bool   $assoc Decode assoc. When TRUE, returned objects will be converted into associative arrays.
 * @param int    $depth Decode Depth. Set the maximum depth. Must be greater than zero.
 * @param int    $flags Bitmask consisting of decode options
 *
 * @return self Returns instance of The Arrays class.
 */
public static function createFromJson(string $input, bool $assoc = true, int $depth = 512, int $flags = 0): self
```

##### Example

```php
$arrays = Arrays::createFromJson('{"foo": "bar"}');
```

##### <a name="arrays_createFromString"></a> Method: `createFromString()`

```php
/**
 * Create a new arrayable object from the given string.
 *
 * @param string $string    Input string.
 * @param string $separator Elements separator.
 *
 * @return self Returns instance of The Arrays class.
 */
public static function createFromString(string $string, string $separator): self
```

##### Example

```php
$arrays = Arrays::createFromString('foo,bar', ',');
```

##### <a name="arrays_createWithRange"></a> Method: `createWithRange()`

```php
/**
 * Create a new arrayable object with a range of elements.
 *
 * @param mixed $low  First value of the sequence.
 * @param mixed $high The sequence is ended upon reaching the end value.
 * @param int   $step If a step value is given, it will be used as the increment between elements in the sequence.
 *                    step should be given as a positive number. If not specified, step will default to 1.
 *
 * @return self Returns instance of The Arrays class.
 */
public static function createWithRange($low, $high, int $step = 1): self
```

##### Example

```php
$arrays = Arrays::createWithRange(1, 5);
```


##### <a name="arrays_chunk"></a> Method: `chunk()`

```php
/**
 * Create a chunked version of current array.
 *
 * @param int  $size         Size of each chunk.
 * @param bool $preserveKeys Whether array keys are preserved or no.
 *
 * @return self Returns instance of The Arrays class.
 */
public function chunk(int $size, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b'])->chunk(2)->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => a
            [1] => b
        )

)
```

##### <a name="arrays_combine"></a> Method: `combine()`

```php
/**
 * Create an array using the current array as keys and the other array as values.
 *
 * @param array $array Values array
 *
 * @return self Returns instance of The Arrays class.
 */
public function combine(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['green', 'red', 'yellow'])->combine(['avacado', 'apple', 'banana'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [green] => avacado
    [red] => apple
    [yellow] => banana
)
```

##### <a name="arrays_column"></a> Method: `column()`

```php
/**
 * Get the values of a single column from an arrays items.
 *
 * @param mixed $columnKey The column of values to return.
 *                         This value may be an integer key of the column you wish to retrieve,
 *                         or it may be a string key name for an associative array or property name.
 *                         It may also be NULL to return complete arrays or objects
 *                         (this is useful together with index_key to reindex the array).
 * @param mixed $indexKey  The column to use as the index/keys for the returned array.
 *                         This value may be the integer key of the column, or it may be the string key name.
 *                         The value is cast as usual for array keys (however, objects supporting conversion to string are also allowed).
 *
 * @return self Returns instance of The Arrays class.
 */
public function column(?string $columnKey = null, ?string $indexKey = null): self
```

##### Example

```php
$arrays1 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])
                    ->column('val');
$arrays2 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])
                    ->column('val', 'id');
$arrays3 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])
                    ->column(null, 'id');

print_r($arrays1->toArray());
print_r($arrays2->toArray());
print_r($arrays3->toArray());
```

##### The above example will output:

```
Array
(
    [0] => v1
    [1] => v2
)
Array
(
    [i1] => v1
    [i2] => v2
)
Array
(
    [i1] => Array
        (
            [id] => i1
            [val] => v1
        )

    [i2] => Array
        (
            [id] => i2
            [val] => v2
        )

)
```

##### <a name="arrays_current"></a> Method: `current()`

```php
/**
 * Gets the element of the array at the current internal iterator position.
 *
 * @return mixed Returns the value of the array element that's currently
 *               being pointed to by the internal pointer. It does not move
 *               the pointer in any way. If the internal pointer points beyond
 *               the end of the elements list or the array is empty, returns FALSE.
 */
public function current()
```

##### Example

```php
$arrays = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->current();

print_r($arrays);
```

##### The above example will output:

```
blue
```

##### <a name="arrays_customSortKeys"></a> Method: `customSortKeys()`

```php
/**
 * Sorts the array keys with a user-defined comparison function and maintain index association.
 *
 * @return self Returns instance of The Arrays class.
 */
public function customSortKeys(callable $callback): self
```

##### Example

```php
$arrays = Arrays::create(['b', 'a', 'c'])
              ->customSortKeys(static function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }

                  return $a < $b ? -1 : 1;
              })->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => b
    [1] => a
    [2] => c
)
```

##### <a name="arrays_customSortValues"></a> Method: `customSortValues()`

```php
/**
 * Sorts the array values with a user-defined comparison function and maintain index association.
 *
 * @return self Returns instance of The Arrays class.
 */
public function customSortValues(callable $callback): self
```

##### Example

```php
$arrays = Arrays::create(['b', 'a', 'c'])
              ->customSortValues(static function ($a, $b) {
                    if ($a === $b) {
                        return 0;
                    }
                    return $a < $b ? -1 : 1;
              })->toArray()

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => a
    [1] => b
    [2] => c
)
```

##### <a name="arrays_divide"></a> Method: `divide()`

```php
/**
 * Divide an array into two arrays.
 * One with keys and the other with values.
 *
 * @return array Returns result array.
 */
public function divide(): array
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$result = $arrays->divide();

print_r($result);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => movies
        )

    [1] => Array
        (
            [0] => Array
                (
                    [the_thin_red_line] => Array
                        (
                            [title] => The Thin Red Line
                            [directed_by] => Terrence Malick
                            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                        )

                    [bad_times_at_the_el_royale] => Array
                        (
                            [title] => Bad Times at the El Royale
                            [directed_by] => Drew Goddard
                            [produced_by] => Drew Goddard, Steve Asbell
                            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                        )

                )

        )

)
```

##### <a name="arrays_diff"></a> Method: `diff()`

```php
/**
 * Compute the current array values which not present in the given one.
 *
 * @param array $array Array for diff.
 *
 * @return self Returns instance of The Arrays class.
 */
public function diff(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['foo', 'bar'])->diff(['foo', 'bar'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
)
```

##### <a name="arrays_dot"></a> Method: `dot()`

```php
/**
 * Flatten a multi-dimensional associative array with dots.
 *
 * @param  string $prepend Prepend string
 *
 * @return self Returns instance of The Arrays class.
 */
public function dot(string $prepend = ''): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$arrays->dot();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies.the_thin_red_line.title] => The Thin Red Line
    [movies.the_thin_red_line.directed_by] => Terrence Malick
    [movies.the_thin_red_line.produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [movies.the_thin_red_line.decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
    [movies.bad_times_at_the_el_royale.title] => Bad Times at the El Royale
    [movies.bad_times_at_the_el_royale.directed_by] => Drew Goddard
    [movies.bad_times_at_the_el_royale.produced_by] => Drew Goddard, Steve Asbell
    [movies.bad_times_at_the_el_royale.decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
)
```

##### <a name="arrays_dump"></a> Method: `dump()`

```php
/**
 * Dumps the arrays items using the given function (print_r by default).
 *
 * @param callable $callback Function receiving the arrays items as parameter.
 *
 * @return self Returns instance of The Arrays class.
 */
public function dump(?callable $callback = null): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ])

$arrays->dump();
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )
            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )
        )
)
```

##### <a name="arrays_dd"></a> Method: `dd()`

```php
/**
 * Dumps the arrays items using the given function (print_r by default) and die.
 *
 * @param callable $callback Function receiving the arrays items as parameter.
 *
 * @return void Return void.
 */
public function dd(?callable $callback = null): void
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ])

$arrays->dd('var_dump');
```

##### The above example will output:

```
array(1) {
  ["movies"]=>
  array(2) {
    ["the_thin_red_line"]=>
    array(4) {
      ["title"]=>
      string(17) "The Thin Red Line"
      ["directed_by"]=>
      string(15) "Terrence Malick"
      ["produced_by"]=>
      string(50) "Robert Michael, Geisler Grant Hill, John Roberdeau"
      ["decription"]=>
      string(123) "Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War."
    }
    ["bad_times_at_the_el_royale"]=>
    array(4) {
      ["title"]=>
      string(26) "Bad Times at the El Royale"
      ["directed_by"]=>
      string(12) "Drew Goddard"
      ["produced_by"]=>
      string(26) "Drew Goddard, Steve Asbell"
      ["decription"]=>
      string(225) "Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be."
    }
  }
}
```


##### <a name="arrays_delete"></a> Method: `delete()`

```php
/**
 * Deletes an array value using "dot notation".
 *
 * @param  array|string $keys Keys
 *
 * @return self Returns instance of The Arrays class.
 */
public function delete($keys): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$arrays->delete('movies.the-thin-red-line');
```

##### <a name="arrays_every"></a> Method: `every()`

```php
/**
 * Verifies that all elements pass the test of the given callback.
 *
 * @param Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
 *
 * @return bool TRUE if all elements pass the test, FALSE if if fails for at least one element
 */
public function every(Closure $callback): bool
```

##### Example

```php
$arrays1 = Arrays::create([0 => 'Foo', 1 => 'Bar'])->every(function($value, $key) {
    return is_string($value);
});

$arrays2 = Arrays::create([0 => 'Foo', 1 => 42])->every(function($value, $key) {
    return is_string($value);
});

var_dump($arrays1);
var_dump($arrays2);
```

##### The above example will output:

```
bool(true)
bool(false)
```

##### <a name="arrays_except"></a> Method: `except()`

```php
/**
 * Return slice of an array with just a given keys.
 *
 * @param array $keys List of keys to return.
 *
 * @return self Returns instance of The Arrays class.
 */
public function except(array $keys): self
```

##### Example

```php
$arrays = Arrays::create(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])
                    ->except(['b', 'e']);

$result = $arrays->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [a] => 1
    [c] => 3
    [d] => 4
)
```


##### <a name="arrays_extract"></a> Method: `extract()`

```php
/**
 * Extract the items from the current array using "dot" notation for further manipulations.
 *
 * @param  string|int|null $key     Key.
 * @param  mixed           $default Default value.
 *
 * @return self Returns instance of The Arrays class.
 */
public function extract($key, $default = null): self
```

##### Example

```php
$result = Arrays::create(['items' => ['catalog' => ['nums' => [10, 20, 30]]]])
                    ->extract('items.catalog.nums')
                    ->sum()

print_r($result);

$result = Arrays::create(['items' => ['catalog' => ['nums' => [10, 20, 30]]]])
                    ->extract('items')
                    ->extract('catalog')
                    ->extract('nums')
                    ->sum()

print_r($result);
```

##### The above example will output:

```
60
60
```

##### <a name="arrays_filter"></a> Method: `filter()`

```php
/**
 * Filter the current array for elements satisfying the predicate $callback function.
 *
 * @param callable $callback The callback function.
 * @param int      $flag     Determining what arguments are sent to callback:
 *                             ARRAY_FILTER_USE_KEY - pass key as the only argument
 *                                                    to callback instead of the value.
 *                             ARRAY_FILTER_USE_BOTH - pass both value and key as arguments
 *                                                     to callback instead of the value.
 *
 * @return self Returns instance of The Arrays class.
 */
public function filter(callable $callback, int $flag = ARRAY_FILTER_USE_BOTH): self
```

##### Example

```php
$arrays = Arrays::create([6, 7, 8, 9, 10, 11, 12])->filter(function($var) {
                            return !($var & 1);
                        })->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => 6
    [2] => 8
    [4] => 10
    [6] => 12
)
```

##### <a name="arrays_flush"></a> Method: `flush()`

```php
/**
 * Flush all values from the array.
 *
 * @return self Returns instance of The Arrays class.
 */
public function flush(): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$arrays->flush();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
)
```

##### <a name="arrays_first"></a> Method: `first()`

```php
/**
 * Get the first value from the current array.
 *
 * @return mixed Returns the value of the array.
 */
public function first()
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->first();

print_r($result);
```

##### The above example will output:

```
Array
(
    [title] => The Thin Red Line
    [directed_by] => Terrence Malick
    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
)
```

##### <a name="arrays_firstKey"></a> Method: `firstKey()`

```php
/**
 * Get the first key from the current array.
 *
 * @return mixed Returns the first key of array if the array is not empty; NULL otherwise.
 */
public function firstKey()
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->firstKey();

print_r($result);
```

##### The above example will output:

```
the_thin_red_line
```

##### <a name="arrays_flip"></a> Method: `flip()`

```php
/**
 * Exchanges all keys of current array with their associated values.
 *
 * @return self Returns instance of The Arrays class.
 */
public function flip(): self
```

##### Example

```php
$arrays = Arrays::create(['oranges', 'apples', 'pears'])->flip()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [oranges] => 0
    [apples] => 1
    [pears] => 2
)
```

##### <a name="arrays_get"></a> Method: `get()`

```php
/**
 * Get an item from an array using "dot" notation.
 *
 * @param  string|int|null $key     Key
 * @param  mixed           $default Default value
 *
 * @return mixed Item from an array.
 */
public function get($key, $default = null)
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$title = $arrays->get('movies.the_thin_red_line.title');

print_r($title);
```

##### The above example will output:

```
The Thin Red Line
```

##### <a name="arrays_getValues"></a> Method: `getValues()`

```php
/**
 * Return an array of all values stored array.
 *
 * @return array Returns an indexed array of values.
 */
public function getValues(): array
```

##### Example

```php
$result = Arrays::create([1, 2, 3, 4, 5])->getValues();

print_r($result);
```

##### The above example will output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
```

##### <a name="arrays_has"></a> Method: `has()`

```php
/**
 * Checks if the given dot-notated key exists in the array.
 *
 * @param  string|array $keys Keys
 *
 * @return bool Return TRUE key exists in the array, FALSE otherwise.
 */
public function has($keys): bool
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

if ($arrays->has('movies.the-thin-red-line')) {

    // Do something here...

    $title = $arrays->get('movies.the_thin_red_line.title');

    print_r($title);
}
```

##### The above example will output:

```
The Thin Red Line
```

##### <a name="arrays_pad"></a> Method: `pad()`

```php
/**
 * Pad the current array to the specified size with a given value.
 *
 * @param int   $size  Size of the result array.
 * @param mixed $value Empty value by default.
 *
 * @return self Returns instance of The Arrays class.
 */
public function pad(int $size, $value): self
```

##### Example

```php
$arrays = Arrays::create([12, 10, 9])->pad(5, 0);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => 12
    [1] => 10
    [2] => 9
    [3] => 0
    [4] => 0
)
```

##### <a name="arrays_prepend"></a> Method: `prepend()`

```php
/**
 * Push an item into the beginning of an array.
 *
 * @param mixed $value The new item to append
 *
 * @return self Returns instance of The Arrays class.
 */
function prepend($value = null): self
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ])->prepend(['tv-series']);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => tv-series
        )

    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

)
```

##### <a name="arrays_pull"></a> Method: `pull()`

```php
/**
 * Get a value from the array, and remove it.
 *
 * @param  string  $key     Key
 * @param  mixed   $default Default value
 */
public function pull($key, $default = null)
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$item = $arrays->pull('movies.the_thin_red_line');

print_r($item);
print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [title] => The Thin Red Line
    [directed_by] => Terrence Malick
    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
)

Array
(
    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

)
```

##### <a name="arrays_last"></a> Method: `last()`

```php
/**
 * Get the last value from the current array.
 */
public function last()
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->last();

print_r($result);
```

##### The above example will output:

```
Array
(
    [title] => Bad Times at the El Royale
    [directed_by] => Drew Goddard
    [produced_by] => Drew Goddard, Steve Asbell
    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
)
```

##### <a name="arrays_lastKey"></a> Method: `lastKey()`

```php
/**
 * Get the last key from the current array.
 */
public function lastKey()
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->lastKey();

print_r($result);
```

##### The above example will output:

```
bad_times_at_the_el_royale
```

##### <a name="arrays_limit"></a> Method: `limit()`

```php
/**
 * Extract a slice of the current array with offset 0 and specific length.
 *
 * @param int|null $length       Length of the slice. Default is null.
 * @param bool     $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function limit(?int $length = null, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b', 'c', 'd', 'e'])->limit(3);

$result = $arrays->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [0] => a
    [1] => b
    [2] => c
)
```

##### <a name="arrays_groupBy"></a> Method: `groupBy()`

```php
/**
 * Groups the array items by a given key.
 *
 * @param  string $key Key
 */
public function groupBy(string $key): self
```

##### Example

```php
$result = Arrays::create([
    [
        'id' => 1,
        'name' => 'Bruce Wayne',
        'city' => 'Gotham',
        'gender' => 'Male',
    ],
    [
        'id' => 2,
        'name' => 'Thomas Wayne',
        'city' => 'Gotham',
        'gender' => 'Male',
    ],
    [
        'id' => 3,
        'name' => 'Diana Prince',
        'city' => 'New Mexico',
        'gender' => 'Female',
    ],
    [
        'id' => 4,
        'name' => 'Speedy Gonzales',
        'city' => 'New Mexico',
        'gender' => 'Male',
    ],
])->groupBy('gender')->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [Male] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [name] => Bruce Wayne
                    [city] => Gotham
                    [gender] => Male
                )

            [1] => Array
                (
                    [id] => 2
                    [name] => Thomas Wayne
                    [city] => Gotham
                    [gender] => Male
                )

            [2] => Array
                (
                    [id] => 4
                    [name] => Speedy Gonzales
                    [city] => New Mexico
                    [gender] => Male
                )

        )

    [Female] => Array
        (
            [0] => Array
                (
                    [id] => 3
                    [name] => Diana Prince
                    [city] => New Mexico
                    [gender] => Female
                )

        )

)
```

##### <a name="arrays_getIterator"></a> Method: `getIterator()`

```php
/**
 * Create a new iterator from an ArrayObject instance
 */
public function getIterator(): ArrayIterator
```

##### Example

```php
$iterator = Arrays::create()->getIterator();
```


##### <a name="arrays_indexOf"></a> Method: `indexOf()`

```php
/**
 * Alias of search() method. Search for a given item and return
 * the index of its first occurrence.
 *
 * @param mixed $needle The searched value.
 */
public function indexOf($needle)
```

##### Example

```php
$result = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->indexOf('green');

print_r($result);
```

##### The above example will output:

```
2
```

##### <a name="arrays_intersect"></a> Method: `intersect()`

```php
/**
 * Compute the current array values which present in the given one.
 *
 * @param array $array Array for intersect
 */
public function intersect(array $array): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "red", "blue"])
                ->intersect(["b" => "green", "yellow", "red"])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
    [0] => red
)
```

##### <a name="arrays_intersectAssoc"></a> Method: `intersectAssoc()`

```php
/**
 * Compute the current array values with additional index check.
 *
 * @param array $array Array for intersect.
 */
public function intersectAssoc(array $array): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "b" => "brown", "c" => "blue", "red"])
                ->intersectAssoc(["a" => "green", "b" => "yellow", "blue", "red"])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
)
```

##### <a name="arrays_intersectKey"></a> Method: `intersectKey()`

```php
/**
 * Compute the current array using keys for comparison which present in the given one.
 *
 * @param array $array Array for intersect.
 */
public function intersectKey(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4])
                ->intersectKey(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [blue] => 1
    [green] => 3
)
```

##### <a name="arrays_isEmpty"></a> Method: `isEmpty()`

```php
/**
 * Check whether the array is empty or not.
 */
public function isEmpty(): bool
```

##### Example

```php
$arrays = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red']);

if ($arrays->isEmpty()) {
    // do something...
}

```

##### <a name="arrays_isEqual"></a> Method: `isEqual()`

```php
/**
 * Check if the current array is equal to the given $array or not.
 *
 * @param array $array Array
 */
public function isEqual(array $array): bool
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

$array2 = [];

if ($arrays->isEqual($array2)) {
    // do something...
}
```

##### <a name="arrays_isAssoc"></a> Method: `isAssoc()`

```php
/**
 * Determines if an array is associative.
 */
public function isAssoc(): bool
```

##### Example

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);

if ($arrays->isAssoc()) {
    // do something...
}
```

##### <a name="arrays_map"></a> Method: `map()`

```php
/**
 * Apply the given $callback function to the every element of the current array,
 * collecting the results.
 *
 * @param callable $callback The callback function.
 */
public function map(callable $callback): self
```

##### Example

```php
$arrays = Arrays::create([1, 2, 3, 4, 5])
                ->map(function ($n) {
                    return ($n * $n * $n);
                })->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => 1
    [1] => 8
    [2] => 27
    [3] => 64
    [4] => 125
)
```

##### <a name="arrays_merge"></a> Method: `merge()`

```php
/**
 * Merge the current array with the provided one.
 *
 * @param array $array       Array to merge with (overwrites).
 * @param bool  $recursively Whether array will be merged recursively or no. Default is false.
 */
public function merge(array $array, bool $recursively = false): self
```

##### Example

```php
$arrays = Arrays::create(['color' => 'red', 2, 4])
                ->merge(['a', 'b', 'color' => 'green', 'shape' => 'trapezoid', 4])
                ->toArray();

$arrays2 = Arrays::create(['color' => ['favorite' => 'red'], 5])
                 ->merge([10, 'color' => ['favorite' => 'green', 'blue']], true)
                 ->toArray();

print_r($arrays);
print_r($arrays2);
```

##### The above example will output:

```
Array
(
    [color] => green
    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)

Array
(
    [color] => Array
        (
            [favorite] => Array
                (
                    [0] => red
                    [1] => green
                )

            [0] => blue
        )

    [0] => 5
    [1] => 10
)
```

##### <a name="arrays_next"></a> Method: `next()`

```php
/**
 * Moves the internal iterator position to the next element and returns this element.
 */
public function next()
```

##### Example

```php
$arrays = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->next()

print_r($arrays);
```

##### The above example will output:

```
red
```

##### <a name="arrays_nth"></a> Method: `nth()`

```php
/**
 * Extract array items with every nth item from the array.
 *
 * @param int $step   Step width.
 * @param int $offset Number of items to start from. Default is 0.
 */
public function nth(int $step, int $offset = 0): self
```

##### Example

```php
$arrays = Arrays::create([1, 2, 3, 4, 5])->nth(2);

print_r($arrays->toArray());

$arrays = Arrays::create([1, 2, 3, 4, 5])->nth(2, 1);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => 1
    [2] => 3
    [4] => 5
)

Array
(
    [1] => 2
    [3] => 4
)
```


##### <a name="arrays_pipe"></a> Method: `pipe()`

```php
/**
 * Passes the array to the given callback and return the result.
 *
 * @param Closure $callback Function with arrays as parameter which returns arbitrary result.
 *
 * @return mixed Result returned by the callback.
 */
public function pipe(Closure $callback)
```

##### Example

```php
$arrays = new Arrays([1, 2, 3]);

$arrays->pipe(static function ($arrays) {
    return $arrays->last();
}));

print_r(arrays);
```

##### The above example will output:

```
3
```

##### <a name="arrays_prev"></a> Method: `prev()`

```php
/**
 * Rewind the internal iterator position and returns this element.
 */
public function prev()
```

##### Example

```php
$arrays = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->prev()

print_r($arrays);
```

##### The above example will output:

```
false
```

##### <a name="arrays_product"></a> Method: `product()`

```php
/**
 * Calculate the product of values in the current array.
 *
 * @return float|int Returns the product as an integer or float.
 */
public function product()
```

##### Example

```php
$result = Arrays::create([2, 2, 2])->product();

print_r($result);
```

##### The above example will output:

```
8
```

##### <a name="arrays_only"></a> Method: `only()`

```php
/**
 * Return slice of an array with just a given keys.
 *
 * @param array $keys List of keys to return.
 */
public function only(array $keys): self
```

##### Example

```php
$arrays = Arrays::create(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])->only(['b', 'e'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [b] => 2
    [e] => 5
)
```

##### <a name="arrays_offset"></a> Method: `offset()`

```php
/**
 * Extract a slice of the current array with specific offset.
 *
 * @param int      $offset       Slice begin index.
 * @param bool     $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function offset(int $offset, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b', 'c', 'd', 'e'])->offset(3);

$result = $arrays->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [0] => d
    [1] => e
)
```

##### <a name="arrays_offsetGet"></a> Method: `offsetGet()`

```php
/**
 * Offset to retrieve.
 *
 * @param mixed $offset The offset to retrieve.
 */
public function offsetGet($offset)
```

##### Example

```php
$arrays = Arrays::create(['items' => ['foo' => 'Foo', 'bar' => 'Bar']]);

print_r($arrays->offsetGet('items.foo'));
print_r($arrays['items.bar']);
```

##### The above example will output:

```
Foo
Bar
```

##### <a name="arrays_offsetSet"></a> Method: `offsetSet()`

```php
/**
 * Assign a value to the specified offset.
 *
 * @param mixed $offset The offset to assign the value to.
 * @param mixed $value  The value to set.
 */
public function offsetSet($offset, $value)
```

##### Example

```php
$arrays = Arrays::create();

$arrays->offsetSet('items.foo', 'Foo');
$arrays['items.bar'] = 'Bar';
```

##### <a name="arrays_offsetUnset"></a> Method: `offsetUnset()`

```php
/**
 * Unset an offset.
 *
 * @param mixed $offset The offset to unset.
 */
public function offsetUnset($offset): void
```

##### Example

```php
$arrays = Arrays::create(['items' => ['foo' => 'Foo', 'bar' => 'Bar']]);

$arrays->offsetUnset('items.foo');
unset($arrays['items.bar']);
```

##### <a name="arrays_offsetExists"></a> Method: `offsetExists()`

```php
/**
 * Whether an offset exists.
 *
 * @param mixed $offset An offset to check for.
 */
public function offsetExists($offset): bool
```

##### Example

```php
$arrays = Arrays::create(['items' => ['foo' => 'Foo', 'bar' => 'Bar']]);

if ($arrays->offsetExists('items.foo')) {
    // do something...
}

if (isset($arrays['items.bar'])) {
    // do something...
}
```

##### <a name="arrays_reindex"></a> Method: `reindex()`

```php
/**
 * Create a numerically re-indexed array based on the current array.
 */
public function reindex(): self
```

##### Example

```php
$arrays = Arrays::create([10 => 'foo', 111 => 'bar'])->reindex()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => foo
    [1] => bar
)
```

##### <a name="arrays_replace"></a> Method: `replace()`

```php
/**
 * Replace values in the current array with values in the given one
 * that have the same key.
 *
 * @param array $array       Array of replacing values.
 * @param bool  $recursive Whether array will be replaced recursively or no. Default is false.
 */
public function replace(array $array, $recursive = false): self
```

##### Example

```php
$arrays = Arrays::create(['orange', 'banana', 'apple', 'raspberry'])
                ->replace([0 => 'cherry'])
                ->toArray();

print_r($arrays);

$arrays = Arrays::create(['citrus' => ['orange'], 'berries' => ['blackberry', 'raspberry']])
                ->replace(['citrus' => ['pineapple'], 'berries' => ['blueberry']], true)
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => cherry
    [1] => banana
    [2] => apple
    [3] => raspberry
)
Array
(
    [citrus] => Array
        (
            [0] => pineapple
        )

    [berries] => Array
        (
            [0] => blueberry
            [1] => raspberry
        )

)
```

##### <a name="arrays_reverse"></a> Method: `reverse()`

```php
/**
 * Reverse the values order of the current array.
 *
 * @param bool $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function reverse(bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['php', 8, ['green', 'red']])
                ->reverse()
                ->toArray();

print_r($arrays);

$arrays = Arrays::create(['php', 8, ['green', 'red']])
                ->reverse(true)
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 8
    [2] => php
)
Array
(
    [2] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 8
    [0] => php
)
```

##### <a name="arrays_toArray"></a> Method: `toArray()`

```php
/**
 * Get all items from stored array and convert them to array.
 */
public function toArray(): array
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [the_thin_red_line] => Array
        (
            [title] => The Thin Red Line
            [directed_by] => Terrence Malick
            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
        )

    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

)
```

##### <a name="arrays_toJson"></a> Method: `toJson()`

```php
/**
 * Convert the current array to JSON.
 *
 * @param int $options Bitmask consisting of encode options
 * @param int $depth   Encode Depth. Set the maximum depth. Must be greater than zero.
 */
public function toJson($options = 0, int $depth = 512): string
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->toJson();

print_r($result);
```

##### The above example will output:

```
{"the_thin_red_line":{"title":"The Thin Red Line","directed_by":"Terrence Malick","produced_by":"Robert Michael, Geisler Grant Hill, John Roberdeau","decription":"Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War."},"bad_times_at_the_el_royale":{"title":"Bad Times at the El Royale","directed_by":"Drew Goddard","produced_by":"Drew Goddard, Steve Asbell","decription":"Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be."}}
```

##### <a name="arrays_toQuery"></a> Method: `toQuery()`

```php
/**
 * Convert the array into a query string.
 */
public function toQuery(): string
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                       ]);

$result = $arrays->toQuery();

print_r($result);
```

##### The above example will output:

```
the_thin_red_line%5Btitle%5D=The%20Thin%20Red%20Line&the_thin_red_line%5Bdirected_by%5D=Terrence%20Malick&the_thin_red_line%5Bproduced_by%5D=Robert%20Michael%2C%20Geisler%20Grant%20Hill%2C%20John%20Roberdeau&the_thin_red_line%5Bdecription%5D=Adaptation%20of%20James%20Jones%20autobiographical%201962%20novel%2C%20focusing%20on%20the%20conflict%20at%20Guadalcanal%20during%20the%20second%20World%20War.&bad_times_at_the_el_royale%5Btitle%5D=Bad%20Times%20at%20the%20El%20Royale&bad_times_at_the_el_royale%5Bdirected_by%5D=Drew%20Goddard&bad_times_at_the_el_royale%5Bproduced_by%5D=Drew%20Goddard%2C%20Steve%20Asbell&bad_times_at_the_el_royale%5Bdecription%5D=Early%201970s.%20Four%20strangers%20check%20in%20at%20the%20El%20Royale%20Hotel.%20The%20hotel%20is%20deserted%2C%20staffed%20by%20a%20single%20desk%20clerk.%20Some%20of%20the%20new%20guests%20reasons%20for%20being%20there%20are%20less%20than%20innocent%20and%20some%20are%20not%20who%20they%20appear%20to%20be.
```

##### <a name="arrays_toString"></a> Method: `toString()`

```php
/**
 * Convert the current array to string recursively implodes an array with optional key inclusion.
 *
 * @param string  $glue         Value that glues elements together.
 * @param bool    $includeKeys  Include keys before their values.
 * @param bool    $trimAll      Trim ALL whitespace from string.
 */
public function toString(string $glue = ',', $includeKeys = false, $trimAll = true): string
```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ]
                       ]);

$result = $arrays->toString();

print_r($result);

$arrays2 = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ]
                       ]);

$result2 = $arrays2->toString(',', false, false);

print_r($result2);
```

##### The above example will output:

```
TheThinRedLine,TerrenceMalick,RobertMichael,GeislerGrantHill,JohnRoberdeau,AdaptationofJamesJonesautobiographical1962novel,focusingontheconflictatGuadalcanalduringthesecondWorldWar.

The Thin Red Line,Terrence Malick,Robert Michael, Geisler Grant Hill, John Roberdeau,Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
```

##### <a name="arrays_set"></a> Method: `set()`

```php
/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  string $key   Key
 * @param  mixed  $value Value
 */
public function set(string $key, $value): self
```

##### Example

```php
$arrays = Arrays::create()->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="arrays_slice"></a> Method: `slice()`

```php
/**
 * Extract a slice of the current array.
 *
 * @param int      $offset       Slice begin index.
 * @param int|null $length       Length of the slice. Default is null.
 * @param bool     $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function slice(int $offset, ?int $length = null, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b', 'c', 'd', 'e'])->slice(0, 3)->toArray();

print_r($arrays);
```

##### <a name="arrays_search"></a> Method: `search()`

```php
/**
 * Searches the array for a given value and returns the first corresponding key if successful.
 *
 * @param mixed $needle The searched value.
 */
public function search($needle)
```

##### Example

```php
$result = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->search('green');

print_r($result);
```

##### The above example will output:

```
2
```

##### <a name="arrays_sort"></a> Method: `sort()`

```php
/**
 * Sorts a associative array by a certain sub key.
 *
 * @param  string $direction    Order type DESC (descending) or ASC (ascending)
 * @param  int    $sortFlags    A PHP sort method flags.
 *                              https://www.php.net/manual/ru/function.sort.php
 * @param bool    $preserveKeys Maintain index association
 */
public function sort(string $direction = 'ASC', int $sortFlags = SORT_REGULAR, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort()->toArray()

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => blue
    [1] => green
    [2] => red
    [3] => red
)
```


##### <a name="arrays_sortKeys"></a> Method: `sortKeys()`

```php
/**
 * Sorts array by keys.
 *
 * @param  string $direction    Order type DESC (descending) or ASC (ascending)
 * @param  int    $sortFlags    A PHP sort method flags.
 *                              https://www.php.net/manual/ru/function.sort.php
 */
public function sortKeys(string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self
```

##### Example

```php
$arrays = Arrays::create(['a' => 'blue', 'b' => 'red', 'c' => 'green'])->sortKeys()->toArray()

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => blue
    [b] => red
    [c] => green
)
```

##### <a name="arrays_sortBy"></a> Method: `sortBy()`

```php
/**
 * Sorts a associative array by a certain key.
 *
 * @param  string $key    The name of the key.
 * @param  string $direction Order type DESC (descending) or ASC (ascending)
 * @param  int    $sortFlags A PHP sort method flags.
 *                           https://www.php.net/manual/ru/function.sort.php
 *
 * @return self Returns instance of The Arrays class.
 */
public function sortBy(string $key, string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self```

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                    ])->sortBy('title', 'ASC');

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

    [the_thin_red_line] => Array
        (
            [title] => The Thin Red Line
            [directed_by] => Terrence Malick
            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
        )

)
```

##### <a name="arrays_shuffle"></a> Method: `shuffle()`

```php
/**
 * Shuffle the given array and return the result.
 *
 * @param  int|null $seed An arbitrary integer seed value.
 */
public function shuffle($seed = null): self
```

##### Example

```php
$arrays = Arrays::create([1, 2, 3, 4, 5])->shuffle();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => 4
    [1] => 3
    [2] => 5
    [3] => 1
    [4] => 2
)
```

##### <a name="arrays_sum"></a> Method: `sum()`

```php
/**
 * Calculate the sum of values in the current array.
 *
 * @return float|int Returns the sum as an integer or float.
 */
public function sum()
```

##### Example

```php
$result = Arrays::create([2, 2, 2])->sum();

print_r($result);
```

##### The above example will output:

```
6
```

##### <a name="arrays_random"></a> Method: `random()`

```php
/**
 * Returns one or a specified number of items randomly from the array.
 *
 * @param int|null $number Number of items to return.
 */
public function random(?int $number = null)
```

##### Example

```php
$result = Arrays::create(['foo', 'bar', 'baz'])->random();
```

##### <a name="arrays_reduce"></a> Method: `reduce()`

```php
/**
 * Reduce the array to a single value iteratively combining all values using $callback.
 *
 * @param callable   $callback Callback with ($carry, $item)
 * @param mixed|null $initial  If the optional initial is available,
 *                             it will be used at the beginning of the process,
 *                             or as a final result in case the array is empty.
 */
public function reduce(callable $callback, $initial = null)
```

##### Example

```php
$result = Arrays::create([2, 2])
                ->reduce(function ($carry, $item) {
                    $carry += $item;
                    return $carry;
                });

print_r($result);
```

##### The above example will output:

```
4
```

##### <a name="arrays_undot"></a> Method: `undot()`

```php
/**
 * Expands a dot notation array into a full multi-dimensional array.
 *
 * @return self Returns instance of The Arrays class.
 */
public function undot(): self
```

##### Example

```php
$arrays = Arrays::create([
                            'movies.the_thin_red_line.title' => 'The Thin Red Line'
                        ]);

$arrays->undot();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                )

        )

)
```

##### <a name="arrays_unique"></a> Method: `unique()`

```php
/**
 * Remove duplicate values from the current array.
 *
 * @param int $sortFlags Sort flags used to modify the sorting behavior.
 *                       Sorting type flags:
 *                       https://www.php.net/manual/en/function.array-unique
 *
 * @return self Returns instance of The Arrays class.
 */
public function unique(int $sortFlags = SORT_STRING): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "red", "b" => "green", "blue", "red"])->unique()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
    [0] => red
    [1] => blue
)
```

##### <a name="arrays_walk"></a> Method: `walk()`

```php
/**
 * Apply the given function to the every element of the current array,
 * discarding the results.
 *
 * @param callable $callback  The callback function.
 * @param bool     $recursive Whether array will be walked recursively or no. Default is false.
 *
 * @return self Returns instance of The Arrays class.
 */
public function walk(callable $callback, bool $recursive = false): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "lemon", "b" => "orange", "c" => "banana"])
                ->walk(function(&$value, $key) {
                    $value = $key;
                })
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => a
    [b] => b
    [c] => c
)
```

##### <a name="arrays_where"></a> Method: `where()`

```php
/**
 * Filters the array items by a given condition.
 *
 * @param string $key      Key of the array or object to used for comparison.
 * @param string $operator Operator used for comparison.
 *                         operators: in, nin, lt, <, lte,
 *                                    >, gt, gte, >=, contains, ncontains
 *                                    >=, <=, like, nlike, regexp, nregexp,
 *                                    eq, =, neq, !=, starts_with,
 *                                    ends_with, between, nbetween, older, newer
 * @param mixed  $value    Value used for comparison.
 *
 * @return self Returns instance of The Arrays class.
 */
public function where(string $key, string $operator, $value): self
```

##### Example

```php
    $result = Arrays::create([
                        0 => ['title' => 'FòôBar'],
                        1 => ['title' => 'BarFòô'],
                    ])
                    ->where('title', '=', 'FòôBar')
                    ->toArray();
);
```

##### Operators

**Equal to**
`eq` `=`

Filter your array items by checking if your custom attribute (key) has a value that is equal to one of the values provided.

Use-cases:
Get collection that is refered to another in a 1:N relationship or if you want to get collection with a specific value in one of it's fields.

**Not equal to**
`neq` `<>` `!=`

Filter your array items by checking if your custom attribute (key) does not have a value that is equal to one of the values provided.

**Lower than**
`lt` `<`

Filter your array items by checking if your custom attribute (key) has a value that is lower than one of the values provided.

**Greater than**
`gt` `>`

Filter your array items by checking if your custom attribute (key) has a value that is greater than one of the values provided.

**Lower than or equal to**
`lte` `<=`

Filter your array items by checking if your custom attribute (key) has a value that is lower than or equal to one of the values provided.

**Greater than or equal to**
`gt` `>=`

Filter your array items by checking if your custom attribute (key) has a value that is greater than or equal to one of the values provided.

**Included in an array of values**
`in`

Filter your array items by checking if your custom array attribute (key) contains one of the values provided. As soon as one of the provided values separated with, are in the array field, the entry object will be in the response.

Use-cases:
Get all content array items that is refered to others in a N:N relationship or if you want to get all entries with a specific value in one of it's array fields.

**Isn't included in an array of values**
`nin`

Filter your entries by checking if your custom array attribute (key) is not contains one of the values provided.

Use-cases:
Get all content array items that is not refered to others in a N:N relationship or if you want to get all entries with a specific value that is not in one of it's array fields.

**Contains the substring**
`contains` `like`

Filter your array items by checking if your custom attribute (key) has a value that is "like" the value provided.

**Not Contains the substring**
`ncontains` `nlike`

Filter your array items by checking if your custom attribute (key) has a value that is "not like" the value provided.

**Starts with**
`starts_with`

Filter your array items by checking if your custom attribute (key) has a value that is "starts with" the value provided.

**Ends with**
`ends_with`

Filter your array items by checking if your custom attribute (key) has a value that is "ends with" the value provided.

**Older**
`older`

Filter your array items by checking if your custom attribute (key) is older than the value provided.

**Newer**
`newer`

Filter your array items by checking if your custom attribute (key) is newer than the value provided.

**Between**
`between`

Filter your array items by checking if your custom attribute (key) is between the value provided.

**Not Between**
`nbetween`

Filter your array items by checking if your custom attribute (key) is not between the value provided.

**Regexp**
`regexp`

Filter your array items by checking if your custom attribute (key) is match the provided regexp.


**Not Regexp**
`regexp` `nregexp`

Filter your array items by checking if your custom attribute (key) is not match the provided regexp.


### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/arrays/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
