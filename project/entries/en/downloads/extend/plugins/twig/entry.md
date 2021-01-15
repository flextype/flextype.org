---
title: Twig
description: Twig plugin to present Twig template engine for Flextype.
icon:
  name: palette
  set: fontawesome|solid
category: templating
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/twig
documentation: https://github.com/flextype-plugins/twig
template: plugin
---

* [Dependencies](#dependencies)
* [Installation](#installation)
* [Global Variables](#global-variables)
* [Functions](#functions)
* [Filters](#filters)
* [License](#license)

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/twig`
3. Download Twig Plugin and unzip plugin content to the folder `/project/plugins/twig`

#### Introduction

Twig is a modern template engine for PHP.

* **Fast**: Twig compiles templates down to plain optimized PHP code. The overhead compared to regular PHP code was reduced to the very minimum.
* **Secure**: Twig has a sandbox mode to evaluate untrusted template code. This allows Twig to be used as a template language for applications where users may modify the template design.
* **Flexible**: Twig is powered by a flexible lexer and parser. This allows the developer to define its own custom tags and filters, and create its own DSL.

Twig templates are HTML files that are sprinkled with bits of Twig code. When Twig loads a template, the first thing it will do is separate the raw HTML code from the Twig code. The raw HTML code will be output to the browser without any tampering.

All Twig code follows a basic pattern that separates it from the surrounding HTML. At its outer edges you will find left and right curly braces {{ and }}, coupled with another character that signifies what type of Twig code it is. These sets of characters are called “delimiters”.

There are three types of delimiters that Twig looks out for:

`{#` – [Comments](#comments)  
`{%` – [Tags](#tags)  
`{{` – [Print statements](#print-statements)  

#### <a name="comments"></a> Comments

Twig comments are wrapped in {# and #} delimiters. You can use them to leave little notes for yourself in the code.

They are similar to HTML comments in that they won’t show up as rendered text in the browser. The difference is that they will never make it into the HTML source in the first place.

```
<!-- This will be visible in the HTML source -->
{# This won’t! #}
```

#### <a name="tags"></a> Tags

Twig tags are wrapped in {% and %} delimiters, and are used to define the logic of your template, such as conditionals, loops, variable definitions, template includes, and other things.

The syntax within the {% and %} delimiters varies from tag to tag, but they will always start with the same thing: the name of the tag.

#### <a name="print-statements"></a> Print Statements

To output additional HTML code dynamically, use a print statement. They are wrapped in {{ and }} delimiters, and you can put just about anything inside them, as long as it can be treated as a string.

```
<p>Hi, {{ entry.title }}</p>
```

Don’t place a print statement (or any other Twig code) within another print statement. [See Combining Strings to learn how to combine strings with other expressions](#combining-strings).

#### <a name="auto-escaping"></a> Auto-escaping

Most of the time, print statements will automatically HTML-encode the content before actually outputting it (called auto-escaping), which helps defend against cross-site scripting (XSS) vulnerabilities.

For example, let’s say you have a search results page, where the search query is defined by a q query string parameter, and in the event that there are no results, you want to output a message to the user that includes the query:

```
{% set query = request.getQueryParam().q %}

{% set entries = flextype.entries.fetch('blog', {'collection': true})
                                 .where('title', 'contains', query)
                                 .all() %}

{% if entries %}
  <h3>Search Results</h3>
  <ul>
    {% for entry in entries %}
      <li>{{ entry.id }}</li>
    {% endfor %}
  </ul>
{% else %}
  <p>Sorry, no results for <strong>{{ query }}</strong> were found.</p>
{% endif %}
```

There are two cases where print statements will output content directly, without auto-escaping it first:

* When the content is deemed safe by the last tag or function that was called within the print statement (such as the markdown filter).
* When you explicitly mark the content as safe using a raw filter.

#### <a name="manual-escaping"></a> Manual escaping

There are times where you may need to work with both trusted and untrusted content together. For example, let’s say you want to output user-supplied content as Markdown, but you want to ensure they haven’t put anything nefarious in there first.

To do that, you could explicitly encode all HTML within the user-supplied content using the escape (opens new window) filter, before passing it to the markdown filter:

```
{# Escape any HTML in the Content field, then format as Markdown #}
{{ entry.content|escape|markdown }}
```

#### <a name="resources"></a> Resources

* [Official Twig Documentation](https://twig.sensiolabs.org/documentation)
* [Twig for Template Designers](https://twig.sensiolabs.org/doc/templates.html)
* [Twig for Developers](https://twig.sensiolabs.org/doc/api.html)
* [6 Minute Video Introduction to Twig](https://www.dev-metal.com/6min-video-introduction-twig-php-templating-engine/)
* [Introduction to Twig](https://www.slideshare.net/markstory/introduction-to-twig)

#### <a name="global-variables"></a> Global Variables

The following Flextype Twig Global variables are available in Flextype Twig Templates:

| Variable | Description |
|---|---|
| _self | The current template name. |
| _context | The currently-defined variables. |
| _charset | The current charset. |
| PATH_PROJECT | Project path (without trailing slash). |
| PHP_VERSION | PHP Version. |
| flextype | Returns Flextype object. |

#### PATH_PROJECT

Project path (without trailing slash).

```
{{ PATH_PROJECT }}
```

#### PHP_VERSION

PHP Version.

```
{{ PHP_VERSION }}
```

#### flextype

Returns Flextype object, which provides access points to various helper functions and objects for templates.

| Objects | Available Methods |
|---|---|
| `flextype.entries` | [fetch()](https://docs.flextype.org/en/core/entries#methods-fetch)
| `flextype.media.files` | [fetch()](https://docs.flextype.org/en/core/media#methods-files-fetch) [has()](https://docs.flextype.org/en/core/media#methods-files-has) |
| `flextype.media.files.meta` | [getFileMetaLocation()](https://docs.flextype.org/en/core/media#methods-files-meta-getFileMetaLocation) |
| `flextype.media.folders` | [fetch()](https://docs.flextype.org/en/core/media#methods-folders-fetch) [getDirectoryLocation()](https://docs.flextype.org/en/core/media#methods-folders-getDirLocation) |
| `flextype.media.folders.meta` | [getDirMetaLocation()](https://docs.flextype.org/en/core/media#methods-folders-meta-getDirMetaLocation) |
| `flextype.registry` | [all methods available](https://docs.flextype.org/en/core/registry) |
| `flextype.parsers` | [all methods available](https://docs.flextype.org/en/core/parsers) |
| `flextype.serializers` | [all methods available](https://docs.flextype.org/en/core/serializers) |
| `flextype.cache` | [all methods available](https://www.phpfastcache.com) |
| `flextype.emitter` | [all methods available](https://event.thephpleague.com/2.0/) |

#### <a name="functions"></a> Functions

The following Flextype Twig Functions are available in Flextype Twig Templates:

| Variable | Description |
|---|---|
| arrays | Returns a new arrays object from the given elements. |
| strings | Returns a new strings object from the given string. |
| filesystem | Returns a new filesystem object from the given string. |
| url | Returns application URL. |

#### <a name="filters"></a> Filters

The following Flextype Twig Filters are available in Flextype Twig Templates:

| Variable | Description |
|---|---|
| __ | Translate string |
| shortcode | Shortcode parser |
| markdown | Markdown parser |
