---
title: Entries
template: docs
description: Entries are the fundamental building-blocks of your site. Each entry in Flextype should contains Entry Front Matter block in YAML format at the top of the file and Entry Content marked up using HTML + Markdown + Shortcodes at the bottom of the file.
breadcrumbs:
  1:
    title: "Core Concepts"
    link: "[url]/documentation/core/"
on_this_page:
  -
    title: "Entries and Urls structure"
    link: "entries-and-urls-structure"
  -
    title: "Default Variables"
    link: "default-variables"
    level2:
      -
        title: "visibility"
        link: "default-variables-visibility"
      -
        title: "routable"
        link: "default-variables-routable"
      -
        title: "published_at"
        link: "default-variables-published-at"
      -
        title: "published_by"
        link: "default-variables-published-by"
      -
        title: "created_at"
        link: "default-variables-created-at"
      -
        title: "created_by"
        link: "default-variables-created-by"
      -
        title: "modified_at"
        link: "default-variables-modified-at"
      -
        title: "parsers"
        link: "default-variables-parsers"
      -
        title: "cache"
        link: "default-variables-cache"
      -
        title: "slug"
        link: "default-variables-slug"
      -
        title: "id"
        link: "default-variables-id"
      -
        title: "entries"
        link: "default-variables-entries"
      -
        title: "media"
        link: "default-variables-media"
      -
        title: "registry"
        link: "default-variables-registry"
  -
    title: "Custom Variables"
    link: "custom-variables"
  -
    title: "Methods"
    link: "methods"
    level2:
      -
        title: "fetch()"
        link: "methods-fetch"
      -
        title: "create()"
        link: "methods-create"
      -
        title: "update()"
        link: "methods-update"
      -
        title: "move()"
        link: "methods-move"
      -
        title: "copy()"
        link: "methods-copy"
      -
        title: "delete()"
        link: "methods-delete"
      -
        title: "has()"
        link: "methods-has"
      -
        title: "getFileLocation()"
        link: "methods-getFileLocation"
      -
        title: "getDirectoryLocation()"
        link: "methods-getDirectoryLocation"
  -
    title: Extending
    link: "extending"
---

Entries are the fundamental building-blocks of your project. We are using jekyll like entries format. It means that each entry in the Flextype should contains **Entry Front Matter** block in valid YAML format at the top of the file and **Entry Content** marked up using HTML + Markdown + Shortcodes and etc... at the bottom of the file.

Here is a simple entry example:

<div class="file-header"><i class="far fa-file-alt"></i> project/entries/movies/sg-1/season-5/episode-21/entry.md</div>

    ---
    title: Meridian
    description: As Jackson suffers from a fatal dose of radiation, he struggles with the value of his life while his friends deal with the emotional and diplomatic repercussions.
    director: William Waring
    writers: Brad Wright, Jonathan Glassner
    stars: Richard Dean Anderson, Michael Shanks, Amanda Tapping
    ---
    SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson suffering from what is likely a fatal dose of radiation. On the planet, they dealt with the country of Kelowna and their representative Jonas Quinn. That country was at the same stage of development as the United States in the 1940s and well on their way to creating an atomic weapon using Goa'uld technology found in an ancient temple. Daniel argued against the Kelownans developing such a weapon and is accused of attempting to sabotage the project. As members of the team sit by his deathbed, Daniel receives an unexpected offer from someone they once met off-world.

Between triple-dashed lines, you can set [predefined variables](#default-variables) or even create custom ones of your own.

### <a name="entries-and-urls-structure"></a> Entries and Urls structure in Flextype

All content entries are located in the `project/entries/` folder.

Each entry file `entry.md` should be placed in its own folder.

Folder names should also be valid **slugs**. Slugs are entirely lowercase, with accented characters replaced by letters from the Latin alphabet and whitespace characters replaced by a dash or an underscore, to avoid being encoded.

##### Examples

```
# Physical Location
project/entries/movies/sg-1/entry.md

# ID (URL)
movies/sg-1

# Slug
sg-1
```

```
# Physical Location
project/entries/movies/sg-1/season-5/entry.md

# ID (URL)
movies/sg-1/season-5

# Slug
season-5
```

```
# Physical Location
project/entries/movies/sg-1/season-5/episode-21/entry.md

# ID (URL)
movies/sg-1/season-5/episode-21

# Slug
episode-21
```

### <a name="default-variables"></a> Default Variables

There are a number of default entry variables available for each entry and defined in the Front Matter section.

##### <a name="default-variables-visibility"></a> Visibility

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>visibility</td>
                <td>visible</td>
                <td>visible or draft or hidden</td>
            </tr>
        </tbody>
    </table>
</div>

Content visibility is about controlling who can see your entries. Flextype allows you to control the visibility of your entries on an individual basis. By default, all entries are visible.

**Examples**

    ---
    title: My Entry Title
    visibility: draft
    ---
    My entry content here.

##### <a name="default-variables-routable"></a> Routable

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>routable</td>
                <td>true</td>
                <td>true or false</td>
            </tr>
        </tbody>
    </table>
</div>

By default, all entries are routable. This means that they can be reached by pointing your browser to the URL of the entry. However, you may need to create a specific entry to hold specific content, but it is meant to be called directly by a plugin, other content, or even a theme directly.

**Examples**

    ---
    title: Commment42
    routable: false
    ---
    Content for Commment42

##### <a name="default-variables-published-at"></a> Published at

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>published_at</td>
                <td></td>
                <td>Date & Time</td>
            </tr>
        </tbody>
    </table>
</div>

This variable allows you to specifically set a published_at date associated with this entry.

**Examples**

    ---
    title: My Entry Title
    published_at: '15-05-2020 06:57'
    ---
    My entry content here.

##### <a name="default-variables-published-by"></a> Published by

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>published_by</td>
                <td></td>
                <td>User UUID</td>
            </tr>
        </tbody>
    </table>
</div>

This variable allows you to specifically set a published_by User UUID associated with this entry.

**Examples**

    ---
    title: My Entry Title
    published_by: ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2
    ---
    My entry content here.

##### <a name="default-variables-created-at"></a> Created at

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>created_at</td>
                <td></td>
                <td>Date & Time</td>
            </tr>
        </tbody>
    </table>
</div>

This variable allows you to specifically set a created_at date associated with this entry.

##### <a name="default-variables-modified-at"></a> Modified at

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>modified_at</td>
                <td></td>
                <td>Date & Time</td>
            </tr>
        </tbody>
    </table>
</div>

This variable allows you to specifically set a modified_at date associated with this entry.

**Examples**

    ---
    title: My Entry Title
    modified_at: '15-05-2020 06:57'
    ---
    My entry content here.

##### <a name="default-variables-parsers"></a> Parsers

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>parsers</td>
                <td></td>
                <td>A list of parsers with options</td>
            </tr>
        </tbody>
    </table>
</div>

```yaml
parsers:
  markdown:
    enabled: true
    fields: ['content', 'title']
  shortcodes:
    enabled: true
    fields: ['content', 'title', 'description']
```

##### <a name="default-variables-cache"></a> Cache

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>cache</td>
                <td></td>
                <td>true or false</td>
            </tr>
        </tbody>
    </table>
</div>

By default, all entries are stored in the cache if flextype cache is true.
But this rule can be changed by setting individual cache for each entry.

##### <a name="default-variables-slug"></a> Slug

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>slug</td>
                <td></td>
                <td>Slug is entirely lowercase, with accented characters replaced by letters from the Latin alphabet and whitespace characters replaced by a dash or an underscore, to avoid being encoded.</td>
            </tr>
        </tbody>
    </table>
</div>

##### <a name="default-variables-id"></a> Id

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td></td>
                <td>Entry ID</td>
            </tr>
        </tbody>
    </table>
</div>

##### <a name="default-variables-entries"></a> Entries

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>entries</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

```yaml
entries:
  fetch:
    posts:
      id: blog
      options:
        collection: true
        find: []
        filter: []
    post:
      id: blog/post-1
      options:
        filter: []
    testimonials:
      id: testimonials
      options:
        method: fetchTestimonials
```

##### <a name="default-variables-media"></a> Media

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>media</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

```yaml
media:
  files:
    fetch:
      albums:
        id: albums
        options:
          collection: true
          filter: []
      foo:
        id: albums/album-1/foo.jpg
        options:
          filter: []
      other:
        id: other
        options:
          method: fetchFromOtherDB
  folders:
    fetch:
      albums:
        id: albums
        options:
          collection: true
          filter: []
      foo:
        id: albums/album-1/foo.jpg
        options:
          filter: []
      other:
        id: other
        options:
          method: fetchFromOtherDB
```

##### <a name="default-variables-registry"></a> Registry

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Available values for option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>registry</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

```yaml
registry:
  get:
    flextype:
      key: flextype.manifest.name
    author.name:
      key: flextype.manifest.author.name
    license:
      key: flextype.manifest.license
```

### <a name="custom-variables"></a> Custom Variables

You can create your own custom entry variables using any valid YAML syntax. These would be entry-specific variable and be available for Rest API and any extension such as plugin, theme and etc...

<div class="file-header"><i class="far fa-file-alt"></i> project/entries/home/entry.md</div>

    ---
    title: My Entry Title
    description: My entry description
    author:
      twitter: "@getflextype"
    ---
    My entry content here.

**Examples**

Get variable `author.twitter` with PHP.

```php
echo flextype('entries')->fetch('home')['author.twitter'];
```

Get variable `author.twitter` with Rest API.
```http
GET /api/entries?id=home&token=YOUR_ENTRIES_TOKEN
```

Get variable `author.twitter` with [TWIG Plugin](https://github.com/flextype-plugins/twig).

```twig
{{ entries.fetch('home').author.twitter }}
```

### <a name="methods"></a> Methods

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
                <td><a href="#methods-fetch">fetch()</a></td>
                <td>Fetch entry or entries collection.</td>
            </tr>
            <tr>
                <td><a href="#methods-create">create()</a></td>
                <td>Create entry</td>
            </tr>
            <tr>
                <td><a href="#methods-update">update()</a></td>
                <td>Update entry</td>
            </tr>
            <tr>
                <td><a href="#methods-move">move()</a></td>
                <td>Move entry</td>
            <tr>
                <td><a href="#methods-copy">copy()</a></td>
                <td>Copy entry</td>
            </tr>
            <tr>
                <td><a href="#methods-delete">delete()</a></td>
                <td>Delete entry</td>
            </tr>
            <tr>
                <td><a href="#methods-has">has()</a></td>
                <td>Check whether entry exists</td>
            </tr>
            <tr>
                <td><a href="#methods-getFileLocation">getFileLocation()</a></td>
                <td>Get entry file location</td>
            </tr>
            <tr>
                <td><a href="#methods-getDirectoryLocation">getDirectoryLocation()</a></td>
                <td>Get entry directory location</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-fetch"></a> `fetch()`

Fetch entry or entries collection.

```php
/**
 * Fetch.
 *
 * @param string $id      Unique identifier of the entry.
 * @param array  $options Options array.
 *
 * @access public
 *
 * @return self Returns instance of The Arrays class.
 */
public function fetch(string $id, array $options = []): Arrays
```

##### Fetch single entry

**Examples**

Fetch single entry `movies/sg-1/season-5/episode-21`

```php
$data = flextype('entries')->fetch('movies/sg-1/season-5/episode-21');
```

Fetch singe entry in `movies/sg-1/season-5/episode-21` and send `$options`.

```php
$data = flextype('entries')->fetch('movies/sg-1/season-5', $options);
```

`$options` is an array of valid values for [filter()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php) helper.

```php
$options = [
    'filter' => [
        // Return items.
        // Valid values: all, first, last, next, random, shuffle
        'return' => 'all',

        // Filters the array items by a given condition.
        // key - of the array or object to used for comparison.
        // operator - used for comparison.
        //    operators: in, nin, lt, <, lte,
        //         >, gt, gte, >=, contains, ncontains
        //         >=, <=, like, nlike, regexp, nregexp,
        //         eq, =, neq, !=, starts_with,
        //         ends_with, between, nbetween, older, newer
        // value - Value used for comparison.
        'where' => [
            [
                'key' => '',
                'operator' => '',
                'value' => '',
            ],
            [...],
            [...],
        ],

        // Group by key
        'group_by' => '',

        // Sort by key and direction.
        // Order direction: DESC (descending) or ASC (ascending)
        'sort_by' => [
            'key' => '',
            'direction' => 'ASC'
        ],

        // Extract a slice of the current array with specific offset.
        'offset' => 0,

        // Extract a slice of the current array with offset 0 and specific length.
        'limit' => 10,
    ],
];
```

##### Fetch entries collection

**Examples**

Fetch collections of entries episodes in `movies/sg-1/season-5`

```php
$data = flextype('entries')->fetch('movies/sg-1/season-5', $options);
```

Fetch collections of entries in `movies/sg-1` and send `$options`.

```php
$data = flextype('entries')->fetch('movies/sg-1/season-5', $options);
```

`$options` is an array of valid values for [find()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FindHelper.php) and [filter()](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php) helpers.

```php
$options = [
    'collection' => true,

    'find' => [
        // Restrict the depth of traversing
        // https://symfony.com/doc/current/components/finder.html#directory-depth
        'depth' => ['> 1', '< 5'],

        // Restrict by a date range
        // https://symfony.com/doc/current/components/finder.html#file-date
        'date' => ['>= 2018-01-01', '<= 2018-12-31'],

        // Restrict by a size range
        // https://symfony.com/doc/current/components/finder.html#file-size
        'size' => ['>= 1K', '<= 2K'],

        // Exclude directories from matching
        // https://symfony.com/doc/current/components/finder.html#location
        'exclude' => 'directory',

        // Find files by content
        // https://symfony.com/doc/current/components/finder.html#file-contents
        'contains' => '',

        // Find files by content excludes files containing given pattern
        // https://symfony.com/doc/current/components/finder.html#file-contents
        'not_contains' => '',

        // Filter results with your own strategy
        // https://symfony.com/doc/current/components/finder.html#custom-filtering
        'filter' => 'CALLBACK_FUNCTION',

        // Sort results by your own sorting algorithm
        // https://symfony.com/doc/current/components/finder.html#sorting-results
        'sort' => 'CALLBACK_FUNCTION',

        // Find files and directories by path
        // https://symfony.com/doc/current/components/finder.html#path
        'path' => 'data',

        // Sort the files and directories by the last accessed, changed or modified time
        // Values: atime, mtime, ctime
        // https://symfony.com/doc/current/components/finder.html#sorting-results
        'sort_by' => 'atime',
    ],

    'filter' => [
        // Return items.
        // Valid values: all, first, last, next, random, shuffle
        'return' => 'all',

        // Filters the array items by a given condition.
        // key - of the array or object to used for comparison.
        // operator - used for comparison.
        //    operators: in, nin, lt, <, lte,
        //         >, gt, gte, >=, contains, ncontains
        //         >=, <=, like, nlike, regexp, nregexp,
        //         eq, =, neq, !=, starts_with,
        //         ends_with, between, nbetween, older, newer
        // value - Value used for comparison.
        'where' => [
            [
                'key' => '',
                'operator' => '',
                'value' => '',
            ],
            [...],
            [...],
        ],

        // Group by key
        'group_by' => '',

        // Sort by key and direction.
        // Order direction: DESC (descending) or ASC (ascending)
        'sort_by' => [
            'key' => '',
            'direction' => 'ASC'
        ],

        // Extract a slice of the current array with specific offset.
        'offset' => 0,

        // Extract a slice of the current array with offset 0 and specific length.
        'limit' => 10,
    ],
];
```

##### <a name="methods-create"></a> `create()`

Create entry.

```php
/**
 * Create entry.
 *
 * @param string $id   Unique identifier of the entry.
 * @param array  $data Data to create for the entry.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function create(string $id, array $data = []): bool
```

**Examples**

Create new entry `episode-22` in `movies/sg-1/season-5`

```php
$data = [
                'title' => 'Revelations',
                'description' => 'While still dealing with the loss of Daniel Jackson the SGC is contacted by the Asgard who require assistance dealing with Anubis, who seems to have new shield technology that can repel Asgard weapons.',
                'director' => 'Martin Wood',
                'writers' => 'Brad Wright, Jonathan Glassner',
                'stars' => 'Richard Dean Anderson, Michael Shanks, Amanda Tapping',
                'content' => 'Osiris engages in space combat with Thor over a violation of the protected planets treaty. Freyr arrives at the SGC bringing news of Thor\'s death and asking SG-1 to mount a rescue mission to retrieve an Asgard scientist from the planet in question. Upon their arrival Heimdall informs them that Thor still lives and has been taken captive by the Goa\'uld. O\'Neill and Teal\'c transport over to the mothership to rescue him from the clutches of Anubis.'
        ];


flextype('entries')->create('movies/sg-1/season-5/episode-22', $data);
```

##### <a name="methods-update"></a> `update()`

Update entry.

```php
/**
 * Update entry
 *
 * @param string $id   Unique identifier of the entry.
 * @param array  $data Data to update for the entry.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function update(string $id, array $data): bool
```

**Examples**

Update entry `episode-22` in `movies/sg-1/season-5`

```php
$data = ['soundtracks' => 'Joel Goldsmith'];


flextype('entries')->update('movies/sg-1/season-5/episode-22', $data);
```

##### <a name="methods-move"></a> `move()`

Move entry.

```php
/**
 * Move entry
 *
 * @param string $id    Unique identifier of the entry.
 * @param string $newID New Unique identifier of the entry.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function move(string $id, string $newID): bool
```

**Examples**

Move entry `episode-22` to `episode-23` in `movies/sg-1/season-5`

```php
flextype('entries')->move('movies/sg-1/season-5/episode-22',
                          'movies/sg-1/season-5/episode-23');
```

##### <a name="methods-copy"></a> `copy()`

Copy entry.

```php
/**
 * Copy entry.
 *
 * @param string $id    Unique identifier of the entry.
 * @param string $newID New Unique identifier of the entry.
 *
 * @return bool|null True on success, false on failure.
 *
 * @access public
 */
public function copy(string $id, string $newID): ?bool
```

**Examples**

Copy entry `episode-23` to `episode-22` in `movies/sg-1/season-5`

```php
flextype('entries')->rename('movies/sg-1/season-5/episode-23',
                                       'movies/sg-1/season-5/episode-22');
```

##### <a name="methods-delete"></a> `delete()`

Delete entry.

```php
/**
 * Delete entry.
 *
 * @param string $id Unique identifier of the entry.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function delete(string $id): bool
```

**Examples**

Delete entry `episode-23` in `movies/sg-1/season-5`

```php
flextype('entries')->delete('movies/sg-1/season-5/episode-23');
```

##### <a name="methods-has"></a> `has()`

Check whether entry exists.

```php
/**
 * Check whether entry exists
 *
 * @param string $id Unique identifier of the entry(entries).
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function has(string $id): bool
```

**Examples**

Check whether entry `episode-23` exists in `movies/sg-1/season-5`

```php
if (flextype('entries')->has('movies/sg-1/season-5/episode-23')) {
    // do something...
}
```

##### <a name="methods-getFileLocation"></a> `getFileLocation()`

Get entry file location


```php
/**
 * Get entry file location
 *
 * @param string $id Unique identifier of the entry(entries).
 *
 * @return string entry file location
 *
 * @access public
 */
public function getFileLocation(string $id): string
```

**Examples**

Check whether entry `episode-23` exists in `movies/sg-1/season-5`

```php
$data = flextype('entries')->getFileLocation('movies/sg-1/season-5/episode-23');
```

##### <a name="methods-getDirectoryLocation"></a> `getDirectoryLocation()`

Get entry directory location

```php
/**
 * Get entry directory location
 *
 * @param string $id Unique identifier of the entry(entries).
 *
 * @return string entry directory location
 *
 * @access public
 */
public function getDirectoryLocation(string $id): string
```

**Examples**

Get entry `episode-23` exists in `movies/sg-1/season-5`

```php
$data = flextype('entries')->getDirectoryLocation('movies/sg-1/season-5/episode-23');
```

### <a name="extending"></a> Extending

Entries are "macroable", which allows you to add additional methods to the Entries API at run time.

For example, the following code adds a `fetchRecentPosts()` method to the Entries API.

**Examples**

```php
// Create new macros for fetch recent posts.
flextype('entries')::macro('fetchRecentPosts', function($limit = 10) {
    return flextype('entries')
                ->fetchCollection('blog')
                ->sortBy('publised_at')
                ->limit($limit);
});

// Display recent posts.
foreach (flextype('entries')->fetchRecentPosts(5) as $post) {
    echo $post['title'] . "\n";
}
```

As you can see, the macro method takes as arguments a name and an [anonymous function](https://php.net/manual/functions.anonymous.php) to call (optionally, you able to add additional arguments, if you need that).

When you call a macro, your code in function would be called from the context of that class (in the example it is Entries API class context), allowing you to execute your code along with Flextype built-in features.

#### Using mixins

Macros awesome, and you may want to use a lot of them. You may group them with help of mixins.
For this approach, you should use a mixin static method on the macroable Entries API class, and pass your mixin class as an argument.

**Examples**


```php
// Blog Mixin Class.
class BlogMixin {
    public function fetchRecentPosts() {
        return function($limit = 10) {
            return flextype('entries')
                        ->fetchCollection('blog')
                        ->sortBy('publised_at')
                        ->limit($limit);
        }
    }
}

// Create new mixin BlogMixin with it is macros.
flextype('entries')::mixin(new BlogMixin());

// Display recent posts.
foreach (flextype('entries')->fetchRecentPosts(5) as $post) {
    echo $post['title'] . "\n";
}
```
