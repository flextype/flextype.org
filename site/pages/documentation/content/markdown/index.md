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

##Emphasis

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

##Blockquotes

```
Coffee. The finest organic suspension ever devised… I beat the Borg with it. - Captain Janeway
```
Renders to:  
> Coffee. The finest organic suspension ever devised… I beat the Borg with it. - Captain Janeway

##Lists

###Unordered

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


##Tables

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


##Links

```
[Flextype site](http://Flextype.org)
```

Renders to:  

[Flextype site](http://Flextype.org)


##Images


```
![Flextype Logo](http://Flextype.org/public/assets/img/Flextype-logo.png)
```

Renders to:  

![Flextype Logo](http://Flextype.org/public/assets/img/Flextype-logo.png)  


```
![Flextype Logo](http://Flextype.org/public/assets/img/Flextype-logo.png){.img-responsive}
```

Renders to:

![Flextype Logo](http://Flextype.org/public/assets/img/Flextype-logo.png){.img-responsive}  
