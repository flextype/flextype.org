---
title: Gamma
template: docs
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`gam`

Adjusts the image gamma. Use values between `0.1` and `9.99`.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/images/entries/image.jpg?gam=0.1&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/images/entries/image.jpg?gam=9.99&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/api/images/entries/image.jpg?gam=0.1&token=3b29b31ae05c89c2009f6e3f96e3d703
GET [url]/api/images/entries/image.jpg?gam=9.99&token=3b29b31ae05c89c2009f6e3f96e3d703
```

##### Result

<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?gam=0.1&token=3b29b31ae05c89c2009f6e3f96e3d703">
<img width="200" class="inline" src="[url]/api/images/entries/image.jpg?gam=9.99&token=3b29b31ae05c89c2009f6e3f96e3d703">
