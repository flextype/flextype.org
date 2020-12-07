<h1 align="center">Session Component</h1>
<p align="center">
Session Component provide a fluent, object-oriented interface for working with Session.
</p>
<p align="center">
<a href="https://github.com/atomastic/session/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/session.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/session"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/session"><img src="https://img.shields.io/github/downloads/atomastic/session/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/session/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/session/workflows/Tests/badge.svg"> <a href="https://app.codacy.com/gh/atomastic/session?utm_source=github.com&utm_medium=referral&utm_content=atomastic/session&utm_campaign=Badge_Grade"><img src="https://api.codacy.com/project/badge/Grade/d8a4df30541c47828f3ea42d2477f74e"></a> <a href="https://codeclimate.com/github/atomastic/session/maintainability"><img src="https://api.codeclimate.com/v1/badges/089f18a2187bcb3d35fb/maintainability" /></a> <a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fatomastic%2Fsession?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fatomastic%2Fsession.svg?type=shield"/></a>
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
composer require atomastic/session
```

### Usage

```php
use Atomastic\Session\Session;

// Create the session object.
$session = new Session();

// Set session options.
$session->setOptions([
    'use_cookies' => 1,
    'cookie_secure' => 1,
    'use_only_cookies' => 1,
    'cookie_httponly' => 1,
    'use_strict_mode' => 1,
    'sid_bits_per_character' => 5,
    'sid_length' => 48,
    'cache_limiter' => 'nocache',
    'cookie_samesite' => 'Lax'
]);

// Start session.
$session->start();
```

### Methods

| Method | Description |
|---|---|
| <a href="#session_all">`all()`</a> | Gets all session values as array. |
| <a href="#session_close">`close()`</a> | Force the session to be saved and closed. Session data is usually stored after your script terminated without the need to call close(), but as session data is locked to prevent concurrent writes only one script may operate on a session at any time. When using framesets together with sessions you will experience the frames loading one by one due to this locking. You can reduce the time needed to load all the frames by ending the session as soon as all changes to session variables are done. |
| <a href="#session_delete">`delete()`</a> | Deletes an attribute by key. |
| <a href="#session_destroy">`destroy()`</a> | Invalidates the current session. Clears all session data and regenerates session ID. |
| <a href="#session_flush">`flush()`</a> | Flush all session data. |
| <a href="#session_get">`get()`</a> | Gets an attribute by key. |
| <a href="#session_getId">`getId()`</a> | Returns the session ID. |
| <a href="#session_getOptions">`getOptions()`</a> | Get session runtime configuration. |
| <a href="#session_getName">`getName()`</a> | Returns the session name. |
| <a href="#session_getCookieParams">`getCookieParams()`</a> | Get cookie parameters. |
| <a href="#session_has">`has()`</a> | Returns true if the key exists. |
| <a href="#session_isStarted">`isStarted()`</a> | Checks if the session was started. |
| <a href="#session_pull">`pull()`</a> | Gets an session attribute by key and remove it. |
| <a href="#session_regenerateId">`regenerateId()`</a> | Regenerates the session ID. Migrates the current session to a new session id while maintaining all session attributes. |
| <a href="#session_setId">`setId()`</a> | Sets the session ID. |
| <a href="#session_setName">`setName()`</a> | Sets the session name. |
| <a href="#session_set">`set()`</a> | Sets an session attribute by key. |
| <a href="#session_setOptions">`setOptions()`</a> | Set session runtime configuration. |
| <a href="#session_setCookieParams">`setCookieParams()`</a> | Set cookie parameters. |
| <a href="#session_start">`start()`</a> | Starts the session. |

#### Methods Details

##### <a name="arrays_all"></a> Method: `all()`

```php
/**
 * Gets all session values as array.
 *
 * @return array The session values
 */
public function all(): array
```

##### Example

```php
$result = $session->all();
```

##### <a name="arrays_close"></a> Method: `close()`

```php
/**
 * Force the session to be saved and closed.
 *
 * Session data is usually stored after your script terminated without the need
 * to call close(), but as session data is locked to prevent concurrent
 * writes only one script may operate on a session at any time. When using
 * framesets together with sessions you will experience the frames loading one
 * by one due to this locking. You can reduce the time needed to load all the
 * frames by ending the session as soon as all changes to session variables are
 * done.
 */
public function close(): void
```

##### Example

```php
$session->close();
```

##### <a name="arrays_delete"></a> Method: `delete()`

```php
/**
 * Deletes an attribute by key.
 *
 * @param string $key The key to remove.
 */
public function delete(string $key): void
```

##### Example

```php
$session->delete('foo');
```

##### <a name="arrays_destroy"></a> Method: `destroy()`

```php
/**
 * Invalidates the current session.
 * Clears all session data and regenerates session ID.
 *
 * @throws SessionException On error.
 */
public function destroy(): void
```

##### Example

```php
$session->destroy();
```

##### <a name="arrays_flush"></a> Method: `flush()`

```php
/**
 * Flush all session data.
 */
public function flush(): void
```

##### Example

```php
$session->flush();
```

##### <a name="arrays_get"></a> Method: `get()`

```php
/**
 * Gets an attribute by key.
 *
 * @param string $key The key name.
 *
 * @return mixed|null Should return null if the key is not found.
 */
public function get(string $key)
```

##### Example

```php
$result = $session->get('foo');
```

##### <a name="arrays_getId"></a> Method: `getId()`


```php
/**
 * Returns the session ID.
 *
 * @return string The session ID.
 */
public function getId(): string
```

##### Example

```php
$id = $session->getId();
```

##### <a name="arrays_getOptions"></a> Method: `getOptions()`


```php
/**
 * Get session runtime configuration.
 *
 * @return array The options
 */
public function getOptions(): array
```

##### Example

```php
$options = $session->getOptions();
```

##### <a name="arrays_getName"></a> Method: `getName()`

```php
/**
 * Returns the session name.
 *
 * @return string The session name.
 */
public function getName(): string
```

##### Example

```php
$name = $session->getName();
```

##### <a name="arrays_getCookieParams"></a> Method: `getCookieParams()`

```php
/**
 * Get cookie parameters.
 *
 * @see http://php.net/manual/en/function.session-get-cookie-params.php
 *
 * @return array The cookie parameters
 */
public function getCookieParams(): array
```

##### Example

```php
$cookieParams = $session->getCookieParams();
```

##### <a name="arrays_has"></a> Method: `has()`

```php
/**
 * Returns true if the key exists.
 *
 * @param string $key The key.
 *
 * @return bool true if the key is defined, false otherwise.
 */
public function has(string $key): bool
```

##### Example

```php
if ($session->has('foo')) {
    // do someting...
}
```

##### <a name="arrays_isStarted"></a> Method: `isStarted()`

```php
/**
 * Checks if the session was started.
 *
 * @return bool Session status.
 */
public function isStarted(): bool
```

##### Example

```php
if ($session->isStarted()) {
    // do someting...
}
```

##### <a name="arrays_pull"></a> Method: `pull()`

```php
/**
 * Gets an session attribute by key and remove it.
 *
 * @param string $key The key name.
 *
 * @return mixed|null Should return null if the key is not found.
 */
public function pull(string $key)
```

##### Example

```php
$result = $session->pull('foo');
```

##### <a name="arrays_regenerateId"></a> Method: `regenerateId()`

```php
/**
 * Regenerates the session ID
 *
 * Migrates the current session to a new session id while maintaining all session attributes.
 *
 * @throws SessionException On error.
 */
public function regenerateId(): void
```

##### Example

```php
$result = $session->regenerateId();
```

##### <a name="arrays_set"></a> Method: `set()`

```php
/**
 * Sets an session attribute by key.
 *
 * @param string $key   The key of the element to set.
 * @param mixed  $value The data to set.
 */
public function set(string $key, $value): void
```

##### Example

```php
$session->set('foo', 'bar');
```

##### <a name="arrays_setId"></a> Method: `setId()`

```php
/**
 * Sets the session ID.
 *
 * @param string $id The session id.
 *
 * @throws SessionException On error.
 */
public function setId(string $id): void
```

##### Example

```php
$session->setId('foo');
```

##### <a name="arrays_setOptions"></a> Method: `setOptions()`

```php
/**
 * Set session runtime configuration.
 *
 * @see http://php.net/manual/en/session.configuration.php
 *
 * @param array $config The session options.
 */
public function setOptions(array $options): void
```

##### Example

```php
$session->setOptions([
    'use_cookies' => 1,
    'cookie_secure' => 1,
    'use_only_cookies' => 1,
    'cookie_httponly' => 1,
    'use_strict_mode' => 1,
    'sid_bits_per_character' => 5,
    'sid_length' => 48,
    'cache_limiter' => 'nocache',
    'cookie_samesite' => 'Lax'
]);
```

##### <a name="arrays_setCookieParams"></a> Method: `setCookieParams()`

```php
/**
 * Set cookie parameters.
 *
 * @see http://php.net/manual/en/function.session-set-cookie-params.php
 *
 * @param int         $lifetime The lifetime of the cookie in seconds
 * @param string|null $path     The path where information is stored
 * @param string|null $domain   The domain of the cookie
 * @param bool        $secure   The cookie should only be sent over secure connections
 * @param bool        $httpOnly The cookie can only be accessed through the HTTP protocol
 */
public function setCookieParams(
    int $lifetime,
    ?string $path = null,
    ?string $domain = null,
    bool $secure = false,
    bool $httpOnly = false
): void
```

##### Example

```php
$session->setCookieParams(60, '/', '', false, false);
```

##### <a name="arrays_start"></a> Method: `start()`

```php
/**
 * Starts the session.
 *
 * @throws SessionException On error.
 */
public function start(): void
```

##### Example

```php
$session->start();
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/session/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
