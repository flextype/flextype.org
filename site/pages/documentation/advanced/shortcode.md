---
title: Shortcode
description: Documentation for Fansoro Developers and Fansoro Users.
template: documentation
---

The Shortcode Class s a simple regex based parser that allows you to replace simple bbcode-like tags within a HTMLText or HTMLVarchar field when rendered into a content.   

Examples of shortcode tags:  

```
{{shortcode}}
{{shortcode parameter="value"}}
```

Example of escaping shortcodes:  
```
{{{shortcode}}}
```

### Add new shortcode

Your shorcode function:  
```
function returnSiteUrl() {
   return Fansoro::$site['url'];
}
```

Add shortcode  
```
Shortcode::add('site_url', 'returnSiteUrl');
```

### Add new shortcode with Variables
Your shorcode function:  
```
function foo($attributes) {
    // Extract attributes
    extract($attributes);

    // text
    if (isset($text)) $text = $text; else $text = '';

    // return
    return $text;
}
```

Add shortcode {foo text="Hello World"}   
```
Shortcode::add('foo', 'foo');
```
Usage:  
```
{foo text="Hello World"}
```
Result:  
```
Hello World
```

### Add new shortcode with Variables and Content

Your shorcode function:  
```
function foo($attributes, $content) {
    // Extract attributes
    extract($attributes);

    // text
    if (isset($color)) $color = $color; else $color = 'black';

    // return
    return '<span style="color:'.$color.'">'.Filter::apply('content', $content).'</span>';
}
```
Add shortcode {foo color="red"}  
```
Shortcode::add('foo', 'foo');
```
Usage:  
```
{foo color="red"}Hello World{/foo}
```
Result:  
<span style="color: red">Hello World</span>  

### Check if a shortcode has been registered.
```
if (Shortcode::exists('foo')) {
    // do something...
}
```

### Remove a specific registered shortcode.
```
Shortcode::delete('foo');
```

### Remove all registered shortcodes.
```
Shortcode::clear();
```

## Braces
The shortcode parser does not accept braces within attributes. Thus the following will fail:   
```
{foo attribute="{Some value}"}Hello World{/foo}
```
