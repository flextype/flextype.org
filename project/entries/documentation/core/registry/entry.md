---
title: Registry
template: docs
order: 5
breadcrumbs:
  -
    title: "Core Concepts"
    link: "[url]/documentation/core/"
on_this_page:
  -
    title: "Methods"
    link: "methods"
    level2:
      -
        title: "getInstance"
        link: "methods-getInstance"
      -
        title: "get"
        link: "methods-get"
      -
        title: "set"
        link: "methods-set"
      -
        title: "has"
        link: "methods-has"
      -
        title: "all"
        link: "methods-all"
      -
        title: "delete"
        link: "methods-delete"
      -
        title: "flush"
        link: "methods-flush"
---

A registry is a container for storing objects and values in the Flextype application space. By storing the value in a registry, the same object is always available throughout Flextype application. This mechanism is an alternative to using global storage. Flextype Registry is build on top of [Atomastic Registry Component](https://github.com/atomastic/registry).

### <a name="methods"></a> Methods

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="#methods-getInstance">getInstance</a></td>
            <td>Gets the instance via lazy initialization (created on first usage)</td>
        </tr>
        <tr>
            <td><a href="#methods-get">get</a></td>
            <td>Get item from the registry.</td>
        </tr>
        <tr>
            <td><a href="#methods-set">set</a></td>
            <td>Set an registry data to a given value using "dot" notation. If no key is given to the method, the entire registry data will be replaced.</td>
        </tr>
        <tr>
            <td><a href="#methods-has">has</a></td>
            <td>Determine if the registry has a value for the given name.</td>
        </tr>
        <tr>
            <td><a href="#methods-all">all</a></td>
            <td>Get all items from the registry.</td>
        </tr>
        <tr>
            <td><a href="#methods-delete">delete</a></td>
            <td>Get item from the registry.</td>
        </tr>
        <tr>
            <td><a href="#methods-flush">flush</a></td>
            <td>Flush all items from the registry.</td>
        </tr>
    </tbody>
</table>

### Methods Details

##### <a name="methods-getInstance"></a> `getInstance`

Gets the instance via lazy initialization (created on first usage)

```php
/**
 * Gets the instance via lazy initialization (created on first usage)
 */
public static function getInstance(): Registry
```

**Examples**

Get `flextype.settings.timezone` item from the registry.

```php
$flextype_timezone = flextype('registry')->get('flextype.settings.timezone');
```

##### <a name="methods-get"></a> `get`

Get item from the registry.

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

Get `flextype.settings.timezone` item from the registry.

```php
$flextype_timezone = flextype('registry')->get('flextype.settings.timezone');
```

##### <a name="methods-set"></a> `set`

Set an registry data to a given value using "dot" notation. If no key is given to the method, the entire registry data will be replaced.

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

Set `flextype.settings.timezone` item in the registry.

```php
flextype('registry')->set('flextype.settings.timezone', 'America/New_York');
```

##### <a name="methods-has"></a> `has`

Determine if the registry has a value for the given name.

```php
/**
 * Determine if the registry has a value for the given name.
 *
 * @param  string|array $keys The keys of the registry item to check for existence.
 */
public function has($keys): bool
```

**Examples**

Checks if an `flextype.settings.timezone` item with this key name is in the registry.

```php
if (flextype('registry')->has('flextype.settings.timezone')) {
    // do something...
}
```

##### <a name="methods-all"></a> `all`

Get all items from the registry.

```php
/**
 * Get all items from the registry.
 */
public function all(): array
```

**Examples**

```php
$registry = flextype('registry')->all();
```

##### <a name="methods-delete"></a> `delete()`

Delete a items from the registry.

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
flextype('registry')->delete('flextype.settings.timezone');
```

##### <a name="methods-flush"></a> `flush`

Flush all values from the registry.

```php
/**
 * Flush all items from the registry.
 */
public function flush(): void
```

**Examples**

```php
flextype('registry')->flush();
```
