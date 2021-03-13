---
title: Accounts Admin
description: Accounts Panel plugin for Flextype.
icon:
  name: users
  set: fontawesome|solid
category: accounts, admin
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
github: https://github.com/flextype-plugins/accounts-admin
documentation: https://github.com/flextype-plugins/accounts-admin
template: plugin
seo:
  title: Get Accounts Admin Plugin for Open Source Hybrid Content Management System
  description: Accounts Admin Plugin for Open Source Hybrid Content Management System
  keywords: Flextype Accounts Admin Plugin, Flextype CMS Accounts Admin Plugin, Headless CMS Accounts Admin Plugin, Download Flat File CMS Accounts Admin Plugin, Download Flat File Content Management System Accounts Admin Plugin, Download PHP CMS Accounts Admin Plugin, Accounts Admin Plugin, Plugin, Accounts Admin, Content, Management, System, PHP, CMS
---

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/accounts-admin`
3. Download Accounts Admin Plugin and unzip plugin content to the folder `/project/plugins/accounts-admin`
4. Copy all fieldsets from `/project/plugins/accounts-admin/fieldsets` to `/project/fieldsets` folder.

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |

#### Events

| Event | Description |
|---|---|
| onAccountsAdminUserLoggedIn | Allows plugins to include their own logic when user logs in. |
| onAccountsAdminNewPasswordSended | Allows plugins to include their own logic when new password was sended. |
| onAccountsAdminPasswordReset | Allows plugins to include their own logic when password was reset. |
| onAccountsAdminNewUserRegistered | Allows plugins to include their own logic when new was user registered. |
| onAccountsAdminProfileEdited | Allows plugins to include their own logic when user profile edited. |
| onAccountsAdminLogout | Allows plugins to include their own logic when user logs out. |
