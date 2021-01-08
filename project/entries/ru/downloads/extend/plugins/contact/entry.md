---
title: Contact
description: Contact Plugin for Flextype.
icon:
  name: envelope
  set: fontawesome|solid
category: emails
author:
  name: Sergey Romanenko
  email: support@flextype.org
github: https://github.com/flextype-plugins/contact
documentation: https://github.com/flextype-plugins/contact
template: plugin
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/contact`
3. Download PHP Mailer Plugin and unzip plugin content to the folder `/project/plugins/contact`
4. Copy `_project` folder content into your `project` folder.

#### Documentation

#### Settings

| Key             | Value                | Description                         |
| --------------- | -------------------- | ----------------------------------- |
| enabled         | true                 | true or false to disable the plugin |
| priority        | 80                   | contact plugin priority             |
| default_subject | Default subject      | Default subject for email           |
| message_success | Email sended.        | Message to show after email send.   |
| from.name       | Flextype             | From name                           |
| from.email      | support@flextype.org | From email                          |
| to.name         | Flextype             | Receiver name.                      |
| to.email        | support@flextype.org | Receiver email                      |

#### Create your own contact form

here is an example of simpe contact form:

```
title: Contact
default_field: title
icon: 'fas fa-envelope'
size: 6/12
hide: true
form:
  action: 'contact.contactProcess'
  buttons:
    submit:
      type: submit
      title: 'Send'
  fields:
    mailbox:
      type: hidden
      default: test
    subject:
      title: 'Subject'
      type: text
      size: 6/12
      validation:
        required: true
    email:
      title: 'Email'
      type: email
      size: 6/12
      validation:
        required: true
    message:
      title: 'Message'
      type: textarea
      size: 12
      validation:
        required: true
```

#### Usage in the TWIG templates

```
{# Show success message #}
{% for message in flextype.flash.getMessages()['success'] %}
    {{ message }}
{% endfor %}

{# Render contact form #}
{{ flextype.form.render(flextype.serializers.yaml.decode(filesystem().file(PATH_PROJECT ~ '/fieldsets/contact.yaml').get()), {})|raw }}
```
