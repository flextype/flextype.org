<h1 align="center">Registry Component</h1>
<p align="center">
Registry Component provides a fluent, object-oriented interface for storing data globally in a well managed fashion, helping to prevent global meltdown.
</p>
<p align="center">
<a href="https://github.com/atomastic/registry/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/registry.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/registry"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://packagist.org/packages/atomastic/registry"><img src="https://poser.pugx.org/atomastic/registry/downloads" alt="Total downloads"></a> <img src="https://github.com/atomastic/registry/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/registry/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/registry?utm_source=github.com&utm_medium=referral&utm_content=atomastic/registry&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a> <a href="https://codeclimate.com/github/atomastic/registry/maintainability"><img src="https://api.codeclimate.com/v1/badges/4aff5282f051b4aebe22/maintainability" /></a> <a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fatomastic%2Fregistry?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fatomastic%2Fregistry.svg?type=shield"/></a>
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
composer require atomastic/registry
```

### Usage

```php
use Atomastic\Registry\Registry;

// Using public static method getInstance()
$registry = Registry::getInstance();

// Using global helper function registry() thats returns Registry::getInstance()
$registry = registry();
```

### Methods

| Method | Description |
|---|---|
| <a href="#registry_getInstance">`getInstance()`</a> | Gets the instance via lazy initialization (created on first usage) |
| <a href="#registry_set">`set()`</a> | Set an registry data to a given value using "dot" notation. If no key is given to the method, the entire registry data will be replaced. |
| <a href="#registry_get">`get()`</a> | Get item from the registry. |
| <a href="#registry_has">`has()`</a> | Determine if the registry has a value for the given name. |
| <a href="#registry_delete">`delete()`</a> | Get item from the registry. |
| <a href="#registry_all">`all()`</a> | Get all items from the registry. |
| <a href="#registry_flush">`flush()`</a> | Flush all items from the registry. |

#### Methods Details

##### <a name="registry_getInstance"></a> Method: `getInstance()`

```php
/**
 * Gets the instance via lazy initialization (created on first usage)
 */
public static function getInstance(): Registry
```

**Examples**

```php
$registry = Registry::getInstance();
```

##### <a name="registry_set"></a> Method: `set()`

```php
/**
 * Set an registry data to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire registry data will be replaced.
 *
 * @param  string $key   Key
 * @param  mixed  $value Value
 */
public function set(string $key, $value): self
```

**Examples**

```php
$registry->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="registry_get"></a> Method: `get()`

```php
/**
 * Get item from the registry.
 *
 * @param  string $key     The name of the item to fetch.
 * @param  mixed  $default Default value
 */
public function get(string $key, $default = null)
```

**Examples**

```php
$title = $registry->get('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="registry_has"></a> Method: `has()`

```php
/**
 * Determine if the registry has a value for the given name.
 *
 * @param  string|array $keys The keys of the registry item to check for existence.
 */
public function has($keys): bool
```

**Examples**

```php
if ($registry->has('movies.the-thin-red-line')) {
    // Do something...
}
```

##### <a name="registry_delete"></a> Method: `delete()`

```php
/**
 * Delete a items from the registry.
 *
 * @param  array|string $keys Keys
 */
public function delete($keys): self
```

**Examples**

```php
$registry->delete('movies.the-thin-red-line');
```

##### <a name="registry_all"></a> Method: `all()`

```php
/**
 * Get all items from the registry.
 */
public function all(): array
```

**Examples**

```php
foreach ($registry->all() as $key => $value) {
    // code...
}
```

##### <a name="registry_flush"></a> Method: `flush()`

```php
/**
 * Flush all items from the registry.
 */
public function flush(): void
```

**Examples**

```php
$registry->flush();
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/registry/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
