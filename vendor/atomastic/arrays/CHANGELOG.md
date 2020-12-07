<a name="2.0.0"></a>
# [2.1.0](https://github.com/atomastic/arrays) (2020-12-05)
* add ability to extend Arrays class with Macros.

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

# [2.0.0](https://github.com/atomastic/arrays) (2020-12-02)
* add new operators added for where() method.

    Supported operators:
    ```
    in, nin, lt, <, lte,
    >, gt, gte, >=, contains, ncontains
    >=, <=, like, nlike, regexp, nregexp,
    eq, =, neq, !=, starts_with,
    ends_with, between, nbetween, older, newer
    ```

* fix issue in set() method with null key.
* fix combine() method when two arrays are different.
* rename sortBySubkey() method to sortBy() method.
* improve combine() method.
* improve tests for get() method.
* improve tests for get() method.
* improve tests for sort() method.
* improve tests for first() method.
* improve tests for last() method.
* improve tests for random() method.
* improve tests for sortBy() method.
* improve tests workflow.

### BREAKING CHANGES

* USE sortBy() INSTEAD OF sortBySubkey() method.

<a name="1.3.0"></a>
# [1.3.0](https://github.com/atomastic/arrays) (2020-11-15)
* add where() method.
* add dump() method.
* add dd() method.
* add extract() method.
* add column() method.
* add pipe() method.
* add sum() method.
* add every() method.
* add product() method.
* general tests improvements.
* add new requirements for php modules: ext-json and ext-mbstring.

<a name="1.2.0"></a>
# [1.2.0](https://github.com/atomastic/arrays) (2020-11-11)
* add offset() method.
* add limit() method.
* add copy() method.
* add except() method.
* add nth() method.
* add offsetGet() method.
* add offsetSet() method.
* add offsetExists() method.
* add offsetUnset() method.
* add getIterator() method.
* add protected getArray() method.
* add phpstan.neon config file.
* implement ArrayAccess, ArrayIntegrator, Countable, IneratrorAggregate, Traversable.
* improve create() method, add ability to path not only arrays inside.
* improve flush() method - return self instead of void
* improve filter() method - add ability to set $flag, default is ARRAY_FILTER_USE_BOTH
* improve set() method. add ability to set $key as null.
* fix issue for get() method in cace if $key type is int provided.
* fix php doc sesction for all methods.
* fix return result for delete() method if count($keys) === 0
* fix combine() method error with not accept array|false.
* fix toString() method when result $string is null we should return empty string instead of null.


<a name="1.1.0"></a>
# [1.1.0](https://github.com/atomastic/arrays) (2020-10-30)
* add next() method.
* add prev() method.
* add current() method.
* add groupBy() method.

<a name="1.0.0"></a>
# [1.0.0](https://github.com/atomastic/arrays) (2020-10-03)
* Initial release
