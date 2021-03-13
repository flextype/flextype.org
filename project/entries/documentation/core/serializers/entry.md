---
title: Serializers
template: docs
breadcrumbs:
  1:
    title: "Core Concepts"
    link: "[url]/documentation/core/"
---

### YAML

YAML (YAML Ain't Markup) is a human friendly data serialization language.

Flextype uses YAML because it's as close to plain English as data serialization and configuration formats get. It has no curly braces, it allows you to omit quotation marks for strings in most cases, and it relies on indentation for structure, which makes it incredibly readable compared to other languages, such as JSON and XML.

YAML is used extensively in Flextype for its configuration files, fieldsets, and also in entries settings.

For more details <a href="[url]/documentation/core/serializers/yaml">read the guide for the YAML</a>.

### JSON

JSON (JavaScript Object Notation) is most widely used data format for data interchange on the web. This data interchange can happen between two computers applications at different geographical locations or running within same hardware machine.

The good thing is that JSON is a human and machine readable format. So while applications/libraries can parse the JSON data – humans can also look at data and derive meaning from it.

A JSON document may contains text, curly braces, square brackets, colons, commas, double quotes, and maybe a few other characters.

For more details <a href="[url]/documentation/core/serializers/json">read the guide for the JSON</a>.

### FRONTMATTER

Any file that contains a YAML front matter block will be processed by Flextype as a special file. The front matter must be the first thing in the file and must take the form of valid YAML set between triple-dashed lines. Between these triple-dashed lines, you can set predefined variables or even create custom ones of your own.

For more details <a href="[url]/documentation/core/serializers/frontmatter">read the guide for the FRONTMATTER</a>.
