---
title: Markdown
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

Markdown is a way to style text on the web. You control the display of the document; formatting words as bold or italic, adding images. etc... with specific symbols like ```#``` or ```*```  

Markdown benefits:  

- Human readable and easy to learn.  
- Produces valid XHTML output.  
- Platform independent. Use any text editor or Markdown application you like.  
- Markdown best choice for flat file CMS  

##Headings

Headings from ```h1``` through ```h6``` are constructed with a ```#``` for each level:  

```
# h1 Heading
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading
```

Renders to:  
# h1 Heading
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading

HTML:  
```  
<h1>h1 Heading</h1>
<h2>h2 Heading</h2>
<h3>h3 Heading</h3>
<h4>h4 Heading</h4>
<h5>h5 Heading</h5>
<h6>h6 Heading</h6>
```  


## Comments
Comments should be HTML compatible
```  
<!--
This is a comment
-->
```
Comment below should NOT be seen.


## Inline HTML
If you need a certain HTML tags you can simply use HTML  
```  
Paragraph in Markdown.  

<p class="class">Some text here</p>  

Paragraph in Markdown.  
```

Renders to:   

Paragraph in Markdown.  

<p class="class">Some text here</p>  

Paragraph in Markdown.  

HTML:  
```  
<p>Paragraph in Markdown.</p>  
<p class="class">Some text here</p>  
<p>Paragraph in Markdown.</p>  
```


## Emphasis

```
*This text will be italic*
_This will also be italic_

**This text will be bold**
__This will also be bold__

_You **can** combine them_

~~Strike through this text.~~
```

Renders to:  

*This text will be italic*  
_This will also be italic_  
**This text will be bold**  
__This will also be bold__  
_You **can** combine them_     
~~Strike through this text.~~  

HTML:  
```  
<em>This text will be italic</em>
<em>This will also be italic</em>
<strong>This text will be bold</strong>
<strong>This will also be bold</strong>
<em>You <strong>can</strong> combine them</em>
<del>Strike through this text.</del>
```

## Blockquotes

```
> Coffee. The finest organic suspension ever devised… I beat the Borg with it. - Captain Janeway
```
Renders to:  

> Coffee. The finest organic suspension ever devised… I beat the Borg with it. - Captain Janeway

HTML:  
```  
<blockquote>
    <p>Coffee. The finest organic suspension ever devised… I beat the Borg with it. - Captain Janeway</p>
</blockquote>
```

## Lists

### Unordered

```
+ Lorem ipsum dolor sit amet
+ Consectetur adipiscing elit
+ Integer molestie lorem at massa
+ Facilisis in pretium nisl aliquet
+ Nulla volutpat aliquam velit
  - Phasellus iaculis neque
  - Purus sodales ultricies
  - Vestibulum laoreet porttitor sem
  - Ac tristique libero volutpat at
+ Faucibus porta lacus fringilla vel
+ Aenean sit amet erat nunc
+ Eget porttitor lorem
```

Renders to:  
+ Lorem ipsum dolor sit amet  
+ Consectetur adipiscing elit  
+ Integer molestie lorem at massa  
+ Facilisis in pretium nisl aliquet  
+ Nulla volutpat aliquam velit  
  - Phasellus iaculis neque  
  - Purus sodales ultricies  
  - Vestibulum laoreet porttitor sem  
  - Ac tristique libero volutpat at    
+ Faucibus porta lacus fringilla vel  
+ Aenean sit amet erat nunc  
+ Eget porttitor lorem  

HTML:  
```  
<ul>
    <li>Lorem ipsum dolor sit amet</li>
    <li>Consectetur adipiscing elit</li>
    <li>Integer molestie lorem at massa</li>
    <li>Facilisis in pretium nisl aliquet</li>
    <li>Nulla volutpat aliquam velit  
        <ul>
            <li>Phasellus iaculis neque</li>
            <li>Purus sodales ultricies</li>
            <li>Vestibulum laoreet porttitor sem</li>
            <li>Ac tristique libero volutpat at</li>
        </ul>
    </li>
    <li>Faucibus porta lacus fringilla vel</li>
    <li>Aenean sit amet erat nunc</li>
    <li>Eget porttitor lorem</li>
</ul>
```  

###Ordered

```
1. Lorem ipsum dolor sit amet
2. Consectetur adipiscing elit
3. Integer molestie lorem at massa
4. Facilisis in pretium nisl aliquet
5. Nulla volutpat aliquam velit
6. Faucibus porta lacus fringilla vel
7. Aenean sit amet erat nunc
8. Eget porttitor lorem
```

Renders to:  
1. Lorem ipsum dolor sit amet  
2. Consectetur adipiscing elit  
3. Integer molestie lorem at massa  
4. Facilisis in pretium nisl aliquet  
5. Nulla volutpat aliquam velit  
6. Faucibus porta lacus fringilla vel  
7. Aenean sit amet erat nunc  
8. Eget porttitor lorem  

HTML:  
```  
<ol>
    <li>Lorem ipsum dolor sit amet</li>
    <li>Consectetur adipiscing elit</li>
    <li>Integer molestie lorem at massa</li>
    <li>Facilisis in pretium nisl aliquet</li>
    <li>Nulla volutpat aliquam velit</li>
    <li>Faucibus porta lacus fringilla vel</li>
    <li>Aenean sit amet erat nunc</li>
    <li>Eget porttitor lorem</li>
</ol>
```

## Tables

```
| Option | Description |
| ------ | ----------- |
| data   | path to data files to supply the data that will be passed into templates. |
| engine | engine to be used for processing templates. Handlebars is the default. |
| ext    | extension to be used for dest files. |
```

Renders to:   

| Option | Description |  
| ------ | ----------- |  
| data   | path to data files to supply the data that will be passed into templates. |  
| engine | engine to be used for processing templates. Handlebars is the default. |   
| ext    | extension to be used for dest files. |
<br>
HTML:  
```  
<table>
    <thead>
        <tr>
            <th>Option</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>data</td>
            <td>path to data files to supply the data that will be passed into templates.</td>
        </tr>
        <tr>
            <td>engine</td>
            <td>engine to be used for processing templates. Handlebars is the default.</td>
        </tr>
        <tr>
            <td>ext</td>
            <td>extension to be used for dest files.</td>
        </tr>
    </tbody>
</table>
```

## Links

```
[Flextype site](http://Flextype.org)
```

Renders to:  

[Flextype site](http://Flextype.org)

HTML:  
```  
<a href="http://Flextype.org">Flextype site</a>
```

## Images

```
![filmtocat](https://octodex.github.com/images/filmtocat.png)
```

Renders to:  

![filmtocat](https://octodex.github.com/images/filmtocat.png)

HTML:  
```  
<img src="https://octodex.github.com/images/filmtocat.png" alt="filmtocat" />
```

```
![filmtocat](https://octodex.github.com/images/filmtocat.png){.img-responsive}
```

Renders to:

![filmtocat](https://octodex.github.com/images/filmtocat.png){.img-responsive}

HTML:  
```  
<img src="https://octodex.github.com/images/filmtocat.png" alt="filmtocat" class="img-responsive" />
```
