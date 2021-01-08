---
title: Admin
description: Admin Panel plugin for Flextype.
icon:
  name: fort-awesome
  set: fontawesome|brands
category: admin
author:
  name: Sergey Romanenko
  email: support@flextype.org
github: https://github.com/flextype-plugins/admin
documentation: https://github.com/flextype-plugins/admin
preview: https://github.com/flextype-plugins/admin/raw/dev/preview.png
template: plugin
---

![Admin](https://github.com/flextype-plugins/admin/raw/dev/preview.png)

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/admin`
3. Download Admin Plugin and unzip plugin content to the folder `/project/plugins/admin`
4. Go to `YOUR_SITE_URL/admin/accounts/registration` and create your super admin account.

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 80 | admin plugin priority |
| flextype_menu | [] | admin flextype menu |
| route | admin | custom admin panel route |

#### Entries settings

```
entries:
  items_view_default: list
  slugify: true
  media:
    upload_images_quality: 70
    upload_images_width: 1600
    upload_images_height: 0
    accept_file_types: gif, jpg, jpeg, png, ico, zip, tgz, txt, md, doc, docx, pdf, epub, xls, xlsx, ppt, pptx, mp3, ogg, wav, m4a, mp4, m4v, ogv, wmv, avi, webm, svg
```
