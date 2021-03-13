---
title: FRONTMATTER
description: Any file that contains a YAML front matter block will be processed by Flextype as a special file. The front matter must be the first thing in the file and must take the form of valid YAML set between triple-dashed lines. Between these triple-dashed lines, you can set predefined variables or even create custom ones of your own.
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
    title: "Methods"
    link: "methods"
    level2:
      -
        title: "encode()"
        link: "methods-encode"
      -
        title: "decode()"
        link: "methods-decode"
---

Any file that contains a YAML front matter block will be processed by Flextype as a special file. The front matter must be the first thing in the file and must take the form of valid YAML set between triple-dashed lines. Between these triple-dashed lines, you can set predefined variables or even create custom ones of your own.

### <a name="methods"></a> Methods

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
            <td>Returns the FRONTMATTER representation of a value.</td>
        </tr>
        <tr>
            <td><a href="#methods-decode">decode()</a></td>
            <td>Takes a FRONTMATTER encoded string and converts it into a PHP variable.</td>
        </tr>
    </tbody>
</table>

### Methods Details

##### <a name="methods-encode"></a> `encode()`

Returns the FRONTMATTER representation of a value.

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

$data = flextype('serializers')->frontmatter()->encode($data);

```

##### <a name="methods-decode"></a> `decode()`

Takes a FRONTMATTER encoded string and converts it into a PHP variable.

**Examples**

```php
$frontmatter = "
    ---
    title: Meridian
    description: As Jackson suffers from a fatal dose of radiation, he struggles with the value of his life while his friends deal with the emotional and diplomatic repercussions.
    director: William Waring
    writers: Brad Wright, Jonathan Glassner
    stars: Richard Dean Anderson, Michael Shanks, Amanda Tapping
    ---
    SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson suffering from what is likely a fatal dose of radiation. On the planet, they dealt with the country of Kelowna and their representative Jonas Quinn. That country was at the same stage of development as the United States in the 1940s and well on their way to creating an atomic weapon using Goa'uld technology found in an ancient temple. Daniel argued against the Kelownans developing such a weapon and is accused of attempting to sabotage the project. As members of the team sit by his deathbed, Daniel receives an unexpected offer from someone they once met off-world."

$data = flextype('serializers')->frontmatter()->decode($frontmatter);

```
