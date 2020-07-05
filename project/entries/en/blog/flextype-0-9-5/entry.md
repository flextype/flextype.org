---
title: Flextype 0.9.5 release
tags: release
template: blog-post
published_at: '21-09-2019 09:46'
---

### Bug Fixes

* **core:** issue with cache in the Entries API - fetchAll method #234 2779777
* **core:** issue with emitter twig function #234 426a073
* **core:** issue with empty entries folder Entries API - fetchAll method #234 cf61f2d
* **core:** issue with Cache ID for Themes list #234 594f4a3
* **admin-plugin:** issue with active button styles on Themes Manager page #234 434f336
* **admin-plugin:** issue with emitter twig function #234 806b18e
* **admin-plugin:** Russian translations #233
* **site-plugin:** notice for undefined $query['format'] #234 8bde8eb

### Code Refactoring
* **core:** remove $response from Forms render method #234
* **core:** add property forms to Flextype\EntriesController #234

### BREAKING CHANGES
Changed emitter execution in the templates

FROM
```
{{ emitter.emit('EVENT_NAME') }}
```

TO
```
{% do emitter.emit('EVENT_NAME') %}
```

### Update from Flextype 0.9.4 to Flextype 0.9.5

* Backup your Site First!
* Download flextype-0.9.5.zip
* Unzip the contents to a new folder on your local computer.
* Upload /flextype/, /vendor/, /site/plugins/admin/, /site/plugins/site/, /site/themes/default/ with an FTP client to your host.
* Clear cache
