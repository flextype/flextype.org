---
title: Flextype 0.9.6 release
tags: release
template: blog-post
published_at: '01-12-2019 09:46'
author:
  name: Sergey Romanenko
---

### Bug Fixes

* **admin-plugin:** fix issue with saving entry source #251
* **admin-plugin:** fix file browser styles
* **admin-plugin:** fix breadcrumbs for theme templates
* **core:** Entries API - fix Collection Undefined Index(s) for fetchAll method #243
* **core:** fix broken logic for form inputs without labels #274
* **core:** fix default and site settings loading #297
* **core:** fix id's names for all generated fields #277
* **core:** fix notice undefined index: created_at in Entries API
* **core:** fix notice undefined index: published_at in Entries API #265
* **core:** fix Plugins API - createPluginsDictionary method and increase app perfomance #259
* **core:** fix state of active tabs for all generated forms #276
* **core:** fix state of aria-selected for all generated forms #275  


### Features

* **core:** add ability to hide title for hidden fields #240
* **core:** add new public method delete() for Cache #308
* **core:** add CacheTwigExtension #309  

    usage in templates:
    ```
    {{ cache.CACHE_PUBLIC_METHOD }}
    ```

* **core:** add ability to override plugins default manifest and settings #224
* **core:** add ability to override themes default manifest and settings #256
* **core:** add ability to set help text for generated form controls #283  

    usage in fieldsets:
    ```
    help: "Help text here"
    ```

* **core:** add ability to store entry system fields in entries create method #247
* **core:** add alternative comparison syntax for Entries API  

    Alternative comparison syntax:
    ```
    eq - Equals
    neq - Not equals
    lt - Lower than
    lte - Lower than or equal to
    gt - Greater than
    gte - Greater than or equal to
    ```  
    docs: https://docs.flextype.org/themes/entries-fetch

* **core:** add `json_encode` and `json_decode` twig filter #289  

    usage in templates:
    ```
    // Result: {"title": "Hello World!"}
    {{ {'title': 'Hello World!'}|json_encode }}

    // Result: Hello World!
    {{ '{"title": "Hello World!"}'|json_decode.title }}
    ```

* **core:** add parser twig extension #262
* **core:** add new field property `default` instead of `value` #303
* **core:** add `yaml_encode` and `yaml_decode` twig filter #290  

    usage in templates:
    ```
    // Result: title: 'Hello World!'
    {{ {'title': 'Hello World!'}|yaml_encode }}

    // Result: Hello World!
    {{ 'title: Hello World!'|yaml_decode.title }}
    ```

* **core:** Markdown parsing should be cached in production #287
* **core:** YAML parsing will be cached in production #263
* **core:** Refactor entries fetch methods naming #315  

    we have:  
    `fetch` - for single and collection entries request  
    `fetchSingle` - for single entry request.   
    `fetchCollection` - for collection entries request.  

* **core:** add routable option for entries #284  

    usage in entry:
    ```
    routable: false
    ```
    by default `routable` is `true`

* **admin-plugin:** add help text for common form controls #280
* **admin-plugin:** add icons for settings tabs sections #293
* **admin-plugin:** hide textarea control for codemirror editor #279
* **admin-plugin:** show themes title instead of themes id's on settings page #187
* **admin-plugin:** add ability to set individual icons #250
* **admin-plugin:** add ability to set individual icons for plugins #255
* **admin-plugin:** add ability to work with entry custom fieldset #246
* **admin-plugin:** add individual icons for snippets #253
* **admin-plugin:** add individual icons for templates and partials #254
* **admin-plugin:** add plugins settings page #258
* **admin-plugin:** add themes settings page #296
* **admin-plugin:** show message on plugins page if no plugins installed #294
* **admin-plugin:** use dots icon for actions dropdown #292
* **admin-plugin:** add auto generated slugs from title field #305
* **admin-plugin:** add help tooltips #306
* **admin-plugin:** store Entires/Collections counter in cache #203
* **admin-plugin:** YAML parsing will be cached in production #263
* **admin-plugin:** add ability to hide fieldsets from entries type select #304  

    usage in fieldsets:
    ```
    hide: true
    ```
    by default `hide` is `false`

* **site-plugin:** add routable option for entries #284  


### Performance Improvements

* **core:** add realpath_cache_size to .htaccess
* **core:** improve Plugins API - locales loading and increase app performance #259
* **core:** improve Cache on production and increase app performance #290 #263  


### Vendor Updates
* **core:** Update vendor flextype-components/date to 1.0.0
* **core:** Update vendor symfony/yaml to 4.4.0
* **core:** Update vendor doctrine/cache to 1.10.0
* **core:** Update vendor doctrine/collections to 1.6.4
* **core:** Update vendor monolog/monolog to 3.12.3
* **core:** Update vendor bootstrap to 4.4.1
* **admin-plugin:** Update vendor bootstrap to 4.4.1
* **admin-plugin:** Update vendor trumbowyg to 2.20.0  


### BREAKING CHANGES

* **core:** method fetchAll removed! please use `fetch`, `fetchSingle` or `fetchCollection`
* **core:** changed and_where & or_where execution in the templates  

    FROM

    ```
    'and_where': {

    }

    'or_where': {

    }
    ```

    TO

    ```
    'and_where': [
        {

        }
    ]

    'or_where': [
        {

        }
    ]
    ```

* **core:** Rename property `value` to `default` for all fieldsets where it is used.
