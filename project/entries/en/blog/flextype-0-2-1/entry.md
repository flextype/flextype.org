---
title: Flextype 0.3.0 release
tags: release
template: blog-post
published_at: '05-04-2018 09:46'
---

### New

* Using Flextype Components instead of Symphony Components
* Available Flextype Components for developers: Arr, Assets, Cookie, Date, Debug, ErrorHandler, Event, Filesystem, Html, Http, I18n, Notification, Number, Registry, Session, Text, Token, View.
* Using .yaml files instead of .yml
* Default theme from now is simple
* Themes structure is changed. From now main folder for all theme templates and partials is views inside theme folder.
* Templates moved to /simple/views/templates/ and partials moved to /simple/views/partials/
* Default template changes from index.php to default.php
* Plugins templates can be overridden by templates in themes folder.
* For pages we will not use index.md anymore. From now page file will have a name page.md
* Config class was removed, from now we will use simple powerful Registry Component to access configurations.
* Event, Filter, View class was removed. From now we are using more powerful Flextype Components!
* Fixed issue with getPages() method.
* Twitter Bootstrap updated to 4.1.0 for default theme.
* ErrorHandler added with errors logs.
* Code cleanup and refactoring #5
