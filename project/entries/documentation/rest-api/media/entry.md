---
title: Media
template: docs 
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
on_this_page:
  -
    title: "Files"
    link: "media-files"
    level2:
      -
        title: "Endpoints"
        link: "media-files-endpoints"
      -
        title: "Fetch file"
        link: "media-files-fetch-file"
      -
        title: "Upload file"
        link: "media-files-upload-file"
      -
        title: "Move file"
        link: "media-files-move-file"
      -
        title: "Copy file"
        link: "media-files-copy-file"
      -
        title: "Delete file"
        link: "media-files-delete-file"
      -
        title: "Update file meta"
        link: "media-files-update-file-meta"
      -
        title: "Add file meta"
        link: "media-files-add-file-meta"
      -
        title: "Delete file meta"
        link: "media-files-delete-file-meta"
  -
    title: "Folders"
    link: "media-folders"
    level2:
      -
        title: "Endpoints"
        link: "media-folders-endpoints"
      -
        title: "Fetch folder"
        link: "media-folders-fetch-folder"
      -
        title: "Create folder"
        link: "media-folders-create-folder"
      -
        title: "Move folder"
        link: "media-folders-move-folder"
      -
        title: "Copy folder"
        link: "media-folders-copy-folder"
      -
        title: "Delete folder"
        link: "media-folders-delete-folder"
---

#### Media Files <a name="media-files"></a>

The Flextype Files API organized around Representational State Transfer (REST) for delivering files from Flextype to apps, websites and other. Files are delivered as JSON data.

### <a name="media-files-endpoints"></a> Endpoints

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
                <td>/api/media/files</td>
                <td>Fetch file or files collection.</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/media/files</td>
                <td>Upload file.</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/media/files</td>
                <td>Move file.</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/media/files/copy</td>
                <td>Copy file.</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/media/files</td>
                <td>Delete file.</td>
            </tr>
            <tr>
                <td>PATCH</td>
                <td>/api/media/files/meta</td>
                <td>Updates file meta information.</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/media/files/meta</td>
                <td>Add file meta information.</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/media/files/meta</td>
                <td>Delete file meta information.</td>
            </tr>
        </tbody>
    </table>
</div>

### <a name="media-files-fetch-file"></a> Fetch file

##### Fetch single file

<div class="file-header">Request</div>

```http
GET /api/media/files?id=YOUR_MEDIA_FILES_ID&token=YOUR_MEDIA_FILES_TOKEN
```

##### Query

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>File ID.</td>
            </tr>
            <tr>
                <td>options</td>
                <td>OPTIONAL</td>
                <td>Array of options.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files Token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result

Returns the item object for the given unique identifier.

##### Examples

Fetch file
`entries/movies/sg-1/season-5/episode-21/cover.jpg`

<div class="file-header">Request</div>

```http
GET /api/media/files?id=entries/movies/sg-1/season-5/episode-21/cover.jpg&token=6f047babd1894064fbf7662080a9a2f0
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>
```http
{
    "data": {
        "title": "Episode 21",
        "filename": "cover.jpg",
        "basename": "cover",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21",
        "url": "project/uploads/entries/movies/sg-1/season-5/episode-21/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21/cover.jpg"
    }
}
```

##### Fetch files collection

<div class="file-header">Request</div>

```http
GET /api/media/files?id=YOUR_MEDIA_FILES_ID&options[collection]=true&token=YOUR_MEDIA_FILES_TOKEN
```

##### Query

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Folder ID.</td>
            </tr>
            <tr>
                <td>options</td>
                <td>OPTIONAL</td>
                <td>Array of options.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files Token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result

Returns an array of item objects.

##### Examples

Fetch Movies Folders Collection
`entries/movies/sg-1/season-5/episode-21`

<div class="file-header">Request</div>

```http
GET /api/media/files?id=entries/movies/sg-1/season-5/episode-21&token=6f047babd1894064fbf7662080a9a2f0
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```http
{
    "data": {
        "cover.jpg": {
            "title": "Episode 21",
            "filename": "cover.jpg",
            "basename": "cover",
            "extension": "jpg",
            "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21",
            "url": "project/uploads/entries/movies/sg-1/season-5/episode-21/cover.jpg",
            "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21/cover.jpg"
        }
    }
}
```

### <a name="media-files-upload-file"></a> Upload file

<div class="file-header">Request</div>

```http
POST /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>folder</td>
                <td>REQUIRED</td>
                <td>The folder you're targetting.</td>
            </tr>
            <tr>
                <td>file</td>
                <td>REQUIRED</td>
                <td>Raw file data (multipart/form-data).</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the file object for the file that was just uploaded.

##### Examples

Upload new file to **entries/movies/sg-1/season-5/episode-21**

<div class="file-header">Request</div>

```http
POST /api/media/files
```

<div class="file-header">Body</div>
```http
curl -i -X POST \
  -H "Content-Type: multipart/form-data" \
  -F "token=efe1e36e4d60fcd547e22eb9f795dff92" \
  -F "access_token=efe1e36e4d60fcd547e22eb9f795dff91" \
  -F "folder=entries/movies/sg-1/season-5/episode-21" \
  -F "file=@/users/awilum/documents/new-covers/new-cover.jpg" \
  https://localhost:8888/flextype/api/media/files
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
  "data": {
    "title": "New Cover",
    "description": "",
    "type": "image/jpeg",
    "filesize": 342298,
    "uploaded_on": 1596107422,
    "exif": {
      "html": "width=\"1600\" height=\"900\"",
      "Height": 900,
      "Width": 1600,
      "IsColor": 1
    },
    "filename": "new-cover.jpg",
    "basename": "new-cover",
    "extension": "jpg",
    "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21",
    "url": "project/uploads/entries/movies/sg-1/season-5/episode-21/new-cover.jpg",
    "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21/new-cover.jpg"
  }
}
```

### <a name="media-files-move-file"></a> Move file

<div class="file-header">Request</div>

```http
PUT /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>new_id</td>
                <td>REQUIRED</td>
                <td>New Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the folders object for the file that was just moved.

##### Examples

Move file **entries/movies/sg-1/season-5/episode-21/cover.jpg** to the **entries/movies/sg-1/season-5/episode-21/new-cover.jpg**

<div class="file-header">Request</div>

```http
PUT /api/media/files
```

<div class="file-header">Body</div>

```json
{
    "id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/episode-21/new-cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Episode 21",
        "filename": "new-cover.jpg",
        "basename": "new-cover",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21",
        "url": "project/uploads/entries/movies/sg-1/season-5/episode-21/new-cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21/new-cover.jpg"
    }
}
```

Move file **entries/movies/sg-1/season-5/episode-21/cover.jpg** to the **entries/movies/sg-1/season-5/cover.jpg**

<div class="file-header">Request</div>

```http
PUT /api/media/files
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Episode 21",
        "filename": "cover.jpg",
        "basename": "cover",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5",
        "url": "project/uploads/entries/movies/sg-1/season-5/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/new-cover.jpg"
    }
}
```

### <a name="copy-file"></a> Copy File

<div class="file-header">Request</div>

```http
PUT /api/media/files/copy
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>new_id</td>
                <td>REQUIRED</td>
                <td>New Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the file object for the file that was just copied.

##### Examples

Copy for entry **entries/movies/sg-1/season-5/cover.jpg** to **entries/movies/sg-1/season-5/episode-21/cover.jpg**

<div class="file-header">Request</div>

```http
PUT /api/media/files/copy
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/sg-1/season-5/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Episode 21",
        "filename": "cover.jpg",
        "basename": "cover",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21",
        "url": "project/uploads/entries/movies/sg-1/season-5/episode-21/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/episode-21/cover-4.jpg"
    }
}
```

### <a name="media-files-delete-file"></a> Delete file

<div class="file-header">Request</div>

```http
DELETE /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns an empty body with HTTP status 204

##### Examples

Delete entry **entries/movies/sg-1/season-5/episode-21/new-cover.jpg**

<div class="file-header">Request</div>

```http
DELETE /api/media/files
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/sg-1/season-5/episode-21/new-cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

### <a name="media-files-update-file-meta"></a> Update File Meta

<div class="file-header">Request</div>

```http
PUT /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>field</td>
                <td>REQUIRED</td>
                <td>Field name.</td>
            </tr>
            <tr>
                <td>value</td>
                <td>REQUIRED</td>
                <td>Field value.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the file object for the file that was just updated.

##### Examples

Update title for file **entries/movies/sg-1/season-5/cover.jpg**

<div class="file-header">Request</div>

```http
PATCH /api/media/files/meta
```

<div class="file-header">Body</div>

```json
{
    "field": "title",
    "value": "Season 5",
	"id": "entries/movies/sg-1/season-5/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Season 5",
        "filename": "cover.jpg",
        "basename": "cover-4",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5",
        "url": "project/uploads/entries/movies/sg-1/season-5/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/cover.jpg"
    }
}
```

### <a name="media-files-add-file-meta"></a> Add File Meta

<div class="file-header">Request</div>

```http
POST /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>field</td>
                <td>REQUIRED</td>
                <td>Field name.</td>
            </tr>
            <tr>
                <td>value</td>
                <td>REQUIRED</td>
                <td>Field value.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the file object for the file that was just updated.

##### Examples

Add tags for file **entries/movies/sg-1/season-5/cover.jpg**

<div class="file-header">Request</div>

```http
PATCH /api/media/files/meta
```

<div class="file-header">Body</div>

```json
{
    "field": "tags",
    "value": "sg-1, season-5",
	"id": "entries/movies/sg-1/season-5/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Season 5",
        "tags": "sg-1, season-5",
        "filename": "cover.jpg",
        "basename": "cover-4",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5",
        "url": "project/uploads/entries/movies/sg-1/season-5/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/cover.jpg"
    }
}
```


### <a name="media-files-delete-file-meta"></a> Delete File Meta

<div class="file-header">Request</div>

```http
DELETE /api/media/files
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the file.</td>
            </tr>
            <tr>
                <td>field</td>
                <td>REQUIRED</td>
                <td>Field name.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Files token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the file object for the file that was just updated.

##### Examples

Delete tags meta field for file **entries/movies/sg-1/season-5/cover.jpg**

<div class="file-header">Request</div>

```http
DELETE /api/media/files/meta
```

<div class="file-header">Body</div>

```json
{
    "field": "tags",
	"id": "entries/movies/sg-1/season-5/cover.jpg",
    "new_id": "entries/movies/sg-1/season-5/episode-21/cover.jpg",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "title": "Season 5",
        "filename": "cover.jpg",
        "basename": "cover-4",
        "extension": "jpg",
        "dirname": "/htdocs/flextype/project/uploads/entries/movies/sg-1/season-5",
        "url": "project/uploads/entries/movies/sg-1/season-5/cover.jpg",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/sg-1/season-5/cover.jpg"
    }
}
```

#### Media Folders <a name="media-folders"></a>

The Flextype Folders API organized around Representational State Transfer (REST) for delivering folders from Flextype to apps, websites and other. Folders are delivered as JSON data.

### <a name="media-folders-endpoints"></a> Endpoints

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
                <td>/api/media/folders</td>
                <td>Fetch folder(folders)</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/media/folders</td>
                <td>Create folder</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/media/folders</td>
                <td>Move folder</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/media/folders/copy</td>
                <td>Copy folder</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/media/folders</td>
                <td>Delete folder</td>
            </tr>
        </tbody>
    </table>
</div>

### <a name="media-folders-fetch-folder"></a> Fetch Folder

##### Fetch single folder

<div class="file-header">Request</div>

```http
GET /api/media/folders?id=YOUR_FOLDER_ID&options=[]&token=YOUR_FOLDERS_TOKEN
```

##### Query

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Folder id.</td>
            </tr>
            <tr>
                <td>options</td>
                <td>OPTIONAL</td>
                <td>Array of options.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders Token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result

Returns the item object for the given unique identifier.

##### Examples

Fetch Movies Folder

<div class="file-header">Request</div>

```http
GET /api/media/folders?id=movies&token=6f047babd1894064fbf7662080a9a2f0
```

##### Fetch folders collection

<div class="file-header">Request</div>

```http
GET /api/entries?id=YOUR_FOLDER_ID&options[collection]=true&token=YOUR_FOLDERS_TOKEN
```

##### Query

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Folder id.</td>
            </tr>
            <tr>
                <td>options</td>
                <td>OPTIONAL</td>
                <td>Array of options.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders Token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result

Returns an array of item objects.

##### Examples

Fetch Movies Folders Collection

<div class="file-header">Request</div>

```http
GET /api/media/folders?id=entries/movies&collection=true&token=6f047babd1894064fbf7662080a9a2f0
```

### <a name="media-folders-create-folder"></a> Create folder

<div class="file-header">Request</div>

```http
POST /api/media/folders
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>New folder id.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the folder object for the folder that was just created.

##### Examples

Create new folder **entries/movies/platform**

<div class="file-header">Request</div>

```http
POST /api/media/folders
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/platform",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "id": "entries/movies/platform",
        "full_id": "/htdocs/flextype/project/uploads/entries/movies/platform",
        "url": "project/uploads/entries/movies/platform",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/platform"
    }
}
```

### <a name="media-folders-move-folder"></a> Move folder

<div class="file-header">Request</div>

```http
PUT /api/media/folders
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the folder.</td>
            </tr>
            <tr>
                <td>new_id</td>
                <td>REQUIRED</td>
                <td>New Unique identifier of the folder.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Entries token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the folders object for the folders that was just moved.

##### Examples

Rename entry **entries/movies/platform** to the **entries/movies/the-platform**

<div class="file-header">Request</div>

```http
PUT /api/media/folders
```

<div class="file-header">Body</div>

```json
{
    "id": "entries/movies/platform",
    "new_id": "entries/movies/the-platform",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "id": "entries/movies/the-platform",
        "full_id": "/htdocs/flextype/project/uploads/entries/movies/the-platform",
        "url": "project/uploads/entries/movies/the-platform",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/the-platform"
    }
}
```

Move entry **entries/movies/the-platform** to the **entries/movies/2019/the-platform**

<div class="file-header">Request</div>

```http
PUT /api/media/folders
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/the-platform",
    "new_id": "entries/movies/2019/the-platform",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "id": "entries/movies/2019/the-platform",
        "full_id": "/htdocs/flextype/project/uploads/entries/movies/2019/the-platform",
        "url": "project/uploads/entries/movies/2019/the-platform",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/2019/the-platform"
    }
}
```

### <a name="media-folders-copy-folder"></a> Copy folder

<div class="file-header">Request</div>

```http
PUT /api/media/folders/copy
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the folder.</td>
            </tr>
            <tr>
                <td>new_id</td>
                <td>REQUIRED</td>
                <td>New Unique identifier of the folder.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns the folders object for the folders that was just copied.

##### Examples

Copy for entry **entries/movies/2019/the-platform** to **entries/movies/horror/the-platform**

<div class="file-header">Request</div>

```http
PUT /api/media/folders/copy
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/2019/the-platform",
    "new_id": "entries/movies/horror/the-platform",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>

```json
{
    "data": {
        "id": "entries/movies/horror/the-platform",
        "full_id": "/htdocs/flextype/project/uploads/entries/movies/horror/the-platform",
        "url": "project/uploads/entries/movies/horror/the-platform",
        "full_url": "https://localhost:8888/flextype/project/uploads/entries/movies/horror/the-platform"
    }
}
```

### <a name="media-folders-delete-folder"></a> Delete folder

<div class="file-header">Request</div>

```http
DELETE /api/media/folders
```

##### Body

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>REQUIRED</td>
                <td>Unique identifier of the folder.</td>
            </tr>
            <tr>
                <td>token</td>
                <td>REQUIRED</td>
                <td>Valid Folders token.</td>
            </tr>
            <tr>
                <td>access_token</td>
                <td>REQUIRED</td>
                <td>Valid Access token.</td>
            </tr>
        </tbody>
    </table>
</div>

##### Result
Returns an empty body with HTTP status 204

##### Examples

Delete entry **entires/movies/horror/the-platform**

<div class="file-header">Request</div>

```http
DELETE /api/media/folders
```

<div class="file-header">Body</div>

```json
{
	"id": "entries/movies/horror/the-platform",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018"
}
```
