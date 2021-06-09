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
      #   - type - property type (bool, float, int, string, array)
      #     value - property value
      #
      # Examples
      #
      # actions: 
      #   - name: actionName
      #     properties:
      #       - type: string
      #         value: "{{ id }}"
      #       - type: int
      #         value: 42
      actions: 

      # Fields array
      #
      # Field structure
      #
      # name - unique field name
      # type - field type (bool, float, int, string)
      # value - field value
      # ignore - ignore field saving, by default ignore is false
      #
      # Examples
      #
      # fields:
      #   - name: title
      #     type: string
      #     value: Lorem ipsum...
      #     ignore: false 
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
    # Specifies that an InputButton should be disabled.
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
    # 
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