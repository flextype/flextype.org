---
title: Crop
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`crop`

Crops the image to specific dimensions prior to any other resize operations.<br>
Required format: `width, height, x, y`.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?crop=2000,2000,600,655&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/api/images/entries/image.jpg?crop=2000,2000,600,655&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?crop=2000,2000,600,655&token=3b29b31ae05c89c2009f6e3f96e3d703">
