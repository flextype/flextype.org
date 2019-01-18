# Event Component
![version](https://img.shields.io/badge/version-1.0.4-brightgreen.svg?style=flat-square)
![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

Event Component provides a versatile tool to manage events in your app.

### Installation

```
composer require flextype-components/event
```

### Usage

```php
use Flextype\Component\Event\Event;
```

Add new listeners
```php
Event::addListener('event_name', function() { echo 'Test Event 1'; }, 1);
Event::addListener('event_name', function() { echo 'Test Event 2'; }, 2);
```

Remove all listeners for current event.
```php
Event::removeAllListeners('event_name');
```

Check is listeners exists for current event.
```php
if (Event::hasListeners('event_name')) {
    // do something...
}
```

Dispatch all listeners of the given event.
```php
Event::dispatch('event_name');
```

Get listeners array
```php
$listeners = Event::getListeners();
```

## License
See [LICENSE](https://github.com/flextype-components/event/blob/master/LICENSE)
