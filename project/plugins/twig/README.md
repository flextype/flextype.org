<h1 align="center">Twig Plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/twig/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/twig.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/twig"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/twig"><img src="https://img.shields.io/github/downloads/flextype-plugins/twig/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype-plugins/twig"><img src="https://img.shields.io/badge/Flextype-0.9.12-green.svg?color=black" alt="Flextype"></a> <a href="https://flextype.org/en/discord"><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

Twig plugin to present Twig template engine for Flextype.

## Dependencies

The following dependencies need to be installed for Twig Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.12 | [download](https://github.com/flextype/flextype/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/twig`
3. Download Twig Plugin and unzip plugin content to the folder `/project/plugins/twig`

## Documentation

### Twig Filters & Functions

Twig already provides an extensive list of [filters, functions, and tags](https://twig.symfony.com/doc/2.x/), Flextype also provides a selection of useful additions to make the process of theming easier.

#### Flextype Twig Filters

Twig filters are applied to Twig variables by using the `|` character followed by the filter name. Parameters can be passed in just like Twig functions using parenthesis.

##### shortcode

Parse shortcode

Usage:

```twig
{{ '[b]Bold text[/b]'|shortcode }}
```

Result:

**Bold text**

##### markdown

Parse markdown

Usage: markdown

```twig
{{ '**Bold text**'|markdown }}
```

Result:

**Bold text**

##### tr

Translate text

Usage:
```twig
{{ 'site_powered_by_flextype'|tr }}
```

Result:

Build fast, flexible, easier to manage websites with
<a href="https://flextype.org">Flextype</a>.

Multiple filters can be chained. The output of one filter is applied to the next.

Usage:
```twig
{{ '[b]Bold text[/b] *Italic text*'|shortcode|markdown }}
```

Result:

**Bold text** *Italic text*

#### Flextype Twig Functions

Twig functions are called directly with any parameters being passed in via parenthesis.

##### yaml_decode

Decode valid yaml string into array

Usage:
```twig
{{ yaml_decode('title: Hello World!').title }}
```

Result:
```twig
Hello World!
```

##### yaml_encode

Encode array into valid yaml string

Usage:
```twig
{{ yaml_encode({'title': 'Hello World!'})}}
```

Result:
```yaml
title: 'Hello World!'
```

##### json_decode

Decode valid json string into array

Usage:
```twig
{{ json_decode('{"title": "Hello World!"}').title }}
```

Result:
```twig
Hello World!
```

##### json_encode

Encode array into valid json string

Usage:
```twig
{{ json_encode({'title': 'Hello World!'})}}
```

Result:
```json
{"title": "Hello World!"}
```

##### tr or __

Translate string

Usage:
```twig
{{ tr('site_powered_by_flextype') }}
{{ __('site_powered_by_flextype') }}
```

Result:

Build fast, flexible, easier to manage websites with
<a href="https://flextype.org">Flextype</a>.

##### filesystem_list_contents

List contents of a directory

Usage:

```twig
{% set media = filesystem_list_contents(PATH_UPLOADS ~ '/' ~ entry.id) %}
```

Result:

array (media)

##### filesystem_has

Check whether a file exists

Usage:
```twig
{% if (filesystem_has(PATH_PROJECT ~ '/uploads/' ~ entry.id ~ '/about.md')) %}
    Show something...
{% endif %}
```

##### filesystem_read

Read a file

Usage:
```twig
{{ filesystem_read(PATH_PROJECT ~ '/uploads/' ~ entry.id ~ '/about.md') }}
```

Result:

```
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
```

##### filesystem_ext

Get file extension

Usage:
```twig
{{ filesystem_ext(PATH_PROJECT ~ '/uploads/' ~ entry.id ~ '/about.md') }}
```

Result:

.md

##### filesystem_basename

Get filename

Usage:

```twig
{{ filesystem_basename(PATH_PROJECT ~ '/uploads/' ~ entry.id ~ '/about.md') }}
```

Result:

entry

##### path_for

Returns the URL for a given route.

Usage:
```twig
{{ path_for('profile') }}
```

##### base_url

Returns the Uri object's base URL.

Usage:
```twig
{{ base_url() }}
```

##### url

Returns the Uri object's App URL.

Usage:
```twig
{{ url() }}
```

##### is_current_path

Returns true is the provided route name and parameters are valid for the current path.
```twig
{% if is_current_path('profile') %}
    Show profile page
{% endif %}
```

##### current_path

Renders the current path, with or without the query string.
```twig
{{ current_path() }}
```

### Twig Variables

When you are working with twig templates, for e.g. when you designing a theme, Twig Plugin gives you access to all sorts of objects and variables available in Flextype within your Twig templates. The Twig templating framework provides powerful ways to read and manipulate these objects and variables.

#### Core Objects

There are several **core objects** that are available to a Twig template, and each object has a set of **variables** and **functions**.

#### registry

Registry stored all flextype, themes and plugins settings.<br>
You can access Flextype registry via the registry object.

Usage:

```twig
{{ registry.flextype.theme }} {# returns the currently configured theme #}
```

##### entry

Because Flextype is built using the structure defined in the `/project/entries/` folder, each entry is represented by a entry object.

The entry object is probably the most important object you will work with as it contains all the information about the current page you are currently on.

Usage:

```twig
{{ entry.title }} {# returns the current entry title #}
```

##### entries

Fetch single entry

Usage:

```twig
{% set about_entry = entries.fetchSingle('about') %}
```

Fetch collection of entries

Usage:

```twig
{% set posts = entries.fetchSingle('blog', {}) %}
or
{% set posts = entries.fetchCollection('blog') %}
```

##### emitter

Emitting events

Usage:
```twig
{% do emitter.emit('onThemeHeader') %}
```

Emitting events in batches

Usage:

```twig
{% do emitter.emitBatch({'onThemeHeader', 'onSomeOtherEvent'}) %}
```

##### arr

Contains methods that can be useful when working with arrays.

Sorts a multi-dimensional array by a certain column

Usage:

```twig
{% set new_array = arr.sort(old.array, 'title') %}
```

Sets an array value using "dot notation".

Usage:

```twig
{% set entry = arr.set(entry, 'title', 'New Title') %}
```

Return value from array using "dot notation".
If the key does not exist in the array, the default value will be returned instead.

Usage:

```twig
{{ arr.get(entry, 'title') }}
```

Delete an array value using "dot notation".

Usage:

```twig
{% set entry = arr.delete(entry, 'title') %}
```

Checks if the given dot-notated key exists in the array.

Usage:

```twig
{% if arr.keyExists(entry, 'title') %}
    Do something...
{% endif %}
```

Returns a random value from an array.

Usage:

```twig
{{ arr.random(['php', 'js', 'css', 'html']) }}
```

Returns TRUE if the array is associative and FALSE if not.

Usage:

```twig
{% if arr.isAssoc(entry) %}
    Do something...
{% endif %}
```

Returns TRUE if the array is associative and FALSE if not.

Usage:

```twig
{% set array1 = {'name': 'john', 'mood': 'happy', 'food': 'bacon'} %}
{% set array2 = {'name': 'jack', 'food': 'tacos', 'drink': 'beer'} %}
{% set array3 = arr.overwrite(array1, array2) %}
```

Converts an array to a JSON string

Usage:

```twig
{{ arr.json(entry) }}
```

Returns the first element of an array

Usage:

```twig
{{ arr.first(entry) }}
```

Returns the last element of an array

Usage:

```twig
{{ arr.last(entry) }}
```

Converts an array to a JSON string

Usage:

```twig
{{ arr.toJson(entry) }}
```

Create an new Array from JSON string.

Usage:

```twig
{% set array = arr.createFromJson($string) %}
```

Create an new Array object via string.

Usage:

```twig
{% set array = arr.createFromString('cat, dog, bird', ',') %}
```

Counts all elements in an array.

Usage:

```twig
{{ arr.size(array) }}
```

Return an array with elements in reverse order.

Usage:

```twig
{% set new_array = arr.reverse(old_array) %}
```

#### Global Variables

```twig
{{ PATH_PROJECT }} {# Returns the path to the project directory (without trailing slash). #}
{{ PATH_LOGS }} {# Returns the path to the logs directory (without trailing slash). #}
{{ PATH_CONFIG }} {# Returns the path to the default config directory (without trailing slash). #}
{{ PATH_CACHE }} {# Returns the path to the cache directory (without trailing slash). #}
{{ PHP_VERSION }} {# Returns the php version #}
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/twig/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
