---
title: Orientation
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`or`

Rotates the image. Accepts auto, `0`, `90`, `180` or `270`. Default is `auto`. The auto option uses Exif data to automatically orient images correctly.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?or=0&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?or=90&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?or=180&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?or=270&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/api/images/entries/image.jpg?or=0&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?or=90&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?or=180&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?or=270&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?or=0&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?or=90&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?or=180&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?or=270&token=3b29b31ae05c89c2009f6e3f96e3d703">
