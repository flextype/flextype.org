---
title: Headers
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

Any page need contain header in YAML format and its must be a first thing in the page file.  
Here is a basic example:  

```
---
title: My Page
description: My page description
---
My page body.
```

Between these triple-dashed lines, you can set predefined page header variables or even create custom ones of your own. These variables will then be available to you to access in site templates.  

### Predefined Page Header Variables
Here is a list of predefined page header variables with example values:  
```
title: Welcome  
description: Some description here   
keywords: key, words
author:
  name: Sergey Romanenko
  email: awilum@msn.com
  url: https://github.com/Awilum
date: 2015-10-18 16:00
tags: tag1, tag2
robots: noindex, nofollow  
template: default (allows you to use different templates in your theme)  
```


### Custom Page Header Variables
You can create your own custom page headers using any valid YAML syntax.  
Example:   
```
author:
  twitter: @getflextype
```
