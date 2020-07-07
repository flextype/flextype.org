---
title: Flextype 0.9.8 release
tags: release
template: blog-post
published_at: '14-05-2020 09:46'
---

### Features
* **core:** New lightweight and powerful core for kickass Applications!
* **core:** New Content Management API (CMA) for Entries. #421

    The Content Management API (CMA), is a read-write API for managing content.

    You could use the CMA for several use cases, such as:

    * Automatic imports from WordPress, Joomla, Drupal, and more.
    * Integration with other backend systems, such as an e-commerce shop.
    * Building custom editing experiences.

    Endpoints for Content Management API:
    | Method | Endpoint                     | Description          |
    | ------ | ---------------------------- | -------------------- |
    | GET    | /api/management/entries      | Fetch entry(entries) |
    | POST   | /api/management/entries      | Create entry         |
    | PATCH  | /api/management/entries      | Update entry         |
    | PUT    | /api/management/entries      | Rename entry         |
    | PUT    | /api/management/entries/copy | Copy entry(entries)  |
    | DELETE | /api/management/entries      | Delete entry         |

    API Tokens folder: /project/tokens/management/entries

* **core:** New Images API.

    | Method | Endpoint    | Description |
    | ------ | ----------- | ----------- |
    | GET    | /api/images | Fetch image |

    API Tokens folder: /project/tokens/images

* **core:** New Access API to create secret tokens for Content Management API (CMA).

    API Tokens folder: /project/tokens/access

* **core:** add Container for extending Flextype Container instead of Controller(s)
* **core:** add Application URL `url` into the common Flextype settings #405
* **core:** add new improved plugins sorting in the Plugins API.
* **core:** add dependencies validation for Plugins API #411
* **core:** add configurable CORS (Cross-origin resource sharing).

    ```
    cors:
      enabled: true
      origin: "*"
      headers: ["X-Requested-With", "Content-Type", "Accept", "Origin", "Authorization"]
      methods: [GET, POST, PUT, DELETE, PATCH, OPTIONS]
      expose: []
      credentials: false
    ```

* **core:** add manifest file `/src/flextype/config/flextype.yaml` for Flextype.
* **core:** add Serializer for data encoding/decoding and Parser for data parsing #424

### Bug Fixes

* **core:** fix incorrect data merging of manifest and settings for plugins and themes #404

### BREAKING CHANGES

* **core:** core decoupled in the plugins, and moved out of the Flextype release package!

    Install all needed plugins for your project by your self. Browse plugins: https://github.com/flextype-plugins

* **core:** new way for data merging of manifest and settings for plugins and themes #404

    for e.g. this is a wrong code to access site title:
    ```
    {{ registry.plugins.site.title|e('html') }}
    ```

    and this is a correct code to access site title:
    ```
    {{ registry.get('plugins.site.settings.title')|e('html') }}
    ```
* **core:** We should add app `url` into the core instead of `base_url` and `site_url` #405

    for e.g. this is a wrong code to access site url:
    ```
    {{ registry.plugins.site.url }}
    ```

    and this is a correct code to access app url:
    ```
    {{ registry.get('flextype.settings.url') }}
    ```

* **core:** new `project` folder instead of `site`

    - rename folder `site` into `project`
    - use new constant PATH['project'] instead of constant PATH['site']

* **core:** removed constants

    - PATH['plugins']
    - PATH['themes']
    - PATH['entries']
    - PATH['themes']
    - PATH['snippets']
    - PATH['fieldsets']
    - PATH['tokens']
    - PATH['accounts']
    - PATH['uploads']

* **core:** removed Snippets functionality

### Update from Flextype 0.9.7 to Flextype 0.9.8

1. Backup your Site First!
2. Read BREAKING CHANGES section!
3. Download flextype-0.9.8.zip
4. Unzip the contents to a new folder on your local computer.
5. Remove on your server this folders and files:
    ```
    /flextype/
    /vendor/
    /index.php
    ```
6. Upload on your server this folders and files:
    ```
    /src/
    /vendor/
    /index.php
    ```
7. Rename `/site/` to `/project/`
8. Clear browser cache!
9. Create CDA, CMA and Access tokens for your project using this [webpage](https://flextype.org/en/api-token-generator).
