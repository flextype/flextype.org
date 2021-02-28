---
title: Contact
description: Contact Plugin for Flextype.
icon:
  name: envelope
  set: fontawesome|solid
category: emails
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/contact
documentation: https://github.com/flextype-plugins/contact
template: plugin
seo:
  title: Get Contact Plugin for Open Source Hybrid Content Management System
  description: Contact Plugin to manage contact forms in Open Source Hybrid Content Management System
  keywords: Flextype Contact Plugin, Flextype CMS Contact Plugin, Headless CMS Contact Plugin, Download Flat File CMS Contact Plugin, Download Flat File Content Management System Contact Plugin, Download PHP CMS Contact Plugin, Contact Plugin, Plugin, Contact, Content, Management, System, PHP, CMS
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/contact`
3. Download PHP Mailer Plugin and unzip plugin content to the folder `/project/plugins/contact`
4. Copy `_project` folder content into your `project` folder.

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 80 | contact plugin priority |
| default_subject | Default subject | Default subject for email |
| message_success | Email sended. | Message to show after email send. |
| from.name | Flextype | From name |
| from.email | sergey.romanenko@flextype.org | From email |
| to.name | Flextype | Receiver name. |
| to.email | sergey.romanenko@flextype.org | Receiver email |

#### Create your own contact form

here is an example of simple contact form:

```yaml
title: Contact
default_field: title
icon:
  name: envelope
  set: 'fontawesome|solid'
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

Read documentation about creating forms here:  
https://github.com/flextype-plugins/form

### Usage in the PHP

```php
// Show success message
if (isset(flextype('flash')->getMessages()['success']) and count(flextype('flash')->getMessages()['success']) > 0)
    foreach (flextype('flash')->getMessages()['success'] as $message) {
        echo $message;
    }
}

// Render contact form
echo flextype('form')
        ->render(flextype('serializers')
                    ->yaml()
                    ->decode(filesystem()
                                ->file(PATH['project'] . '/fieldsets/contact.yaml')
                                ->get()), []);
```

### Usage in the TWIG templates

```twig
{# Show success message #}
{% for message in flextype.flash.getMessages()['success'] %}
    {{ message }}
{% endfor %}

{# Render contact form #}
{{ flextype.form.render(flextype.serializers.yaml.decode(filesystem().file(PATH_PROJECT ~ '/fieldsets/contact.yaml').get()), {})|raw }}
```
