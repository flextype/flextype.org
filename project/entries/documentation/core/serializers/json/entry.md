---
title: JSON
description: Flextype uses YAML because it's as close to plain English as data serialization and configuration formats get. It has no curly braces, it allows you to omit quotation marks for strings in most cases, and it relies on indentation for structure, which makes it incredibly readable compared to other languages, such as JSON and XML.
template: docs 
breadcrumbs:
  -
    title: "Core Concepts"
    link: "[url]/documentation/core/"
  -
    title: "Serializers"
    link: "[url]/documentation/core/serializers/"
on_this_page:
  -
    title: "JSON Syntax"
    link: "json-syntax"
  -
    title: "JSON Data Types"
    link: "json-data-types"
  -
    title: "Methods"
    link: "methods"
---

JSON (JavaScript Object Notation) is most widely used data format for data interchange on the web. This data interchange can happen between two computers applications at different geographical locations or running within same hardware machine.

The good thing is that JSON is a human and machine readable format. So while applications/libraries can parse the JSON data – humans can also look at data and derive meaning from it.

A JSON document may contains text, curly braces, square brackets, colons, commas, double quotes, and maybe a few other characters.

Primarily, JSON is built on two structures:

* A collection of name/value pairs. In various languages, this is realized as an object, record, struct, dictionary, hash table, keyed list, or associative array.
* An ordered list of values. In most languages, this is realized as an array, vector, list, or sequence.

We are using JSON sytnax in our [Rest APIs]([url]/documentation/rest-api).

### <a name="json-syntax"></a> JSON Syntax

A JSON document may contain information separated by following separators/token.

* `:` to separate name from value
* `,` to separate name-value pairs
* `{` and `}` for objects
* `[` and `]` for arrays

### JSON name-value pairs example

Name-value pairs have a colon between them as in **name** : **value**.

JSON names are on the left side of the colon. They need to be wrapped in double quotation marks, as in **name**, and can be any valid string. Within each object, keys need to be unique.

JSON values are found to the right of the colon. At the granular level, these need to be one of 6 simple data types:

* strings
* numbers
* objects
* arrays
* booleans
* null or empty

Each name-value pair is separated by a comma, so the JSON looks like this:

```
"name" : "value", "name" : "value", "name": "value"
```

```
{
  "color" : "Purple",
  "id" : "210"
}
```

### JSON object example

A JSON object is a key-value data format that is typically rendered in curly braces. A JSON object looks something like this:

```
{
  "color" : "Purple",
  "id" : "210",
  "composition" : {
    "R" : 70,
    "G" : 39,
    "B" : 89
  }
}
```

### JSON array example

Data can also be nested within the JSON by using JavaScript arrays that are passed as a value using square brackets [ ] on either end of its array type.

JSON arrays are ordered collections and can contain values of differing data types.

```
{
    "colors" :
    [
        {
          "color" : "Purple",
          "id" : "210"
        },
        {
          "color" : "Blue",
          "id" : "211"
        },
        {
          "color" : "Black",
          "id" : "212"
        }
    ]
}
```

### <a name="json-data-types"></a> JSON Data Types

JSON consist of 6 data types. First four data types (string, number, boolean and null) can be referred as simple data types. Other two data types (object and array) can be referred as complex data types.

* string
* number
* boolean
* null/empty
* object
* array

<div class="table">
    <table>
        <tr>
            <td><b>Data Type</b></td>
            <td><b>Description</b></td>
        </tr>
        <tr>
            <td>string</td>
            <td>
            Strings in JSON must be written in double quotes. <br><br>
    <pre><code class="hljs">{
      "color" : "Purple"
    }
    </pre>
            </td>
        </tr>
        <tr>
            <td>number</td>
            <td>
            Numbers in JSON must be an integer or a floating point. <br><br>
    <pre><code class="hljs">{
      "number_1": 210,
      "number_2": -210,
      "number_3": 21.05,
      "number_4": 1.0E+2
    }
    </pre>
            </td>
        </tr>
        <tr>
            <td>boolean</td>
            <td>
            Value can be either true or false. <br><br>
    <pre><code class="hljs">{
      "visibility": true
    }
    </pre>
            </td>
        </tr>
        <tr>
            <td>null</td>
            <td>
            Values in JSON can be null. <br><br>
    <pre><code class="hljs">{
       "middlename": null
    }
    </pre>
            </td>
        </tr>
        <tr>
            <td>object</td>
            <td>
            Values in JSON can be objects. <br><br>
    <pre><code class="hljs">"employee": {
      "name": "John",
      "age": 30,
      "city": "New York"
    }
    </pre>
            </td>
        </tr>
        <tr>
            <td>array</td>
            <td>
            Values in JSON can be arrays. <br><br>
    <pre><code class="hljs">{
      "employees": [ "John", "Anna", "Peter" ]
    }
    </pre>
            </td>
        </tr>
    </table>
</div>

### <a name="methods"></a> Methods

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-encode">encode()</a></td>
                <td>Returns the JSON representation of a value.</td>
            </tr>
            <tr>
                <td><a href="#methods-decode">decode()</a></td>
                <td>Takes a JSON encoded string and converts it into a PHP variable.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="encode"></a> `encode()`

Returns the JSON representation of a value

**Examples**

```php
$data = [
                'title' => 'Revelations',
                'description' => 'While still dealing with the loss of Daniel Jackson the SGC is contacted by the Asgard who require assistance dealing with Anubis, who seems to have new shield technology that can repel Asgard weapons.',
                'director' => 'Martin Wood',
                'writers' => 'Brad Wright, Jonathan Glassner',
                'stars' => 'Richard Dean Anderson, Michael Shanks, Amanda Tapping',
                'content' => 'Osiris engages in space combat with Thor over a violation of the protected planets treaty. Freyr arrives at the SGC bringing news of Thor\'s death and asking SG-1 to mount a rescue mission to retrieve an Asgard scientist from the planet in question. Upon their arrival Heimdall informs them that Thor still lives and has been taken captive by the Goa\'uld. O\'Neill and Teal\'c transport over to the mothership to rescue him from the clutches of Anubis.'
        ];

$data = flextype('serializers')->json()->encode($data);

```

##### <a name="decode"></a> `decode()`

Takes a JSON encoded string and converts it into a PHP variable.

**Examples**

```php
$json = '{
  "title": "Meridian",
  "description": "As Jackson suffers from a fatal dose of radiation, he struggles with the value of his life while his friends deal with the emotional and diplomatic repercussions.",
  "director": "William Waring",
  "writers": "Brad Wright, Jonathan Glassner",
  "stars": "Richard Dean Anderson, Michael Shanks, Amanda Tapping",
  "content": "SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson suffering from what is likely a fatal dose of radiation. On the planet, they dealt with the country of Kelowna and their representative Jonas Quinn. That country was at the same stage of development as the United States in the 1940s and well on their way to creating an atomic weapon using Goa\'uld technology found in an ancient temple. Daniel argued against the Kelownans developing such a weapon and is accused of attempting to sabotage the project. As members of the team sit by his deathbed, Daniel receives an unexpected offer from someone they once met off-world."}'

$data = flextype('serializers')->json()->decode($json);

```
