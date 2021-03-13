---
title: Sharpen
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`sharp`

Sharpen the image. Use values between `0` and `100`.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?sharp=0&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?sharp=50&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?sharp=100&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/documentation/api/images/entries/image.jpg?sharp=0&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/documentation/api/images/entries/image.jpg?sharp=50&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/documentation/api/images/entries/image.jpg?sharp=100&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?sharp=0&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?sharp=50&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?sharp=100&token=3b29b31ae05c89c2009f6e3f96e3d703">
