---
title: Blueprints
description: Blueprints plugin to build truly customizable user interface and basic logic for data management, like handling user forms.
icon:
  name: check-circle
  set: fontawesome|solid
category: forms
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/blueprints
documentation: https://github.com/flextype-plugins/blueprints
template: plugin
---

* [Installation](#Installation)
* [Settings](#Settings)
* [Emitter](Emitter)
* [Blocks](#Blocks)
  - [Alert](#Alert)
  - [Anchor](#Anchor)
  - [Button](#Button)
  - [ButtonGroup](#ButtonGroup)
  - [Column](#Column)
  - [Container](#Container)
  - [Divider](#Divider)
  - [Form](#Form)
  - [Heading](#Heading)
  - [Html](#Html)
  - [Image](#Image)
  - [InputButton](#InputButton)
  - [InputEmail](#InputEmail)
  - [InputHidden](#InputHidden)
  - [InputNumber](#InputNumber)
  - [InputPassword](#InputPassword)
  - [InputReset](#InputReset)
  - [InputSelect](#InputSelect)
  - [InputSubmit](#InputSubmit)
  - [InputText](#InputText)
  - [InputTextarea](#InputTextarea)
  - [Markdown](#Markdown)
  - [Row](#Row)
  - [Row](#Tabs)
* [Handling](Handling)
  - [Methods](#methods)
    + [fetch](#fetch)
    + [move](#move)
    + [update](#update)
    + [create](#create)
    + [delete](#delete)
    + [has](#has)
    + [storage](#storage)
    + [render](#render)
    + [renderFromArray](#renderFromArray)
    + [getBlockName](#getBlockName)
    + [getBlockID](#getBlockID)
    + [form](#form)
    + [getFileLocation](#getFileLocation)
    + [getDirectoryLocation](#getDirectoryLocation)
    + [getCacheID](#getCacheID)
* [Extending](Extending)

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/blueprints`
3. Download Twig Plugin and unzip plugin content to the folder `/project/plugins/blueprints`

#### Settings

```yaml
# enabled: true or false to disable the plugin
enabled: true

# Blueprint plugin priority
priority: 40

# Place to load
assetsLoadOnAdmin: true
assetsLoadOnSite: false

# Blocks
blocks:
  Anchor:
    template: plugins/blueprints/blocks/blocks/Anchor/block.html
  Alert:
    template: plugins/blueprints/blocks/blocks/Alert/block.html 
  Button:
    template: plugins/blueprints/blocks/blocks/Button/block.html 
  ButtonGroup:
    template: plugins/blueprints/blocks/blocks/ButtonGroup/block.html 
  Divider:
    template: plugins/blueprints/blocks/blocks/Divider/block.html 
  Container:
    template: plugins/blueprints/blocks/blocks/Container/block.html 
  Row:
    template: plugins/blueprints/blocks/blocks/Row/block.html 
  Column:
    template: plugins/blueprints/blocks/blocks/Column/block.html 
  Tabs:
    template: plugins/blueprints/blocks/blocks/Tabs/block.html 
  Form:
    template: plugins/blueprints/blocks/blocks/Form/block.html 
  Heading:
    template: plugins/blueprints/blocks/blocks/Heading/block.html 
  Html:
    template: plugins/blueprints/blocks/blocks/Html/block.html 
  Markdown:
    template: plugins/blueprints/blocks/blocks/Markdown/block.html 
  Image:
    template: plugins/blueprints/blocks/blocks/Image/block.html 
  InputText:
    template: plugins/blueprints/blocks/blocks/InputText/block.html
  InputEmail:
    template: plugins/blueprints/blocks/blocks/InputEmail/block.html 
  InputPassword:
    template: plugins/blueprints/blocks/blocks/InputPassword/block.html 
  InputTextarea:
    template: plugins/blueprints/blocks/blocks/InputTextarea/block.html 
  InputHidden:
    template: plugins/blueprints/blocks/blocks/InputHidden/block.html 
  InputNumber:
    template: plugins/blueprints/blocks/blocks/InputNumber/block.html 
  InputTags:
    template: plugins/blueprints/blocks/blocks/InputTags/block.html     
  InputSelect:
    template: plugins/blueprints/blocks/blocks/InputSelect/block.html 
  InputReset:
    template: plugins/blueprints/blocks/blocks/InputReset/block.html 
  InputButton:
    template: plugins/blueprints/blocks/blocks/InputButton/block.html  
  InputSubmit:
    template: plugins/blueprints/blocks/blocks/InputSubmit/block.html    
```

### Blocks

#### Alert

Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.

```yaml
- type: Alert
  properties:
    # Alert unique ID 
    id: 
    
    # Alert message value
    value: 

    # Alert classes seperated by (,)
    #
    # example: class-name
    class: 
    
    # Alert style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Alert data array
    #
    # example:
    #   foo: bar
    data: 

    # Alert type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # example: primary
    type: 

    # Alert header
    header:
      # Alert header classes separated by (,)
      #
      # example: class-name
      class: 
      
      # Alert header style array
      #
      # example:
      #   color: red
      #   backgroundColor: red
      style:

      # Alert header data array
      #
      # example:
      #   foo: bar
      data:
   
```

#### Anchor

Creates a clickable text.

```yaml
- type: Anchor
  properties:
    # Anchor unique ID 
    id: 
    
    # Anchor title value
    value: 

    # Anchor href
    href: 

    # Anchor classes separated by (,)
    #
    # example: btn, btn-primary
    class: 
    
    # Anchor style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Anchor data array
    #
    # example:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # Anchor events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # example:
    #   onclick: "alert('Lorem ipsum...')"
    events: 

    # Anchor target
    #
    # variants: _self, _blank
    target: 
```

#### Button

Creates button for actions in forms, dialogs, and more with support for multiple sizes, states, and more.

```yaml
- type: Button
  properties:
    # Button unique ID 
    id: 
    
    # Button title value
    value: 

    # Button classes separated by (,)
    #
    # example: btn, btn-primary
    class: 
    
    # Button style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Button data array
    #
    # example:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # Button events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # example:
    #   onclick: "alert('Lorem ipsum...')"
    events: 

    # Button type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # example: primary
    type: 

    # Button size
    #
    # variants: large, small
    #
    # example: large
    size: 

    # Button disabled state
    # default is false
    #
    # variants: true or false
    disabled: 
```

#### ButtonGroup

Creates group a series of buttons together on a single line or stack them in a vertical column.

```yaml
- type: ButtonGroup
  Button:
    # ButtonGroup unique ID 
    id: 
    
    # ButtonGroup classes separated by (,)
    #
    # example: btn, btn-primary
    class: 
    
    # ButtonGroup style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # ButtonGroup data array
    #
    # example:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # ButtonGroup events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # example:
    #   onclick: "alert('Lorem ipsum...')"
    events:  

    # ButtonGroup size
    #
    # variants: large, small
    #
    # example: large
    size: 

    # ButtonGroup display vertical or not
    # default is false
    #
    # variants: true or false
    vertical: 

    # ButtonGroup buttons
    buttons:
      - type: Button
        properties:
          # Button unique ID 
          id: 
          
          # Button title value
          value: 

          # Button classes separated by (,)
          #
          # example: btn, btn-primary
          class: 
          
          # Button style array
          #
          # example:
          #   color: red
          #   backgroundColor: red
          style:

          # Button data array
          #
          # example:
          #   bs-toggle: modal
          #   bs-target: "#exampleModal"
          data: 
          
          # Button events array
          #
          # events: onkeyup, onmousedown, onmousemove, onmouseout,
          #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
          #         onkeydown, onblur
          #
          # example:
          #   onclick: "alert('Lorem ipsum...')"
          events: 

          # Button type
          # default is primary
          #
          # variants: primary, secondary, sucess, info, warning, danger
          #
          # example: primary
          type: 

          # Button size
          #
          # variants: large, small
          #
          # example: large
          size: 

          # Button disabled state
          # default is false
          #
          # variants: true or false
          disabled: 
```