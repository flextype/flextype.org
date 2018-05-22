---
title: Pages
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

Pages are the fundamental building-blocks of your site. Each page in Flextype should contains **page header** block in YAML format at the top of the file and **page content** marked up using Markdown and regular HTML at the bottom of the file.

Here is a basic example:  

```
---
title: My Page
description: My page description
---
My page content.
```

Between these triple-dashed lines, you can set predefined page header variables or even create custom ones of your own. These variables will then be available to you to access in site templates.  

### Predefined Page Header Variables
Here is a list of predefined page header variables with example values:  
```
title: Welcome  
description: Some description here   
keywords: key, words
published: false
author:
  name: Sergey Romanenko
  email: awilum@msn.com
  url: https://github.com/Awilum
date: 2015-10-18 16:00
robots: noindex, nofollow  
template: default (allows you to use different templates in your theme)  
```


### Custom Page Header Variables
You can create your own custom page header variables using any valid YAML syntax.

Example:   
```
author:
  twitter: @getflextype
```


### Pages and Urls structure in Flextype:

<table class="table">
    <thead>
        <tr><th>Physical Location</th><th>URL</th></tr>
    </thead>
    <tbody>
        <tr><td>site/pages/home/page.md</td><td>/</td></tr>
        <tr><td>site/pages/blog/my-post/page.md</td><td>/blog/my-post</td></tr>
        <tr><td>site/pages/a/very/long/url/page.md</td><td>/a/very/long/url</td></tr>
    </tbody>
</table>

### Page shortcodes
<table class="table">
    <thead>
        <tr><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td>site_url</td><td>Outputs site url</td></tr>
        <tr><td>block</td><td>Get blocks</td></tr>
        <tr><td>registry</td><td>Access registry</td></tr>
    </tbody>
</table>
