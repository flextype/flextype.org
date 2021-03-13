---
title: Images
description: The Flextype Images allows the retrieval and manipulation of image files referenced from media.
template: docs 
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
on_this_page:
  0:
    title: "Endpoints"
    link: "endpoints"
  1:
    title: "Fetch image"
    link: "fetch-image"
  2:
    title: "Image manipulations"
    link: "displaying-images-in-the-template-glide-options"
---

The Flextype Images API allows the retrieval and manipulation of image files referenced from Flextype site media directory to apps, websites and other media. Images are delivered as files.

### <a name="endpoints"></a> Endpoints

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Endpoint</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GET</td>
                <td>/api/images</td>
                <td>Fetch image</td>
            </tr>
        </tbody>
    </table>
</div>

### <a name="fetch-image"></a> Fetch image

<div class="file-header">Request</div>

```http
GET /api/images/{path:.+}?VALID_ARGUMENTS&token=YOUR_IMAGES_TOKEN
```

##### Parameters

<div class="table">
<table>
<thead>
<tr>
<th>name</th>
<th></th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>{path:.+}</td>
<td>REQUIRED</td>
<td>The file path with valid params for image manipulations.</td>
</tr>
</tbody>
</table>
</div>

##### Query

<div class="table">
<table>
<thead>
<tr>
<th>name</th>
<th></th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>*</td>
<td>REQUIRED</td>
<td><a href="#displaying-images-in-the-template-glide-options">Valid arguments for images manipulation</a></td>
</tr>
<tr>
<td>token</td>
<td>REQUIRED</td>
<td>Valid Images token.</td>
</tr>
</tbody>
</table>
</div>

##### Examples

Fetch image **venom-2** from upload directory **/movies/venom-2/**

<div class="file-header">Request</div>

```http
GET /api/images/entries/movies/venom-2/venom-2.jpg?token=c1fda5a94603a7296f3a0a5370cfe59f
```

Fetch image **venom-2** from upload directory **/movies/venom-2/** and do several image manipulations

<div class="file-header">Request</div>

```http
GET /api/images/entries/movies/venom-2/venom-2.jpg?w=100&q=70&token=c1fda5a94603a7296f3a0a5370cfe59f
```

### <a name="displaying-images-in-the-template-glide-options"></a> A complete list of available options for Glide/Intervention
* [Orientation](./images/glide/orientation)
* [Flip](./images/glide/flip)
* [Crop](./images/glide/crop)
* [Width](./images/glide/width)
* [Height](./images/glide/height)
* [Fit](./images/glide/fit)
* [Device pixel ratio](./images/glide/device-pixel-ratio)
* [Brightness](./images/glide/brightness)
* [Contrast](./images/glide/contrast)
* [Gamma](./images/glide/gamma)
* [Sharpen](./images/glide/sharpen)
* [Blur](./images/glide/blur)
* [Pixelate](./images/glide/pixelate)
* [Filter](./images/glide/filter)
* [Border](./images/glide/border)
* [Quality](./images/glide/quality)
* [Format](./images/glide/format)
* [Relative dimensions](./images/glide/relative-dimensions)
* [Colors](./images/glide/colors)
