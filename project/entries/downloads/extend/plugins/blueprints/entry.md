---
title: Blueprints
description: Blueprints plugin simplifies creating truly customizable user interface and basic logic for data management, like handling user forms with simple config schema that is easy to learn, understand and remember.
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

* [Introduction](#Introduction)
* [Installation](#Installation)
* [Settings](#Settings)
* [Structure](#Structure)
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
  - [Row](#Row)
  - [Tabs](#Tabs)
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

### Introduction

Blueprints plugin simplifies creating truly customizable user interface and basic logic for data management, like handling user forms with simple config schema that is easy to learn, understand and remember.

### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/blueprints`
3. Download Twig Plugin and unzip plugin content to the folder `/project/plugins/blueprints`

### Settings

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
    type: Anchor
    properties: []
    template: plugins/blueprints/blocks/blocks/Anchor/block.html
  Alert:
    type: Alert
    properties: []
    template: plugins/blueprints/blocks/blocks/Alert/block.html 
  Button:
    type: Button 
    properties: []
    template: plugins/blueprints/blocks/blocks/Button/block.html 
  ButtonGroup:
    type: ButtonGroup 
    properties: []
    template: plugins/blueprints/blocks/blocks/ButtonGroup/block.html 
  Divider:
    type: Divider
    properties: []
    template: plugins/blueprints/blocks/blocks/Divider/block.html 
  Container:
    type: Container
    properties: []
    blocks: []
    template: plugins/blueprints/blocks/blocks/Container/block.html 
  Row:
    type: Row
    properties: []
    blocks: []
    template: plugins/blueprints/blocks/blocks/Row/block.html 
  Column:
    type: Column
    properties: []
    blocks: []
    template: plugins/blueprints/blocks/blocks/Column/block.html 
  Tabs:
    type: Tabs
    properties: []
    template: plugins/blueprints/blocks/blocks/Tabs/block.html 
  Form:
    type: Form
    properties: []
    blocks: []
    template: plugins/blueprints/blocks/blocks/Form/block.html 
  Heading:
    type: Heading
    properties: []
    template: plugins/blueprints/blocks/blocks/Heading/block.html 
  Image:
    type: Image
    properties: []
    template: plugins/blueprints/blocks/blocks/Image/block.html 
  InputText:
    type: InputText
    properties: []
    template: plugins/blueprints/blocks/blocks/InputText/block.html
  InputEmail:
    type: InputEmail
    properties: []
    template: plugins/blueprints/blocks/blocks/InputEmail/block.html 
  InputPassword:
    type: InputPassword
    properties: []
    template: plugins/blueprints/blocks/blocks/InputPassword/block.html 
  InputTextarea:
    type: InputTextarea
    properties: []
    template: plugins/blueprints/blocks/blocks/InputTextarea/block.html 
  InputHidden:
    type: InputHidden
    properties: []
    template: plugins/blueprints/blocks/blocks/InputHidden/block.html 
  InputNumber:
    type: InputNumber
    properties: []
    template: plugins/blueprints/blocks/blocks/InputNumber/block.html 
  InputTags:
    type: InputTags
    properties: []
    template: plugins/blueprints/blocks/blocks/InputTags/block.html     
  InputSelect:
    type: InputSelect
    properties: []
    template: plugins/blueprints/blocks/blocks/InputSelect/block.html 
  InputReset:
    type: InputReset
    properties: []
    template: plugins/blueprints/blocks/blocks/InputReset/block.html 
  InputButton:
    type: InputButton
    properties: []
    template: plugins/blueprints/blocks/blocks/InputButton/block.html  
  InputSubmit:
    type: InputSubmit
    properties: []
    template: plugins/blueprints/blocks/blocks/InputSubmit/block.html    
```

### Structure

```yaml
# Blueprint title 
#
# Examples
#
# title: Create new entry
title:

# Blueprint icon
icon:

  # Blueprint icon set (tabler, bootstrap, fontawesome|brands, fontawesome|regular, fontawesome|solid)
  #
  # Examples
  #
  # set: bootstrap
  set:

  # Blueprint icon name
  #
  # Examples:
  #
  # name: file-text
  name:

# Blueprint variables
#
# Variable structure 
#
# name - variable name
# type - variable type (array, bool, float, int, string)
# value - variable value
#
# Examples
#
# vars: 
#   - name: version
#     type: string
#     value: "{{ flextype.registry.get('flextype.manifest.version') }}"
vars:

# Blueprint emitter
emitter: 

  # Blueprint emit events array
  #
  # Examples
  #
  # emit:
  #   - name: onCreateNewEntryForm
  #   - name: onOtherEvent
  emit:

  # Blueprints registering listeners array
  #
  # Examples
  #
  # addListener:
  #   - name: onAdminThemeTail
  #     properties:
  #       vars: 
  #         - name: version
  #           type: string
  #           value: "{{ flextype.registry.get('flextype.manifest.version') }}"
  #       value: |
  #         Flextype: {{ version }}
  #   - name: onOtherEvent
  #     properties:
  #       value: |
  #         Display something...
  addListener:

# Blueprint actions
#
# Action structure 
#
# name - action name
# properties:
#   vars:
#     - type - property type (array, bool, float, int, string)
#       value - property value
#
# Examples
#
# actions: 
#   - name: actionName
#     properties:
#       vars:
#         - type: string
#           value: "{{ id }}"
#         - type: int
#           value: 42
actions:

# Blueprint blocks
blocks: 
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
    # Examples
    #
    # class: class-name
    class: 
    
    # Alert style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Alert data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # Alert type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # Alert header
    header:
      # Alert header classes separated by (,)
      #
      # Examples
      #
      # class: class-name
      class: 
      
      # Alert header style array
      #
      # Examples
      #
      # style:
      #   color: red
      #   backgroundColor: red
      style:

      # Alert header data array
      #
      # Examples
      #
      # data:
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
    # Examples
    #
    # class: btn, btn-primary
    class: 
    
    # Anchor style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Anchor data array
    #
    # Examples
    #
    # data:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # Anchor events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # Examples
    #
    # events:
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
    # Examples
    #
    # class: btn, btn-primary
    class: 
    
    # Button style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Button data array
    #
    # Examples
    #
    # data:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # Button events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # Examples
    #
    # events:
    #   onclick: "alert('Lorem ipsum...')"
    events: 

    # Button type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # Button size
    #
    # variants: large, small
    #
    # Examples
    #
    # size: large
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
    # Examples
    #
    # class: btn, btn-primary
    class: 
    
    # ButtonGroup style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # ButtonGroup data array
    #
    # Examples
    #
    # data:
    #   bs-toggle: modal
    #   bs-target: "#exampleModal"
    data: 
    
    # ButtonGroup events array
    #
    # events: onkeyup, onmousedown, onmousemove, onmouseout,
    #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #         onkeydown, onblur
    #
    # Examples
    #
    # events:
    #   onclick: "alert('Lorem ipsum...')"
    events:  

    # ButtonGroup size
    #
    # variants: large, small
    #
    # Examples
    #
    # size: large
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
          # Examples
          #
          # class: btn, btn-primary
          class: 
          
          # Button style array
          #
          # Examples
          #
          # style:
          #   color: red
          #   backgroundColor: red
          style:

          # Button data array
          #
          # Examples
          #
          # data:
          #   bs-toggle: modal
          #   bs-target: "#exampleModal"
          data: 
          
          # Button events array
          #
          # events: onkeyup, onmousedown, onmousemove, onmouseout,
          #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
          #         onkeydown, onblur
          #
          # Examples
          #
          # events:
          #   onclick: "alert('Lorem ipsum...')"
          events: 

          # Button type
          # default is primary
          #
          # variants: primary, secondary, sucess, info, warning, danger
          #
          # Examples
          #
          # type: primary
          type: 

          # Button size
          #
          # variants: large, small
          #
          # Examples
          #
          # size: large
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
          # Examples
          #
          # class: btn, btn-primary
          class: 
          
          # ButtonToggle style array
          #
          # Examples
          #
          # style:
          #   color: red
          #   backgroundColor: red
          style:

          # ButtonToggle data array
          #
          # Examples 
          #
          # data:
          #   bs-toggle: modal
          #   bs-target: "#exampleModal"
          data: 
          
          # ButtonToggle events array
          #
          # events: onkeyup, onmousedown, onmousemove, onmouseout,
          #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
          #         onkeydown, onblur
          #
          # Examples
          #
          # events:
          #   onclick: "alert('Lorem ipsum...')"
          events: 

          # ButtonToggle type
          # default is primary
          #
          # variants: primary, secondary, sucess, info, warning, danger
          #
          # Examples
          # 
          # type: primary
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
              # Examples
              #
              # class: btn, btn-primary
              class: 
              
              # Item style array
              #
              # Examples
              #
              # style:
              #   color: red
              #   backgroundColor: red
              style:

              # Item data array
              #
              # Examples
              #
              # data:
              #   bs-toggle: modal
              #   bs-target: "#exampleModal"
              data: 
              
              # Item events array
              #
              # events: onkeyup, onmousedown, onmousemove, onmouseout,
              #         onmouseover, onmouseup, onkeypress, onclick, ondblclick,
              #         onkeydown, onblur
              #
              # Examples
              #
              # events:
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
    # Examples
    #
    # class: class-name
    class: 

    # Column style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Column data array
    #
    # Examples
    #
    # data:
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
    # Examples
    #
    # class: class-name
    class: 

    # Container style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Container data array
    #
    # Examples
    #
    # data:
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
    # Examples
    #
    # class: class-name
    class: 

    # Divider style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Divider data array
    #
    # Examples
    #
    # data: 
    #   foo: bar
    data: 

    # Divider dashed or solid
    # Default is false
    #
    # Examples
    #
    # dashed: true
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
    name: 
    
    # Form classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # Form data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # Form events array
    #
    # Events
    #
    # onkeyup, onmousedown, onmousemove, onmouseout, onmouseover,
    # onmouseup, onkeypress, onclick, ondblclick, onkeydown,
    # onblur, onreset, onsubmit
    #
    # Examples
    # 
    # events:
    #   onclick: "alert('Lorem ipsum...')"
    events:
    
    # Form blocks
    # Any other blocks may included here.
    blocks:

    # Form process 
    #
    # Define form fields, actions, redirects, messages
    process:
      # Actions array
      #
      # Action structure 
      #
      # name - action name
      # properties:
      #   vars:
      #     - type - property type (array, bool, float, int, string)
      #       value - property value
      #
      # Examples
      #
      # actions: 
      #   - name: actionName
      #     properties:
      #       vars:
      #         - type: string
      #           value: "{{ id }}"
      #         - type: int
      #           value: 42
      actions: 

      # Fields array
      #
      # Field structure
      #
      # name - unique field name
      # properties:
      #   type - field type (array, bool, float, int, string)
      #   vars - field variables array
      #     - name - variable name
      #       type - variable type (array, bool, float, int, string)
      #       value - variable value
      #   value - field value
      #   ignore - ignore field saving, by default ignore is false
      #
      # Examples
      #
      # fields:
      #   - name: info
      #     properties:
      #       type: string
      #       vars:
      #         - name: app
      #           type: string
      #           value: "{{ flextype.registry.get('flextype.manifest.name') }}"
      #         - name: version
      #           type: string
      #           value: "{{ flextype.registry.get('flextype.manifest.version') }}"
      #       value: "{{ app }} {{ version }}"
      #       ignore: false 
      fields:

      # Redirect array
      #
      # Redirect structure
      #
      # route - registered route name
      # url - url
      # args - arguments array for route or url
      #
      # Examples
      #
      # redirect:
      #   route: admin.entries.edit
      #   args:
      #     id: "{{ id }}"
      redirect:

      # Messages array
      #
      # Messages structure
      #
      # message_namespace - unique message namespace
      #
      # Examples
      #
      # messages:
      #   error: "{{ __('admin_message_entry_was_not_created') }}"
      #   success: "{{ __('admin_message_entry_created') }}"
      messages: 
```

#### Heading

Creates heading.

```yaml
- type: Heading
  properties:
  
    # Heading unique ID 
    id: 

    # Heading unique name 
    name: 
    
    # Heading classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # Heading style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Heading data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # Heading size
    #
    # variants: huge, large, medium, small, tiny
    #
    # Examples
    #
    # size: large
    size:  
```

#### Image

Creates image.

```yaml
- type: Image
  properties:

    # Image unique ID 
    id: 

    # Image unique name 
    name: 

    # Image style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Image classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # Image data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # Image src
    #
    # Specifies the path to the image.
    #
    # Examples
    #
    # src: /img/image.jpg
    src:  

    # Image alt
    #
    # Specifies an alternate text for the image, if the image for some reason cannot be displayed.
    #
    # Examples
    #
    # alt: "Image"
    alt:  

    # Image height
    #
    # Specifies the height of an image.
    #
    # Examples
    #
    # height: 100
    height: 

    # Image width
    #
    # Specifies the width of an image.
    #
    # Examples
    #
    # width: 100
    width: 

    # Image loading
    #
    # Specifies whether a browser should load an image immediately or to defer loading of images until
    # some conditions are met.
    #
    # variants: eager, lazy
    #
    # Examples
    #
    # loading: eager
    loading: 
```

#### InputButton

Creates input button for user form.

```yaml
- type: InputButton
  properties:

    # InputButton unique ID 
    id: 

    # InputButton unique name 
    name: 

    # InputButton style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputButton classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputButton data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputButton value
    #
    # Specifies the value of an InputButton.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputButton disabled state
    #
    # Specifies that an InputButton should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputButton events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputButton type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputButton outline
    # default is false
    #
    # Examples
    #
    # outline: true
    outline: 
```

#### InputEmail

Creates email input for user form.

```yaml
- type: InputEmail
  properties:

    # InputEmail unique ID 
    id: 

    # InputEmail unique name 
    name: 

    # InputEmail style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputEmail classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputEmail data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputEmail placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputEmail value
    #
    # Specifies the value of an InputEmail.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputEmail disabled state
    #
    # Specifies that an InputEmail should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputEmail events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputEmail type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputEmail readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputEmail help message
    help: 

    # InputEmail label
    label:

      # InputEmail label value
      value: 

      # InputEmail label class
      class: 

      # InputEmail label style
      style: 

    # InputEmail validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum length of textual data (strings)
      maxlength: 

      # Specifies the minimum length of textual data (strings)
      minlength: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### InputHidden

Creates hidden input for user form.

```yaml
- type: InputHidden
  properties:

    # InputHidden unique ID 
    id: 

    # InputHidden unique name 
    name: 

    # InputHidden classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputHidden data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputHidden value
    #
    # Specifies the value of an InputHidden.
    #
    # Examples
    #
    # value: Save
    value:  
```

#### InputNumber

Creates number input for user form.

```yaml
- type: InputNumber
  properties:

    # InputNumber unique ID 
    id: 

    # InputNumber unique name 
    name: 

    # InputNumber style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputNumber classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputNumber data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputEmail placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputNumber value
    #
    # Specifies the value of an InputNumber.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputNumber disabled state
    #
    # Specifies that an InputNumber should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputNumber events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputNumber type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputNumber readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputNumber help message
    help: 

    # InputNumber label
    label:

      # InputNumber label value
      value: 

      # InputNumber label class
      class: 

      # InputNumber label style
      style: 

    # InputNumber validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum values of numerical input types
      max: 

      # Specifies the minimum values of numerical input types
      min: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### InputPassword

Creates password input for user form.

```yaml
- type: InputPassword
  properties:

    # InputPassword unique ID 
    id: 

    # InputPassword unique name 
    name: 

    # InputPassword style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputPassword classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputPassword placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputPassword data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputPassword value
    #
    # Specifies the value of an InputPassword.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputPassword disabled state
    #
    # Specifies that an InputPassword should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputPassword events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputPassword type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputPassword readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputPassword help message
    help: 

    # InputPassword label
    label:

      # InputPassword label value
      value: 

      # InputPassword label class
      class: 

      # InputPassword label style
      style: 

    # InputPassword validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum length of textual data (strings)
      maxlength: 

      # Specifies the minimum length of textual data (strings)
      minlength: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### InputReset

Creates input reset button for user form.

```yaml
- type: InputReset
  properties:

    # InputReset unique ID 
    id: 

    # InputReset unique name 
    name: 

    # InputReset style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputReset classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputReset data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputReset value
    #
    # Specifies the value of an InputButton.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputButton disabled state
    #
    # Specifies that an InputReset should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputReset events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputReset type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputReset outline
    # default is false
    #
    # Examples
    #
    # outline: true
    outline: 
```

#### InputSelect

Creates input select for user form.

```yaml
- type: InputSelect
  properties:

    # InputSelect unique ID 
    id: 

    # InputSelect unique name 
    name: 

    # InputSelect style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputSelect classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputSelect data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputSelect value
    #
    # Specifies the value of an InputButton.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputSelect disabled state
    #
    # Specifies that an InputReset should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputSelect events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputSelect help message
    help: 

    # InputSelect items
    #
    # Examples
    #
    # Using JSON 
    # items: "{{ flextype.serializers.json.encode({'foo': 'Foo', 'bar': 'Bar'}) }}"
    #
    # Using Array
    # items: 
    #   foo: Foo
    #   bar: Bar
    items: 

    # InputSelect label
    label:

      # InputSelect label value
      value: 

      # InputSelect label class
      class: 

      # InputSelect label style
      style: 
```

#### InputSubmit

Creates input submit button for user form.

```yaml
- type: InputSubmit
  properties:

    # InputSubmit unique ID 
    id: 

    # InputSubmit unique name 
    name: 

    # InputSubmit style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputSubmit classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputSubmit data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputSubmit value
    #
    # Specifies the value of an InputButton.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputSubmit disabled state
    #
    # Specifies that an InputSubmit should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputSubmit events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputSubmit type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputSubmit outline
    # default is false
    #
    # Examples
    #
    # outline: true
    outline: 
```

#### InputText

Creates email input for user form.

```yaml
- type: InputText
  properties:

    # InputText unique ID 
    id: 

    # InputText unique name 
    name: 

    # InputText style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputText classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputText data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputText placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputText value
    #
    # Specifies the value of an InputText.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputText disabled state
    #
    # Specifies that an InputText should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputText events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputText type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputText readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputText help message
    help: 

    # InputText label
    label:

      # InputText label value
      value: 

      # InputText label class
      class: 

      # InputText label style
      style: 

    # InputText validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum length of textual data (strings)
      maxlength: 

      # Specifies the minimum length of textual data (strings)
      minlength: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### InputText

Creates email input for user form.

```yaml
- type: InputText
  properties:

    # InputText unique ID 
    id: 

    # InputText unique name 
    name: 

    # InputText style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputText classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputText data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputText placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputText value
    #
    # Specifies the value of an InputText.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputText disabled state
    #
    # Specifies that an InputText should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputText events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputText type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputText readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputText help message
    help: 

    # InputText label
    label:

      # InputText label value
      value: 

      # InputText label class
      class: 

      # InputText label style
      style: 

    # InputText validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum length of textual data (strings)
      maxlength: 

      # Specifies the minimum length of textual data (strings)
      minlength: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### InputTextarea

Creates textarea input for user form.

```yaml
- type: InputTextarea
  properties:

    # InputText unique ID 
    id: 

    # InputTextarea unique name 
    name: 

    # InputTextarea style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # InputTextarea classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # InputTextarea data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # InputTextarea placeholder
    #
    # The placeholder attribute specifies a short hint that describes the expected value of an input 
    # field (e.g. a sample value or a short description of the expected format).
    #
    # The short hint is displayed in the input field before the user enters a value.
    placeholder:

    # InputTextarea value
    #
    # Specifies the value of an InputText.
    #
    # Examples
    #
    # value: Save
    value:  

    # InputTextarea disabled state
    #
    # Specifies that an InputText should be disabled.
    # Default is false.
    #
    # Examples
    #
    # disabled: true
    disabled:  

    # InputTextarea events
    # 
    # variants: onkeyup, onmousedown, onmousemove, onmouseout,
    #           onmouseover, onmouseup, onkeypress, onclick, ondblclick,
    #           onkeydown, onblur
    #
    # Examples
    #
    # events: 
    #   onclick: "alert('Lorem');"
    events: 

    # InputTextarea type
    # default is primary
    #
    # variants: primary, secondary, sucess, info, warning, danger
    #
    # Examples
    #
    # type: primary
    type: 

    # InputTextarea readonly
    # default is false
    #
    # Specifies that an input field is read-only.
    #
    # Examples
    #
    # readonly: true
    readonly: 

    # InputTextarea help message
    help: 

    # InputTextarea label
    label:

      # InputTextarea label value
      value: 

      # InputTextarea label class
      class: 

      # InputTextarea label style
      style: 

    # InputTextarea validation
    validation: 

      # Specifies error message
      errorMessage: 

      # Specifies the maximum length of textual data (strings)
      maxlength: 

      # Specifies the minimum length of textual data (strings)
      minlength: 

      # Specifies whether a form field needs to be filled in before the form can be submitted.
      required: 

      # Specifies a regular expression that defines a pattern the entered data needs to follow.
      # https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
      pattern: 
```

#### Row

Creates row block.

```yaml
- type: Row
  properties:

    # Row unique ID 
    id: 
    
    # Row classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # Row style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Row data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 

    # Row blocks
    # Any other blocks may included here.
    blocks:
```

#### Tabs

Creates tabs block.

```yaml
- type: Tabs
  properties:

    # Tabs unique ID 
    id: 
    
    # Tabs classes separated by (,)
    #
    # Examples
    #
    # class: class-name
    class: 

    # Tabs style array
    #
    # Examples
    #
    # style:
    #   color: red
    #   backgroundColor: red
    style:

    # Tabs data array
    #
    # Examples
    #
    # data:
    #   foo: bar
    data: 
    
    # Tabs
    tabs:
      
      # Unique tab name, example: main, settings, seo, etc...
      name:

        # Tab title
        title: 
        
        # Tab blocks
        blocks: 
```

### Handling

#### Methods

<table>
    <thead>
        <tr>
            <th>Method</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="#methods-fetch">fetch</a></td>
            <td>Fetch bluerint or blueprints collection.</td>
        </tr>
        <tr>
            <td><a href="#methods-create">create</a></td>
            <td>Create blueprint</td>
        </tr>
        <tr>
            <td><a href="#methods-update">update</a></td>
            <td>Update blueprint</td>
        </tr>
        <tr>
            <td><a href="#methods-move">move</a></td>
            <td>Move blueprint</td>
        <tr>
            <td><a href="#methods-copy">copy</a></td>
            <td>Copy blueprint</td>
        </tr>
        <tr>
            <td><a href="#methods-delete">delete</a></td>
            <td>Delete blueprint</td>
        </tr>
        <tr>
            <td><a href="#methods-has">has</a></td>
            <td>Check whether blueprint exists</td>
        </tr>
        <tr>
            <td><a href="#methods-storage">storage</a></td>
            <td>Get blueprints storage</td>
        </tr>
        <tr>
            <td><a href="#methods-render">render</a></td>
            <td>Render blueprint</td>
        </tr>
        <tr>
            <td><a href="#methods-renderFromArray">renderFromArray</a></td>
            <td>Render blueprint from array</td>
        </tr>
        <tr>
            <td><a href="#methods-getBlockName">getBlockName</a></td>
            <td>Get blueprint block name</td>
        </tr>
        <tr>
            <td><a href="#methods-getBlockID">getBlockID</a></td>
            <td>Get blueprint block ID</td>
        </tr>
        <tr>
            <td><a href="#methods-form">form</a></td>
            <td>Get instance of The Form class</td>
        </tr>
        <tr>
            <td><a href="#methods-getFileLocation">getFileLocation</a></td>
            <td>Get blueprint file location</td>
        </tr>
        <tr>
            <td><a href="#methods-getDirectoryLocation">getDirectoryLocation</a></td>
            <td>Get blueprint directory location</td>
        </tr>
        <tr>
            <td><a href="#methods-getCacheID">getCacheID</a></td>
            <td>Get Cache ID for blueprint</td>
        </tr>
    </tbody>
</table>

#### Methods Details

##### <a name="methods-fetch"></a> `fetch`

Fetch blueprint or blueprints collection.

```php
/**
 * Fetch bluerint or blueprints collection.
 *
 * @param string $id      Unique identifier of the blueprint.
 * @param array  $options Options array.
 *
 * @access public
 *
 * @return Arrays Returns instance of The Arrays class with items.
 */
public function fetch(string $id, array $options = []): Arrays
```

**Fetch single blueprint**

**Examples**

Fetch single blueprint `blog/post`

```php
$data = flextype('blueprints')->fetch('blog/post');
```

Fetch singe blueprint in `blog/post` with `$options`.

```php
$data = flextype('blueprints')->fetch('blog/post', $options);
```

`$options` is an array of valid values for <code>[filter](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php)</code> helper.

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

**Fetch blueprints collection**

**Examples**

Fetch collections of blueprints in `blog`

```php
$data = flextype('entries')->fetch('blog', $options);
```

Fetch collections of blueprints in `blog` with `$options`.

```php
$data = flextype('entries')->fetch('blog', $options);
```

`$options` is an array of valid values for <code>[find](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FindHelper.php)</code> and <code>[filter](https://github.com/flextype/flextype/blob/dev/src/flextype/Support/Helpers/FilterHelper.php)</code> helpers.

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

##### <a name="methods-create"></a> `create`

Create blueprint.

```php
/**
 * Create blueprint.
 *
 * @param string $id   Unique identifier of the blueprint.
 * @param array  $data Data to create for the blueprint.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function create(string $id, array $data = []): bool
```

**Examples**

Create new blueprint `post` in `blog`

```php
$data = [         
          'title' => 'Create new post',
          'icon' => ['set' => 'bootstrap', 'name' => 'file-text'],
          'vars' => [],
          'emitter' => [],
          'actions' => [],
          'blocks' => []
        ];

flextype('blueprints')->create('blog/post', $data);
```

##### <a name="methods-update"></a> `update`

Update blueprint.

```php
/**
 * Update blueprint.
 *
 * @param string $id   Unique identifier of the blueprint.
 * @param array  $data Data to update for the blueprint.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function update(string $id, array $data): bool
```

**Examples**

Update blueprint `post` in `blog`

```php
$data = ['title' => 'Create New Post'];

flextype('blueprints')->update('blog/post', $data);
```

##### <a name="methods-move"></a> `move`

Move blueprint.

```php
/**
 * Move blueprint.
 *
 * @param string $id    Unique identifier of the blueprint.
 * @param string $newID New Unique identifier of the blueprint.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function move(string $id, string $newID): bool
```

**Examples**

Move blueprint `post` to `post-movies` in `blog`

```php
flextype('blueprints')->move('blog/post',
                          'blog/post-movies');
```

##### <a name="methods-copy"></a> `copy`

Copy blueprint.

```php
/**
 * Copy blueprint.
 *
 * @param string $id    Unique identifier of the blueprint.
 * @param string $newID New Unique identifier of the blueprint.
 *
 * @return bool|null True on success, false on failure.
 *
 * @access public
 */
public function copy(string $id, string $newID): ?bool
```

**Examples**

Copy blueprint `post` to `post-movies` in `blog`

```php
flextype('blueprints')->copy('blog/post',
                          'blog/post-movies');
```

##### <a name="methods-delete"></a> `delete`

Delete blueprint.

```php
/**
 * Delete blueprint.
 *
 * @param string $id Unique identifier of the blueprint.
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function delete(string $id): bool
```

**Examples**

Delete blueprint `post` in `blog`

```php
flextype('blueprints')->delete('blog/post');
```

##### <a name="methods-has"></a> `has`

Check whether blueprint exists.

```php
/**
 * Check whether blueprint exists.
 *
 * @param string $id Unique identifier of the blueprint(blueprints).
 *
 * @return bool True on success, false on failure.
 *
 * @access public
 */
public function has(string $id): bool
```

**Examples**

Check whether blueprint `post` exists in `blog`

```php
if (flextype('blueprints')->has('blog/post')) {
    // do something...
}
```

##### <a name="methods-storage"></a> `storage`

Get Blueprints Storage

```php
/**
 * Get Blueprints Storage
 *
 * @return Arrays
 */
public function storage(): Arrays
```

**Examples**

Get blueprint storage.

```php
$storage = flextype('blueprints')->storage();
```

Get blueprint storage and set new variable.

```php
flextype('blueprints')->storage()->set('vars.foo', 'Foo');
```

Get blueprint storage and get variable `foo`.

```php
$foo = flextype('blueprints')->storage()->get('vars.foo');
```

Blueprints storage is extending [Arrays Component](https://atomastic.com/components/arrays). All methods of Arrays Component are available when using Blueprints storage in your projects for manipulations with Blueprints storage.

##### <a name="methods-render"></a> `render`

Render blueprint

```php
/**
 * Render blueprint.
 *
 * @param string $id     Blueprint unique identifier.
 * @param array  $values Blueprint values.
 * @param array  $vars   Blueprint variables.
 *
 * @return void
 *
 * @access public
 */
public function render(string $id, array $values = [], array $vars = []): void
``` 

**Examples**

Render `blog/post` blueprint.

**PHP**
```php
flextype('blueprints')->render('blog/post');
```

**TWIG**
```twig
{{ flextype.blueprints.render('blog/post') }}
```

##### <a name="methods-renderFromArray"></a> `renderFromArray`

Render blueprint from array

```php
/**
 * Render blueprint from array.
 *
 * @param array $blueprint Blueprint array.
 * @param array $values    Blueprint values.
 * @param array $vars      Blueprint variables.
 *
 * @return void
 *
 * @access public
 */
public function renderFromArray(array $blueprint, array $values = [], array $vars = []): void
``` 

**Examples**

Render `blog/post` blueprint from array.

**PHP**
```php
$blueprint = flextype('blueprints')->fetch('blog/post'); 

flextype('blueprints')->renderFromArray($blueprint);
```

**TWIG**
```twig
{% set blueprint = flextype.blueprints.fetch('blog/post') %}

{{ flextype.blueprints.renderFromArray('blog/post') }}
```

##### <a name="methods-getBlockName"></a> `getBlockName`

Get blueprint block name.

```php
/**
 * Get blueprint block name.
 *
 * @param string $name Block name.
 *
 * @return string Returns blueprint block name.
 *
 * @access public
 */
public function getBlockName(string $name) : string
``` 

Get name for block `author.email`

**Examples**

```php
$blockName = flextype('blueprints')->getBlockName('author.email');

// Result: author[email] 
```

##### <a name="methods-getBlockID"></a> `getBlockID`

Get blueprint block id.

```php
/**
 * Get blueprint block ID.
 *
 * @param string $id Block ID.
 *
 * @return string Returns blueprint block ID.
 *
 * @access public
 */
public function getBlockID(string $id) : string
``` 

Get ID for block `author.email`

**Examples**

```php
$blockName = flextype('blueprints')->getBlockID('author.email');

// Result: author_email
```

##### <a name="methods-form"></a> `form`

Get instance of The Form class.

```php
/**
 * Get instance of The Form class.
 *
 * @param array $data Form data.
 *
 * @return Returns instance of The Form class.
 *
 * @access public
 */   
public function form(array $data): Form
``` 

Get Form class instance.

**Examples**

```php
$form = flextype('blueprints')->form([]);
```

Available methods for Form class instance.

```php
/**
 * Get form storage.
 *
 * @return Arrays Form storage.
 *
 * @access public
 */
public function storage(): Arrays

/**
 * Get form redirect statament.
 *
 * @param array $values Values to replace for redirect arguments.
 * 
 * @return string Redirect statament.
 *
 * @access public
 */
public function getProcessRedirect(array $values = []): string

/**
 * Get form fields statement.
 * 
 * @return array Fields statement.
 *
 * @access public
 */
public function getProcessFields(): array

/**
 * Get form process messages statament.
 * 
 * @param string $type Message type.
 * @param array  $vars Associative array of template variables.
 * 
 * @return string Message statament.
 *
 * @access public
 */
public function getProcessMessages(string $type, array $vars = []): string 
```

##### <a name="methods-getFileLocation"></a> `getFileLocation`

Get blueprint file location

```php
/**
 * Get blueprint file location
 *
 * @param string $id Unique identifier of the blueprint(blueprints).
 *
 * @return string blueprint file location
 *
 * @access public
 */
public function getFileLocation(string $id): string
```

**Examples**

Get blueprint `blog/post` file location.

```php
$data = flextype('blueprints')->getFileLocation('blog/post');
```

##### <a name="methods-getDirectoryLocation"></a> `getDirectoryLocation`

Get blueprint directory location

```php
/**
 * Get blueprint directory location
 *
 * @param string $id Unique identifier of the blueprint(blueprints).
 *
 * @return string blueprint directory location
 *
 * @access public
 */
public function getDirectoryLocation(string $id): string
```

**Examples**

Get blueprint `blog/post` directory location.

```php
$data = flextype('blueprints')->getDirectoryLocation('blog/post');
```

### Extending

Blueprints are "macroable", which allows you to add additional methods to the Blueprints API at run time.

For example, the following code adds a `fetchRecentBlueprints` method to the Blueprints API.

**Examples**

```php
// Create new macros for fetch recent blueprints.
flextype('blueprints')::macro('fetchRecentBlueprints', function($limit = 10) {
    return flextype('blueprints')
                ->fetch('blog', ['collection' => true])
                ->sortBy('publised_at')
                ->limit($limit);
});

// Display recent blueprints.
foreach (flextype('blueprints')->fetchRecentBlueprints(5) as $blueprint) {
    echo $blueprint['title'] . "\n";
}
```

As you can see, the macro method takes as arguments a name and an [anonymous function](https://php.net/manual/functions.anonymous.php) to call (optionally, you able to add additional arguments, if you need that).

When you call a macro, your code in function would be called from the context of that class (in the example it is Blueprints API class context), allowing you to execute your code along with Flextype built-in features.

#### Using mixins

Macros awesome, and you may want to use a lot of them. You may group them with help of mixins.
For this approach, you should use a mixin static method on the macroable Blueprints API class, and pass your mixin class as an argument.

**Examples**

```php
// Bluperint Blog Mixin Class.
class BlueprintBlogMixin {
    public function fetchRecentBlueprints() {
        return function($limit = 10) {
            return flextype('blueprints')
                        ->fetch('blog', ['collection' => true])
                        ->sortBy('publised_at')
                        ->limit($limit);
        }
    }
}

// Create new mixin BlueprintBlogMixin with it is macros.
flextype('blueprints')::mixin(new BlueprintBlogMixin());

// Display recent blueprints.
foreach (flextype('blueprints')->fetchRecentBlueprints(5) as $blueprint) {
    echo $blueprint['title'] . "\n";
}
```
