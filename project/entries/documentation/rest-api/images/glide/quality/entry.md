---
title: Quality
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`q`

Defines the quality of the image. Use values between `0` and `100`. Defaults to `90`. Only relevant if the format is set to `jpg` or `pjpg`.


##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?q=100&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?q=65&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?q=25&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/api/images/entries/image.jpg?q=100&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?q=65&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?q=25&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?q=100&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?q=65&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?q=25&token=3b29b31ae05c89c2009f6e3f96e3d703">
