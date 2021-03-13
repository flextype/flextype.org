---
title: Border
template: docs 
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
  2:
    title: "Images"
    link: "[url]/documentation/rest-api/images/"
---

`border`

Add a border to the image. Required format: `width, color, method`.

**Width**

Sets the border width in pixels, or using relative dimensions.

**Color**

Sets the border color. See supported colors for more information on the available color formats.

**Method**

Sets how the border will be displayed. Available options:

* `overlay` - Place border on top of image (default).
* `shrink` - Shrink image within border (canvas does not change).
* `expand` - Expands canvas to accommodate border.

##### Usage

<div class="file-header">Request</div>

```http
GET YOUR_APP_URL/api/entries/images/image.jpg?border=10,5000,overlay&token=YOUR_IMAGES_TOKEN
GET YOUR_APP_URL/api/entries/images/image.jpg?border=10,FFCC33,expand&token=YOUR_IMAGES_TOKEN
```

##### Example

<div class="file-header">Request</div>

```http
GET [url]/documentation/api/entries/images/image.jpg?border=30,5000,overlay&token=4864fb8e1ebe080e6e4ad5c4363083a6
GET [url]/documentation/api/entries/images/image.jpg?border=30,FFCC33,expand&token=4864fb8e1ebe080e6e4ad5c4363083a6
```

##### Result

<img width="200" class="inline" src="[url]/documentation/api/images/entries/image.jpg?border=30,5000,overlay&token=4864fb8e1ebe080e6e4ad5c4363083a6">
<img width="200" class="inline" src="[url]/documentation/api/images/entries/image.jpg?border=30,FFCC33,expand&token=4864fb8e1ebe080e6e4ad5c4363083a6">
