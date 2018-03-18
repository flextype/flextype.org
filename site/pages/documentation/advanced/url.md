---
title: Url
description: Documentation for Fansoro Developers and Fansoro Users.
template: documentation
---

The url class allows you to interact with the URLs.  

### Gets the base URL
```
$url_base = Url::getBase();
```

### Gets current URL
```
$url_current = Url::getCurrent();
```

### Get Uri String
```
$uri_string = Url::getUriString();
```

### Get Uri Segments
```
$uri_segments = Url::getUriSegments();
```

### Get Uri Segment
```
$uri_segment = Url::getUriSegment(0);
```

### Create safe url
```
$safe_url = Url::sanitizeURL($url);
```

### Sanitize URL to prevent XSS - Cross-site scripting
```
Url::runSanitizeURL();
```
