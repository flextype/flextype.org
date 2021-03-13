---
title: Brightness
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`bri`

Adjusts the image brightness. Use values between `-100` and `+100`, where `0` represents no change.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?bri=-50&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?bri=50&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/api/images/entries/image.jpg?bri=-50&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?bri=50&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?bri=-50&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?bri=50&token=3b29b31ae05c89c2009f6e3f96e3d703">
