---
title: ACL
description: ACL Panel plugin for Flextype.
icon:
  name: users-cog
  set: fontawesome|solid
category: accounts
author:
  name: Sergey Romanenko
  email: support@flextype.org
github: https://github.com/flextype-plugins/acl
documentation: https://github.com/flextype-plugins/acl
template: plugin
---

#### Features

* Simple and Flexible ACL(Access Control List) functionality for any entries or any specific data.
* Built in Shortcodes and Twig functions to restrict access for specific users in the entries content and templates.

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/acl`
3. Download ACL Plugin and unzip plugin content to the folder `/project/plugins/acl`

#### Documentation


#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 40 | accounts plugin priority |

#### Session Variables

| Name | Description |
|---|---|
| user_is_logged_in | true or false |
| user_email | Logged in email |
| user_roles | Looged in user roles |
| user_uuid | Logged in user uuid |

#### Middlewares

#### Name
`AclIsUserLoggedInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| redirect | Route name to redirect if user is not logged in |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserLoggedInMiddleware([
                                            'redirect' => 'another.route.name']));
```

#### Name
`AclAccountsIsUserLoggedInRolesInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| roles | Roles separated by comma. |
| redirect | Route name to redirect if not equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountsIsUserLoggedInRolesInMiddleware([
                                                           'roles' => 'admin, moderator'
                                                           'redirect' => 'another.route.name']));
```

#### Name
`AclIsUserLoggedInEmailsInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| emails | Emails separated by comma. |
| redirect | Route name to redirect if not equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserLoggedInEmailsInMiddleware([
                                                    'emails' => 'jack@flextype.org, jack@flextype.org'
                                                    'redirect' => 'another.route.name']));
```

#### Name
`AclIsUserLoggedInUuidInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| uuids | Uuids separated by comma. |
| redirect | Route name to redirect if not equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserLoggedInUuidInMiddleware([
                                                  'uuids' => 'ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2'
                                                  'redirect' => 'another.route.name']));
```
#### Name
`AclIsUserNotLoggedInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| redirect | Route name to redirect if user is not logged in |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserNotLoggedInMiddleware([
                                               'redirect' => 'another.route.name']));
```

#### Name
`AclAccountsIsUserLoggedInRolesNotInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| roles | Roles separated by comma. |
| redirect | Route name to redirect if equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountsIsUserLoggedInRolesNotInMiddleware([
                                                              'roles' => 'admin, moderator'
                                                              'redirect' => 'another.route.name']));
```

#### Name
`AclIsUserLoggedInEmailsNotInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| emails | Emails separated by comma. |
| redirect | Route name to redirect if equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserLoggedInEmailsNotInMiddleware([
                                                       'emails' => 'jack@flextype.org, sam@flextype.org'
                                                       'redirect' => 'another.route.name']));
```

#### Name
`AclIsUserLoggedInUuidNotInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| uuids | Uuids separated by comma. |
| redirect | Route name to redirect if equal |

**Example:**
```
flextype()->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclIsUserLoggedInUuidNotInMiddleware([
                                                     'uuids' => 'ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2'
                                                     'redirect' => 'another.route.name']));
```

### Restrict access in the entries frontmatter

You may restrict access for specific users to your entry(entries) in the entry(entries) frontmatter.

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    acl:
      accounts:
        roles: student, admin
        emails: jack@flextype.org, sam@flextype.org
        uuids: ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2
    ---
    Lesson content is here...


### Restrict access in the entries content and in any other entry custom field.

You may restrict access for specific users to your specific content inside the entry by using shortcodes.

#### Show private content for logged in users

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedIn]
        Lesson content is here...
    [/userLoggedIn]


#### Show private content for users with roles: admin and student

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInRolesIn roles="admin, student"]
        Private content here..
    [/userLoggedInRolesIn]


#### Show private content for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInUuidIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]
        Private content here..
    [/userLoggedInUuidIn]


#### Show private content for users with emails jack@flextype.org, sam@flextype.org

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInEmailIn emails="jack@flextype.org, sam@flextype.org"]
        Private content here..
    [/userLoggedInEmailIn]


#### Show logged in email

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail]


#### Show logged in uuid

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail], your uuid: [userLoggedInUuid]


#### Show logged in roles

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail], your uuid: [userLoggedInUuid] and your roles: [userLoggedInRole]


#### Also you may use any of this shortcodes inside any entry fields:

Example:

`/project/entries/lessons/lesson-42.md`

    ---
    title: [userLoggedIn][userLoggedInEmail] - [/userLoggedIn]Lesson 42
    ---
    Public text here...

    [userLoggedIn]
        Private content here..
    [/userLoggedIn]


#### Show public content for not logged in users

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userNotLoggedIn]
        Public content for users is here...
    [/userNotLoggedIn]


#### Show public content for users with roles: admin and student

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInRolesNotIn roles="admin, student"]
        Public content for users is here...
    [/userLoggedInRolesNotIn]


#### Show public content for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInUuidNotIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]
        Public content for users is here...
    [/userLoggedInUuidNotIn]


#### Show public content for users with emails jack@flextype.org, sam@flextype.org

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---
    Public text here...

    [userLoggedInEmailNotIn emails="jack@flextype.org, sam@flextype.org"]
        Public content for users is here...
    [/userLoggedInEmailNotIn]


#### Show logged in email

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail]


#### Show logged in uuid

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail], your uuid: [userLoggedInUuid]


#### Show logged in roles

`/project/entries/lessons/lesson-42.md`

    ---
    title: Lesson 42
    ---

    Hello [userLoggedInEmail], your uuid: [userLoggedInUuid] and your roles: [userLoggedInRole]


#### Also you may use any of this shortcodes inside any entry fields:

Example:

`/project/entries/lessons/lesson-42.md`

    ---
    title: [userLoggedIn][userLoggedInEmail] - [/userLoggedIn]Lesson 42
    ---
    Public text here...

    [userLoggedIn]
        Private content here..
    [/userLoggedIn]

### Restrict access in the TWIG Templates

You may restrict access for specific users to your specific content inside the TWIG Templates.

#### Show private content for logged in users

```
{% if flextype.acl.isUserLoggedIn() %}
    Private content here..
{% else %}
    Public content for users is here...
{% endif %}
```

#### Show private content for users with roles: admin and student

```
{% if flextype.acl.isUserLoggedInRolesIn('admin, student') %}
    Private content here..
{% else %}
    Public content for users is here...
{% endif %}
```

#### Show private content for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

```
{% if flextype.acl.isUserLoggedInUuidIn('ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2') %}
    Private content here..
{% else %}
    Public content for users is here...
{% endif %}
```

#### Show private content for users with emails jack@flextype.org, sam@flextype.org

```
{% if flextype.acl.isUserLoggedInEmailIn('jack@flextype.org, sam@flextype.org') %}
    Public content for users is here...
{% else %}
    Public content for users is here...
{% endif %}
```

#### Show logged in email

```
Hello {{ flextype.acl.getUserLoggedInEmail() }}
```

#### Show logged in uuid

```
Hello {{ flextype.acl.getUserLoggedInEmail() }},
your uuid: {{ flextype.acl.getUserLoggedInUuid() }}
```

#### Show logged in roles

```
Hello {{ flextype.acl.getUserLoggedInEmail() }},
your uuid: {{ flextype.acl.getUserLoggedInUuid() }}
and your roles: {{ flextype.acl.getUserLoggedInRoles() }}
```

### Restrict access in the PHP

You may restrict access for specific users to your specific code in the PHP.

#### Run private code for logged in users

```php
if (flextype('acl')->isUserLoggedIn()) {
    // Private code here..
}
```

#### Run private content for users with roles: admin and student

```php
if (flextype('acl')->isUserLoggedInRolesIn('admin, student')) {
    // Private code here..
}
```

#### Run private code for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

```php
if (flextype('acl')->isUserLoggedInUuidIn('ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2') {
    // Private content here..
}
```

#### Run private code for users with emails jack@flextype.org, sam@flextype.org

```php
if (flextype('acl')->isUserLoggedInEmailIn('jack@flextype.org, sam@flextype.org')) {
    // Private content here..
}
```

#### Show logged in email

```php
echo 'Hello ' . flextype('acl')->getUserLoggedInEmail();
```

#### Show logged in uuid

```php
echo 'Hello ' . flextype('acl')->getUserLoggedInEmail();
echo 'your uuid: ' . flextype('acl')->getUserLoggedInUuid();
```

#### Show logged in roles

```php
echo 'Hello ' . flextype('acl')->getUserLoggedInEmail();
echo 'your uuid: ' . flextype('acl')->getUserLoggedInUuid();
echo 'and your roles: ' . flextype('acl')->getUserLoggedInRoles();
```
