---
title: Flextype 0.2.0 release
date: 2018-03-23 08:00
template: blog-post
author:
  name: Sergey Romanenko
---

Hello Everyone!  

Flextype 0.2.0 release is already published with improved core Architecture and with a new advanced Thunderer Shortcode Framework that will allow easily create and manage your shortcodes.  

Here is an example of creating and using the Thunderer Shortcode Framework in Flextype:   

##### Create Shortcode
```php
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

Shortcodes::driver()->addHandler('msg', function(ShortcodeInterface $s) {
    return '<div style="color:' . $s->getParameter('class') . '">' . $s->getContent() . '</div>';
});
```

##### Use Shortcode in the page content
```md
[msg color="red"]Hello World![/msg]
```

##### Result on the page
```html
<div style="color:red">Hello world!</div>
```

<br>

##### New public functions for filesystem and finder

From now, you can work with filesystem and finder with this new public static functions in the Flextype class:
```php
Flextype::finder()
Flextype::filesystem()
```
Example of using this functions:
```php
if (Flextype::filesystem()->exists('path/to/the/file.md')) {
    // do something...
}

$pages = Flextype::finder()->files()->name('*.md')->in(PAGES_PATH);
```

<br>

##### Other minor changes
* Cache: Flextype::VERSION for cache key - added
* flextype/boot/shortcodes.php	- removed
* flextype/boot/events.php - removed
* General Code cleanup and Refactoring

<br>

##### Update from Flextype 0.1.0 to Flextype 0.2.0
* Backup your Site First!
* Download: [flextype-0.2.0.zip](https://github.com/flextype/flextype/releases/download/v0.2.0/flextype-0.2.0.zip)
* Unzip the contents to a new folder on your local computer.
* Remove ```/flextype/```, ```/vendor/``` from your host.
* Upload ```/flextype/```, ```/vendor/```, ```/site/themes/default/```, ```/index.php```, with an FTP client to your host.


<br>

Download: [flextype-0.2.0.zip](https://github.com/flextype/flextype/releases/download/v0.2.0/flextype-0.2.0.zip)

<br>
