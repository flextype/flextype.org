# Session Component
![version](https://img.shields.io/badge/version-1.1.1-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/session/blob/master/LICENSE)

### Installation

```
composer require flextype-components/session
```

### Usage

Start the session.
```php
Session::start();
```

Delete one or more session variables.
```php
Session::delete('user');
```

Destroy the session.
```php
Session::destroy();
```

Check if a session variable exists.
```php
if (Session::exists('user')) {
    // Do something...
}
```

Get a variable that was stored in the session.
```php
echo Session::get('user');
```


Return the sessionID.
```php
echo Session::getSessionId();
```

Store a variable in the session.
```php
Session::set('user', 'Awilum');
```


## License
See [LICENSE](https://github.com/flextype-components/session/blob/master/LICENSE)
