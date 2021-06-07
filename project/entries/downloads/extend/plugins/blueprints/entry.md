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
  properties:
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

      - type: ButtonToggle
          # ButtonToggle unique ID 
          id: 
          
          # ButtonToggle title value
          value: 

          # ButtonToggle classes separated by (,)
          #
          # example: btn, btn-primary
          class: 
          
          # ButtonToggle style array
          #
          # example:
          #   color: red
          #   backgroundColor: red
          style:

          # ButtonToggle data array
          #
          # example:
          #   bs-toggle: modal
          #   bs-target: "#exampleModal"
          data: 
          
          # ButtonToggle events array
          #
          # events: onkeyup, onmousedown, onmousemove, onmouseout,
          #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
          #         onkeydown, onblur
          #
          # example:
          #   onclick: "alert('Lorem ipsum...')"
          events: 

          # ButtonToggle type
          # default is primary
          #
          # variants: primary, secondary, sucess, info, warning, danger
          #
          # example: primary
          type: 
          
          # ButtonToggle items
          items:

              # Item href is an attribute of the anchor tag.
            - href: 

              # Item unique ID 
              id: 
              
              # Item title value
              value: 

              # Item classes separated by (,)
              #
              # example: btn, btn-primary
              class: 
              
              # Item style array
              #
              # example:
              #   color: red
              #   backgroundColor: red
              style:

              # Item data array
              #
              # example:
              #   bs-toggle: modal
              #   bs-target: "#exampleModal"
              data: 
              
              # Item events array
              #
              # events: onkeyup, onmousedown, onmousemove, onmouseout,
              #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
              #         onkeydown, onblur
              #
              # example:
              #   onclick: "alert('Lorem ipsum...')"
              events: 

              # Item icon name and icon set
              icon:
                name:
                set:
```

#### Column

Creates column block.

```yaml
- type: Column
  properties:
    # Column unique ID 
    id: 
    
    # Column classes separated by (,)
    #
    # example: class-name
    class: 

    # Column style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Column data array
    #
    # example:
    #   foo: bar
    data: 

    # Colum media query breakpoint
    # default is medium
    #
    # variants: extra small, small, medium, large, extra large, extra extra large
    # https://getbootstrap.com/docs/5.0/layout/breakpoints/
    breakpoint:

    # Colum media query size
    # default is 12
    #
    # variants: 1/12, 2/12, 3/12, 4/12, 5/15, 6/12, 7/12, 8/12, 9/12, 10/12, 11/12, 12/12, 12, full
    # https://getbootstrap.com/docs/5.0/layout/columns/
    size:

    # Column blocks
    # Any other blocks may included here.
    blocks:
```

#### Container

Creates container block the fundamental building block of your layouts.

```yaml
- type: Container
  properties:
    # Container unique ID 
    id: 
    
    # Container classes separated by (,)
    #
    # example: class-name
    class: 

    # Container style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Container data array
    #
    # example:
    #   foo: bar
    data: 

    # Container media query breakpoint
    # default is empty container breakpoint value which sets a max-width at each responsive breakpoint
    #
    # variants: small, medium, large, extra large, extra extra large, fluid
    # https://getbootstrap.com/docs/5.0/layout/containers/
    breakpoint:

    # Container blocks
    # Any other blocks may included here.
    blocks:
```

#### Divider

Creates horizontal line to separate blocks.

```yaml
- type: Divider
  properties:
    # Divider unique ID 
    id: 
    
    # Divider classes separated by (,)
    #
    # example: class-name
    class: 

    # Divider style array
    #
    # example:
    #   color: red
    #   backgroundColor: red
    style:

    # Divider data array
    #
    # example:
    #   foo: bar
    data: 

    # Divider dashed or solid
    # Default is false
    #
    # example:
    #   dashed: true
    dashed: 
```

#### Form

Creates form for user input.

```yaml
- type: Form
  properties:
    # Form unique ID 
    id: 

    # Form unique name 
    id: 
    
    # Form classes separated by (,)
    #
    # example: class-name
    class: 

    # Form data array
    #
    # example:
    #   foo: bar
    data: 

    # Form events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout, onmouseover,
    #         onmouseup, onkeypress, onclick, ondblclick, onkeydown,
    #         onblur, onreset, onsubmit
    #
    # example:
    #   onclick: "alert('Lorem ipsum...')"
    events:
    
    # Form blocks
    # Any other blocks may included here.
    blocks:

    # Form process
    process:
      # Actions array
      actions: 

      # Fields array
      fields:

      # Redirect array
      redirect:

      # Messages array
      messages: 
```