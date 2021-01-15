---
title: Accounts
description: Accounts plugins for Flextype.
icon:
  name: users
  set: fontawesome|solid
category: accounts
github: https://github.com/flextype-plugins/accounts
documentation: https://github.com/flextype-plugins/accounts
author:
  name: Sergey Romanenko
  email: sergey.romanenko@flextype.org
template: plugin
---

#### Features

* Built in predesigned and fully customizable pages: Accounts List, Login, Registration, Password Reset, Account Profile and Account Edit Profile.

#### Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/accounts`
3. Download Accounts Plugin and unzip plugin content to the folder `/project/plugins/accounts`
4. Copy all fieldsets from `/project/plugins/accounts/fieldsets` to `/project/fieldsets` folder.

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |

#### Routes
| Method | Route | Route Name | Description |
|---|---|---|---|
| GET | /accounts | `accounts.index` | Page with a list of registered accounts |
| GET | /accounts/login | `accounts.login` | Login page |
| GET | /accounts/registration | `accounts.registration` | Registration page |
| GET | /accounts/reset-password | `accounts.resetPassword` | Reset password page |
| GET | /accounts/profile/{email} | `accounts.profile` | Profile page |
| GET | /accounts/profile/{email}/edit | `accounts.profileEdit` | Profile page |
| POST | /accounts/profile/{email}/edit | `accounts.profileEditProcess` | Profile edit process |
| POST | /accounts/registration | `accounts.profileRegistrationProcess` | Profile registration process |
| POST | /accounts/login | `accounts.profileLoginProcess` | Profile login process |
| POST | /accounts/logout | `accounts.profileLogoutProcess` | Profile login process |
| POST | /accounts/reset-password | `accounts.resetPasswordProcess` | Reset password process |
| POST | /accounts/new-password/{email}/{hash} | `accounts.newPasswordProcess` | New password process |

#### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 80 | Accounts plugin priority |
| from.email | sergey.romanenko@flextype.org | From email |
| index.enabled | true | Allow accounts index `true` or `false` |
| registration.enabled | true | Allow user registration `true` or `false` |
| registration.default_roles | user | Default roles for new users |
| registration.default_state | enabled | Default state for new users |
| registration.redirect.route.name | accounts.login | Redirect route name after new user registered. |
| registration.redirect.route.link |  | Redirect link after new user registered. |
| login.enabled | true | Allow user login `true` or `false` |
| login.redirect.route.name | accounts.profile | Redirect route name after user logs in. |
| login.redirect.route.link | | Redirect link after user logs in. |
| profile.enabled | true | Allow user profile view `true` or `false` |
| profile_edit.enabled | true | Allow user profile edit `true` or `false` |
| profile_edit.redirect.route.name | accounts.profile | Redirect route name after user profile edited. |
| profile_edit.redirect.route.link | | Redirect link after user profile edited. |
| new_password.enabled | true | Allow user new password `true` or `false` |
| new_password.redirect.route.name | accounts.login | Redirect route name after new password was sended. |
| new_password.redirect.route.link | | Redirect link after new password was sended. |
| reset_password.enabled | true | Allow user reset password `true` or `false` |
| reset_password.redirect.route.name | accounts.login | Redirect route name after password was reset. |
| reset_password.redirect.route.link | | Redirect link after password was reset. |
| logout.redirect.route.name | accounts.login | Redirect route name after user logs out. |
| logout.redirect.route.link | | Redirect link after user logs out.|

#### Events

| Event | Description |
|---|---|
| onAccountsUserLoggedIn | Allows plugins to include their own logic when user logs in. |
| onAccountsNewPasswordSended | Allows plugins to include their own logic when new password was sended. |
| onAccountsPasswordReset | Allows plugins to include their own logic when password was reset. |
| onAccountsNewUserRegistered | Allows plugins to include their own logic when new was user registered. |
| onAccountsProfileEdited | Allows plugins to include their own logic when user profile edited. |
| onAccountsLogout | Allows plugins to include their own logic when user logs out. |
