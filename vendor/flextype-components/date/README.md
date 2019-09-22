# Date Component
![version](https://img.shields.io/badge/version-1.1.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/date/blob/master/LICENSE)

Date component is a set of methods to help with the manipulation of dates.

### Installation

```
composer require flextype-components/date
```

### Usage

```php
use Flextype\Component\Date\Date;
```

Get format date
```php
echo Date::format($date, 'j.n.Y');
```

Get number of seconds in a minute, incrementing by a step.
```php
$seconds = Date::seconds();
```

Get number of minutes in a hour, incrementing by a step.
```php
$minutes = Date::minutes();
```

Get number of hours, incrementing by a step.
```php
$hours = Date::hours();
```

Get number of months.
```php
$months = Date::months();
```

Get number of days.
```php
$months = Date::days();
```

Returns the number of days in the requested month
```php
$days = Date::daysInMonth(1);
```

Get number of years.
```php
$years = Date::years();
```

Get current season name
```php
echo Date::season();
```

Get today date
```php
echo Date::today();
```

Get yesterday date
```php
echo Date::yesterday();
```

Get tomorrow date
```php
echo Date::tomorrow();
```

Converts a UNIX timestamp to DOS format.
```php
$dos = Date::unix2dos($unix);
```

Converts a DOS timestamp to UNIX format.
```php
$unix = Date::dos2unix($dos);
```

Get Time zones
```php
$tz = Date::timezones();
```

## License
See [LICENSE](https://github.com/flextype-components/date/blob/master/LICENSE)
