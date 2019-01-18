# Debug Component
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/debug/blob/master/LICENSE)

Debug component provides a simple methods for debugging variables, objects, arrays, etc by outputting information to the display.

### Installation

```
composer require flextype-components/debug
```

### Usage

```php
use Flextype\Component\Debug\Debug;
```

Save current time for current point
```php
Debug::elapsedTimeSetPoint('point_name');
```

Get elapsed time for current point
```php
echo Debug::elapsedTime('point_name');
```

 Save current memory for current point
 ```php
 Debug::memoryUsageSetPoint('point_name');
 ```

Get memory usage for current point
```php
echo Debug::memoryUsage('point_name');
```

Print the variable $data and exit if exit = true
```php
Debug::dump($data);
```

## License
See [LICENSE](https://github.com/flextype-components/debug/blob/master/LICENSE)
