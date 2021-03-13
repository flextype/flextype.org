---
title: Media
template: docs 
breadcrumbs:
  -
    title: "Core Concepts"
    link: "[url]/documentation/core/"
on_this_page:
  -
    title: "Files Methods"
    link: "files-methods"
    level2:
      -
        title: "upload()"
        link: "methods-files-upload"
      -
        title: "fetch()"
        link: "methods-files-fetch"
      -
        title: "move()"
        link: "methods-files-move"
      -
        title: "copy()"
        link: "methods-files-copy"
      -
        title: "delete()"
        link: "methods-files-delete"
      -
        title: "has()"
        link: "methods-files-has"
      -
        title: "getFileLocation()"
        link: "methods-files-getFileLocation"
  -
    title: "Files Meta Methods"
    link: "files-meta-methods"
    level2:
      -
        title: "update()"
        link: "methods-files-meta-update"
      -
        title: "add()"
        link: "methods-files-meta-add"
      -
        title: "delete()"
        link: "methods-files-meta-delete"
      -
        title: "getFileMetaLocation()"
        link: "methods-files-meta-getFileMetaLocation"
  -
    title: "Folders Methods"
    link: "folders-methods"
    level2:
      -
        title: "fetch()"
        link: "methods-folders-fetch"
      -
        title: "create()"
        link: "methods-folders-create"
      -
        title: "move()"
        link: "folders-move"
      -
        title: "delete()"
        link: "methods-folders-delete"
      -
        title: "getDirLocation()"
        link: "methods-folders-getDirLocation"
  -
    title: "Folders Meta Methods"
    link: "folders-meta-methods"
    level2:
      -
        title: "getDirMetaLocation()"
        link: "methods-folders-meta-getDirMetaLocation"
---

### <a name="files-methods"></a> Methods

#### Media Files <a name="media-files"></a>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-files-upload">upload()</a></td>
                <td>Upload media file.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-fetch">fetch()</a></td>
                <td>Fetch file or files collection.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-move">move()</a></td>
                <td>Move file.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-copy">copy()</a></td>
                <td>Copy file.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-delete">delete()</a></td>
                <td>Delete file.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-has">has()</a></td>
                <td>Check whether a file exists.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-getFileLocation">getFileLocation()</a></td>
                <td>Get file location.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-files-upload"></a> `upload()`

Upload media file.

```php
/**
 * Upload media file
 *
 * @param array  $file   Raw file data (multipart/form-data).
 * @param string $folder The folder you're targetting.
 *
 * @access public
 */
public function upload(array $file, string $folder)
```

**Examples**

```php
flextype('media')
  ->files()
  ->upload($_FILES['file'], '/entries/movies/sg-1/season-5/episode-21/');
```

##### <a name="methods-files-fetch"></a> `fetch()`

Fetch file or files collection.

```php
/**
 * Fetch.
 *
 * @param string $id    The path to file.
 * @param array  $options Options array.
 *
 * @access public
 */
public function fetch(string $id, array $options = []): Arrays
```

##### Fetch single file

**Examples**

```php
// Fetch single image
$cover = flextype('media')
                 ->files()
                 ->fetch('entries/movies/sg-1/season-5/episode-21/cover.jpg');

// Now you may get each image field from image meta data.
echo $cover['title'];
echo $cover['description'];
echo $cover['uploaded_on'];
echo $cover['filename'];
echo $cover['basename'];
echo $cover['extension'];
echo $cover['dirname'];
echo $cover['url'];
echo $cover['full_url'];

// Fetch single image and send $options
$cover = flextype('media')
                  ->files()
                  ->fetch('entries/movies/sg-1/season-5/episode-21/cover.jpg', $options);
```

`$options` is an array of valid values for [filter()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php) and [find()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FindHelper.php) helpers.

##### Fetch files collection

**Examples**

```php
// Fetch images collection
$images = flextype('media')
                     ->files()
                     ->fetch('entries/movies/sg-1/season-5/episode-21');

// Fetch images collection and send $options
$cover = flextype('media')
                  ->files()
                  ->fetch('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                                ['collection' => true, ...$options]);

```

`$options` is an array of valid values for [filter()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php) and [find()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FindHelper.php) helpers.

##### <a name="methods-files-move"></a> `move()`

Move file.

```php
/**
 * Move file
 *
 * @param string $id     Unique identifier of the file.
 * @param string $newID New Unique identifier of the file.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function move(string $id, string $newID): bool
```

**Examples**

```php
flextype('media')
  ->files()
  ->move('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                          'entries/movies/sg-1/season-5/episode-21/cover-image.jpg');
```


##### <a name="methods-files-copy"></a> `copy()`

Copy file.

```php
/**
 * Copy file
 *
 * @param string $id     Unique identifier of the file.
 * @param string $newID New Unique identifier of the file.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function copy(string $id, string $newID): bool
```

**Examples**

```php
flextype('media')
            ->files()
            ->copy('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                          'entries/movies/sg-1/season-5/episode-22/cover.jpg');
```

##### <a name="methods-files-delete"></a> `delete()`

Delete file.

```php
/**
 * Delete file
 *
 * @param string $id Unique identifier of the file.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function delete(string $id): bool
```

**Examples**

```php
flextype('media')
            ->files()
            ->delete('entries/movies/sg-1/season-5/episode-21/cover-image.jpg');
```

##### <a name="methods-files-has"></a> `has()`

Check whether a file exists.

```php
/**
 * Check whether a file exists.
 *
 * @param string $id Unique identifier of the file.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function has(string $id): bool
```

**Examples**

```php
if (flextype('media')
            ->files()
            ->has('entries/movies/sg-1/season-5/episode-21/cover-image.jpg')) {
    // do something...
}
```

##### <a name="files-getFileLocation"></a> `getFileLocation()`

Get file location.

```php
/**
 * Get file location
 *
 * @param string $id Unique identifier of the file.
 *
 * @return string entry file location
 *
 * @access public
 */
public function getFileLocation(string $id): string
```

**Examples**

```php
flextype('media')
            ->files()
            ->getFileLocation('entries/movies/sg-1/season-5/episode-21/cover-image.jpg');
```

#### <a name="files-meta-methods"></a> Media Files Meta

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-files-meta-update">update()</a></td>
                <td>Update file meta information.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-meta-add">add()</a></td>
                <td>Add file meta information.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-meta-delete">delete()</a></td>
                <td>Delete file meta information.</td>
            </tr>
            <tr>
                <td><a href="#methods-files-meta-getFileMetaLocation">getFileMetaLocation()</a></td>
                <td>Get file meta location.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-files-meta-update"></a> `update()`

Update file meta information.

**Examples**

```php
flextype('media')
            ->files()
            ->meta()
            ->update('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                     'title',
                     'Episode 21');
```

##### <a name="methods-files-meta-add"></a> `add()`

Add file meta information.

**Examples**

```php
flextype('media')
            ->files()
            ->meta()
            ->add('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                     'tags',
                     'sg1');
```

##### <a name="methods-files-meta-delete"></a> `delete()`

Delete file meta information.

**Examples**

```php
flextype('media')
            ->files()
            ->meta()
            ->delete('entries/movies/sg-1/season-5/episode-21/cover.jpg',
                     'tags');

```
##### <a name="methods-files-meta-getFileMetaLocation"></a> `getFileMetaLocation()`

Get file meta location.

**Examples**

```php
flextype('media')
            ->files()
            ->meta()
            ->getFileMetaLocation('entries/movies/sg-1/season-5/episode-21/cover.jpg');
```

#### <a name="folders-methods"></a> Media Folders

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-folders-fetch">fetch()</a></td>
                <td>Fetch folder or folders collection.</td>
            </tr>
            <tr>
                <td><a href="#methods-folders-create">move()</a></td>
                <td>Create folder.</td>
            </tr>
            <tr>
                <td><a href="#methods-folders-move">move()</a></td>
                <td>Move folder.</td>
            </tr>
            <tr>
                <td><a href="#methods-folders-delete">delete()</a></td>
                <td>Delete folder.</td>
            </tr>
            <tr>
                <td><a href="#methods-folders-getDirLocation">getDirLocation()</a></td>
                <td>Get folder location.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-folders-fetch"></a> `fetch()`

Fetch folder or folders collection.


#####  Fetch single folder.

**Examples**

```php
// Fetch single folder
$folder = flextype('media')
                ->folders()
                ->fetch('entries/movies/sg-1/season-5/episode-21');

echo $folder['path'];
echo $folder['full_path'];
echo $folder['url'];
echo $folder['full_url'];
```

##### Fetch folders collection.

**Examples**

```php
// Fetch folders collection
$folders = flextype('media')
                ->folders()
                ->fetch('entries/movies/sg-1/season-5', ['collection' => true]);
```

##### <a name="methods-folders-create"></a> `create()`

Create folder.

**Examples**

```php
flextype('media')
            ->folders()
            ->create('entries/movies/sg-1/season-5/episode-22');
```

##### <a name="methods-folders-move"></a> `move()`

Move folder.

**Examples**

```php
flextype('media')
            ->folders()
            ->move('entries/movies/sg-1/season-5/episode-22',
                            'entries/movies/sg-1/season-5/episode-23');
```

##### <a name="methods-folders-delete"></a> `delete()`

Delete folder.

**Examples**

```php
flextype('media')
            ->folders()
            ->delete('entries/movies/sg-1/season-5/episode-23');
```

##### <a name="methods-folders-getDirLocation"></a> `getDirLocation()`

Get folder location.

**Examples**

```php
flextype('media')
            ->folders()
            ->getDirLocation('entries/movies/sg-1/season-5/episode-23');
```

#### <a name="folders-meta-methods"></a> Media Folders Meta

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-folders-meta-getDirMetaLocation">getDirMetaLocation()</a></td>
                <td>Get files directory meta location.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-folders-meta-getDirMetaLocation"></a> `getDirMetaLocation()`

Get files directory meta location.

**Examples**

```php
flextype('media')
            ->folders()
            ->meta()
            ->getDirMetaLocation('entries/movies/sg-1/season-5/episode-23');
```
