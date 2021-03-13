---
title: Flextype 0.9.0 release
tags: release
template: blog-post
published_at: '14-06-2019 09:46'
author:
  name: Sergey Romanenko
---

### Added
- Flextype Core: Slim Framework Integration!
- Flextype Core: Twig Template Engine Integration!
- Flextype Core: Whoops Error Handler Integration!
- Flextype Core: Monolog library Integration!
- Flextype Core: Slugify library Integration!
- Flextype Core: Complete Glide/Intervention Image Implemented for Image manipulation on fly!
- Flextype Core: New Event handler from The League of Extraordinary Packages for better event handling.
- Flextype Core: New Entries API
- Flextype Core: New Fieldsets API
- Flextype Core: New Snippets API
- Flextype Core: New Plugins API
- Flextype Core: New JSON Parser instead of old YAML Parser.
- Flextype Core: Using new languages files format and JSON extension instead of YAML.
- Flextype Core: Using JSON extension instead of YAML for all kind of data to store.
- Flextype Core: New CSRF service for better cross-site request forgery protection.
- Flextype Core: composer.json ext-json and ext-mbstring added into require section.
- Flextype Core: composer.json suggest section added.
- Flextype Core: composer.json: apcu-autoloader added for APCu cache as a fallback for the class map.
- Flextype Site: New plugin Site added.
- Flextype Core: Respect Validation - The most awesome validation engine ever created for PHP - added.
- Flextype Admin Panel: New admin panel plugin based on Slim Framework.
- Flextype Admin Panel: Fieldset Sections(groups) added.
- Flextype Admin Panel: New Field types - select, editor (instead of html)

### Changed
- Flextype Core: Thunderer Shortcodes don't parse fields by default, need to use filter.
- Flextype Core: Thunderer Shortcodes updated to 0.7.2.
- Flextype Core: Flextype Components Arr updated to 1.2.5
- Flextype Core: Flextype Components Number updated to 1.1.0
- Admin Panel: Bootstrap updated to 4.3.1
- Admin Panel: Codemirror updated to 5.43.0
- Admin Panel: Trumbowyg updated to 2.18.0
- Admin Panel: Settings Manager - locales list - improvements!

### Fixed
- Admin Panel: Translates fixes.
- Admin Panel: Issue with js error for codemirror - fixed.
- Flextype Core: Plugins API - issue with plugins list fixed.

### Removed
- Flextype Admin Panel: Menus Manager removed.
- Flextype Core: YAML Parser removed.
- Flextype Core: Symfony YAML Component removed.
- Flextype Core: Flextype Token Component removed.
- Flextype Core: Flextype Notification Component removed.
- Flextype Core: Flextype Error Handler Component removed.
- Flextype Core: Flextype Event Component removed.
