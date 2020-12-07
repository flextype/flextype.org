<h1 align="center">Macroable Component</h1>
<p align="center">
Macroable Component is a trait that, gives you the ability in effect to add new methods to a class at runtime.
</p>
<p align="center">
<a href="https://github.com/atomastic/macroable/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/macroable.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/macroable"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://packagist.org/packages/atomastic/macroable"><img src="https://poser.pugx.org/atomastic/macroable/downloads" alt="Total downloads"></a> <img src="https://github.com/atomastic/macroable/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/macroable/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/macroable?utm_source=github.com&utm_medium=referral&utm_content=atomastic/macroable&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a> <a href="https://codeclimate.com/github/atomastic/macroable/maintainability"><img src="https://api.codeclimate.com/v1/badges/a4c673a4640a3863a9a4/maintainability" /></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Methods](#methods)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/macroable
```

### Usage

```php
use Atomastic\Macroable\Macroable;
```

### Methods

| Method | Description |
|---|---|
| <a href="#macroable_macro">`macro()`</a> | Register a custom macro. |
| <a href="#macroable_mixin">`mixin()`</a> | Mix another object into the class. |
| <a href="#macroable_hasMacro">`hasMacro()`</a> | Checks if macro is registered. |

#### Methods Details

##### <a name="macroable_macro"></a> Method: `macro()`

```php
/**
 * Register a custom macro.
 *
 * @param  string           $name   Name.
 * @param  object|callable  $macro  Macro.
 * @return void
 */
public static function macro(string $name, $macro): void
```

##### Example

```php
$macroableClass = new class() {
    use Macroable;
};

$macroableClass::macro('concatenate', function(... $strings) {
   return implode('-', $strings);
});

$macroableClass::macro('message', function($name) {
   return 'Hello ' . $name;
});

echo $macroableClass->concatenate('one', 'two', 'three');
echo $macroableClass->message('Jack');
```

##### The above example will output:

```
one-two-three
Hello Jack
```

##### <a name="macroable_mixin"></a> Method: `mixin()`

```php
/**
 * Mix another object into the class.
 *
 * @param  object  $mixin   Mixin.
 * @param  bool    $replace Replace.
 * @return void
 *
 * @throws ReflectionException
 */
public static function mixin($mixin, bool $replace = true): void
```

##### Example

```php
$mixinClass = new class() {
    public function mixinMethod()
    {
       return function() {
          return 'mixinMethod';
       };
    }

    public function anotherMixinMethod()
    {
       return function() {
          return 'anotherMixinMethod';
       };
    }
};

$macroableClass->mixin($mixin);

$macroableClass->mixinMethod();
$macroableClass->anotherMixinMethod();
```

##### The above example will output:

```
mixinMethod
anotherMixinMethod
```


##### <a name="macroable_hasMacro"></a> Method: `hasMacro()`

```php
/**
 * Checks if macro is registered.
 *
 * @param  string  $name Name
 * @return bool
 */
public static function hasMacro(string $name): bool
```

##### Example

```php
$macroableClass = new class() {
    use Macroable;
};

$macroableClass::macro('message', function($name) {
   return 'Hello ' . $name;
});

if ($macroableClass::hasMacro('message')) {
    // do something...
}
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/macroable/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
