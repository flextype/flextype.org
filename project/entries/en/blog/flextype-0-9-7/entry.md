---
title: Flextype 0.9.7 release
tags: release
template: blog-post
published_at: '03-03-2020 09:46'
author:
  name: Sergey Romanenko
---

### Features
* **core:** add Delivery API's for Entries, Images and Registry. #159

    Use Flextype as a Headless CMS with the full power of the Admin Panel.
    Build a Websites and Apps with a technology you are familiar with.

    Endpoints for Delivery API's:
    ```
    /api/delivery/entries
    /api/delivery/images
    /api/delivery/registry
    ```

* **core:** add new core constants `PATH['tokens']`, `PATH['accounts']`, `PATH['logs']`, `PATH['uploads']`
* **core:** add new locales support Persian, Indonesian, Galician #327
* **core:** add alternative comparison syntax for Entries API  

    Alternative comparison syntax:
    ```
    != - Not equals to
    like - Contains the substring
    ```

* **core:** set entries field `routable`=`true` on new entry creation #320
* **core:** use `array_merge()` instead of `array_replace_recursive()` for entries update method.
* **core:** initialize plugins before themes #323
* **core:** update Cache to use adapter to retrieve driver object #341
* **core:** load Shortcodes extensions based on `flextype.shortcodes.extensions` array #352
* **core:** load Twig extensions based on flextype.twig.extensions array #351
* **core:** add new Global Vars `PATH_ACCOUNTS`, `PATH_UPLOADS`, `PATH_TOKENS`, `PATH_LOGS` for Twig.
* **default-theme:** Moving to Tailwind CSS from Twitter Bootstrap #356
* **site-plugin:** add ability to set custom site url, new shortcode `[site_url]` and twig var `{{ site_url }}`
* **form-plugin:** add new Form plugin for forms handling instead of core Forms API.
* **icon-plugin:** add new Icon plugin for Font Awesome icons set.

    usage in templates:
    ```
    <i class="icon">{{ icon('fab fa-apple') }}</i>
    ```

    usage in entries content:
    ```
    [icon value="fab fa-apple"]
    ```

* **(site-plugin):** add ability to access `uri` variable in the theme templates.

    usage in templates:
    ```
    {{ uri }}
    ```

* **admin-plugin:** add RTL support for URLs #62

    /site/config/plugins/admin/settings.yaml
    ```
    ...
    entries:
      slugify: true # set `false` to disable slugify for entries
    ```

* **admin-plugin:** add ability to deactivate/activate all type of plugins. #211
* **admin-plugin:** add Confirmation Required modal for system plugins deactivation.
* **admin-plugin:** new Admin Panel UI with better UX and powered by Tailwind CSS.
* **admin-plugin:** new improved entries media manager page.
* **admin-plugin:** add ability to continue editing after saving in the editor.
* **admin-plugin:** add action `onAdminThemeTail` for admin panel `base` layout.
* **admin-plugin:** add ability to change entries view from `list view` to `table view`.

    /site/config/plugins/admin/settings.yaml
    ```
    ...
    entries:
      items_view_default: list # set `table` for table entries view
    ```

* **admin-plugin:** increase upload limit for `_uploadFile` from 3mb to 5mb
* **admin-plugin:** do not rewrite plugins and themes manifest with custom manifests.
* **admin-plugin:** add parsleys for frontend form validation.
* **admin-plugin:** add select2 for all select form controls.
* **admin-plugin:** add swal for all modals.
* **admin-plugin:** add flatpickr for date and time.
* **admin-plugin:** add tippy.js for all tooltips and dropdown menus.
* **admin-plugin:** add confirmation modals powered by swal for all critical actions.
* **admin-plugin:** add dim color for entries with `draft`, `hidden` and `routable`=`false` status #324
* **admin-plugin:** add ability to select entry type in the nice modal on entry creation. #331
* **admin-plugin:** add new setting `entries.items_view_default` with default value `list`.
* **admin-plugin:** add ability for redirect to the editor after creating #343
* **admin-plugin:** add ability to create default API tokens on installation process.
* **admin-plugin:** add ability to use local SVG version of Font Awesome Icons #322

    usage in templates:
    ```
    <i class="icon">{{ icon('fas fa-ellipsis-h') }}</i>
    ```

### Bug Fixes

* **core:** fix discord server link #325
* **core:** fix issue with system fields data types in the Entries API #383
* **admin-plugin:** fix issue for creating entry process with same IDs #333
* **admin-plugin:** fix redirect for entries after edit process.
* **admin-plugin:** fix issues with routable field on entry edit process.

### Refactoring

* **core:** move `/site/cache directory` to the `/var/cache` #347
* **core:** remove Forms API from Flextype core #360
* **admin-plugin:** improve Gulp configuration for better assets building.
* **default-theme:** improve Gulp configuration for better assets building.
* **core:** simplify logic for themes initialization process, remove extra checks for theme setting is `enabled` or not.
* **admin-plugin:** move templates from `views` folder into the `templates` folder #347
* **admin-plugin:** remove unused namespaces in EntriesContoller #347
* **admin-plugin:** remove complex logic for themes activation process.
* **admin-plugin:** add `ext-gd` to the require section of composer.json #347
* **admin-plugin:** add `ext-fileinfo` to the require section of composer.json #347
* **admin-plugin:** add `ext-dom` to the require section of composer.json #347
* **admin-plugin:** add `ext-spl` to the require section of composer.json #347
* **default-theme:** remove `enabled` option from theme settings.

### Vendor Updates
* **core:** Update vendor monolog/monolog to 2.0.2
* **core:** Update vendor cocur/slugify to 4.0.0
* **core:** Update vendor thunderer/shortcode to 0.7.3
* **core:** Update vendor ramsey/uuid to 3.9.2

### BREAKING CHANGES

* **core:** accounts moved to their specific folders.

    for e.g.
    ```
    /accounts/admin.yaml => /accounts/admin/profile.yaml
    ```

* **core:** remove Debug, Html and Form Flextype Components.
* **core:** all images links should be updated
    ```
    http://docs.flextype.org/en/content/media
    ```
* **core:** core and plugin settings keys renamed
    ```
    For all core settings:
    settings.* => flextype.*

    For all site settings:
    settings.title => plugins.site.title
    settings.description => plugins.site.description
    settings.keywords => plugins.site.keywords
    settings.robots => plugins.site.robots
    settings.author.email => plugins.site.author.email
    settings.author.name => plugins.site.author.name
    ```

* **admin-plugin:** remove Twitter Bootstrap from Admin Panel and Default Theme.
* **admin-plugin:** remove user profile page `/admin/profile`
* **admin-plugin:** method `getUsers()` renamed to `getUsersList()` in UsersController.


### Update from Flextype 0.9.6 to Flextype 0.9.7

- Backup your Site First!
- Read BREAKING CHANGES release section!
- Download flextype-0.9.7.zip
- Unzip the contents to a new folder on your local computer.
- Remove on your server this folders and files:
  - /flextype/
  - /vendor/
  - /site/accounts/
  - /site/config/
  - /site/cache/
  - /site/plugins/admin/
  - /site/plugins/site/
  - /site/themes/default/
  - /index.php
- Upload on your server this folders and files:
  - /flextype/
  - /vendor/
  - /site/plugins/admin/
  - /site/plugins/site/
  - /site/plugins/icon/
  - /site/plugins/form/
  - /site/themes/default/
  - /index.php
- Clear browser cache!
- Go to YOUR_SITE_URL/admin url and create new user account.

---
[Flextype 0.9.7](https://github.com/flextype/flextype/compare/v0.9.6...v0.9.7) (1463 commits and more than 400h for development and testing!)
