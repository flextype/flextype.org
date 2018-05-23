---
title: Blocks
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

Flextype allows you to create custom content blocks marked up using Markdown and regular HTML and saved with `.md` extension in the folder `/site/blocks/`  

## Getting blocks inside pages
Flextype allows you easily get any content blocks with help of shortcodes inside pages and inside page headers variables, here is example:   

```
---
title: My Page
description: My page description
my-block: "[s_start]block name='my-block'[s_end]"
---
My page content.

[s_start]block name='my-block'[s_end]
```
