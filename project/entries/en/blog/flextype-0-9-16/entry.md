---
title: Flextype 0.9.16 release
tags: release
template: blog-post
published_at: '14-01-2021 09:46'
author:
  name: Sergey Romanenko
---

### Features

* **parsers** add commonmark instead of parsedown ([#540](https://github.com/flextype/flextype/issues/540))
* **shortcodes** add new shortcode - media_files_fetch

    example:

    ```
    [media_files_fetch id="entries/home/foo.txt" field="title" default="Bar"]
    ```

### Bug Fixes

* **bootstrap** fix include path for dependencies.

### Refactoring

* **core** general code refactoring and improvements.
