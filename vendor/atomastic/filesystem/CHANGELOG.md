<a name="1.1.0"></a>
# [1.1.0](https://github.com/atomastic/filesystem) (2020-12-05)
* add ability to extend Filesystem class with Macros.

    ```php
    use Atomastic\Filesystem\Filesystem;
    use Atomastic\Macroable\Macroable;

    Filesystem::macro('countFiles', function($path) {
        return count(iterator_to_array($this->find()->in($path)->files(), false));
    });

    $filesytem = new Filesystem();

    echo $filesytem->countFiles('/directory');
    ```
* improve tests for directory `create()` method.

<a name="1.0.1"></a>
# [1.0.1](https://github.com/atomastic/filesystem) (2020-10-17)
* fix Directory copy() method.

<a name="1.0.0"></a>
# [1.0.0](https://github.com/atomastic/filesystem) (2020-10-15)
* Initial release
