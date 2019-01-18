# Http Component
![version](https://img.shields.io/badge/version-1.1.1-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/http/blob/master/LICENSE)

Simple Http Component to work with Http request, response and urls.

### Installation

```
composer require flextype-components/http
```

### Usage

Set header status
```php
Http::setResponseStatus(404);
```

Redirects the browser to a page specified by the url argument.
```php
Http::redirect('http://flextype.org');
```

Set one or multiple request headers.
```php
Http::setRequestHeaders('Location: http://flextype.org');
```

Get
```php
$action = Http::get('action');
```

Post
```php
$username = Http::post('username');
```

Returns whether this is an ajax request or not
```php
if (Http::isAjaxRequest()) {
  // do something...
}
```

Terminate request
```php
Http::requestShutdown();
```


Gets the base URL
```php
echo Http::getBaseUrl();
```

Gets current URL
```php
echo Http::getCurrentUrl();
```

Get Uri String
```php
$uri_string = Http::getUriString();
```

Get Uri Segments
```php
$uri_segments = Http::getUriSegments();
```

Get Uri Segment
```php
$uri_segment = Http::getUriSegment(1);
```

## License
See [LICENSE](https://github.com/flextype-components/http/blob/master/LICENSE)
