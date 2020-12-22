---
title: Flextype 0.9.4 release
tags: release
template: blog-post
published_at: '11-09-2019 09:46'
author:
  name: Sergey Romanenko
---

### Added
* Flextype Core: Add ability to work with different types of content #212 #186
* Flextype Core: Add new filter `tr` for I18nTwigExtension #186
* Flextype Core: Add MARKDOWN, YAML and JSON parsers. #212 #186
* Flextype Core: Add YamlTwigExtension #186
* Flextype Core: Add ResponseTime Middleware #186
* Flextype Core: Add UUID (universally unique identifier) for all entries #197 #186
* Flextype Core: Add message for Glide if image not found #189 #186
* Flextype Core: Add victorjonsson/markdowndocs for generating markdown-formatted class documentation #186
* Flextype Core: Add custom callable resolver, which resolves PSR-15 middlewares. #213 #186
* Flextype Core: Add git commit message convention. #186
* Flextype Core: Add AuthMiddleware globally #201 #186
* Flextype Core: Add new twig options `debug` `charset` `cache` #186
* Flextype Core: Add new field `tags` #186
* Flextype Core: Add new field `datetimepicker` #186
* Flextype Core: Add block for all direct access to .md files in .htaccess #186
* Flextype Core: Add block access to specific file types for these user folders in .htaccess #186
* Flextype Core: Add new option date_display_format #186
* Flextype Admin Panel: Add Trumbowyg view html code #193 #186
* Flextype Admin Panel: Add tail section for base.html template #186
* Flextype Admin Panel: Add new event onAdminThemeFooter in base.html template #186
* Flextype Admin Panel: Add ability to set `published_at`, `created_at` for site entries #186
* Flextype Admin Panel: Add ability to set `created_by`, `published_by` for site entries #186
* Flextype Site Plugin: Add ability to get query params inside twig templates #186
* Flextype Site Plugin: Add ability to get entries in JSON Format #186
* Flextype Default Theme: Add ability to work with tags for default theme #186

### Fixed
* Flextype Core: Fix ShortcodesTwigExtension issue with null variables #186
* Flextype Core: Fix issue with bind_where expression for Entries fetchAll method #186
* Flextype Core: Fix issue with and_where expression for Entries fetchAll method #186
* Flextype Core: Fix issue with or_where expression for Entries fetchAll method #186
* Flextype Admin Panel: Fix dark theme for admin panel #186 #168

### Changed
* Flextype Core: Moving to PHP 7.2 #198 #186
* Flextype Core: JsonParserTwigExtension renamed to JsonTwigExtension #186
* Flextype Core: Twig json_parser_decode renamed to json_decode #186
* Flextype Core: Twig json_parser_encode renamed to json_encode #186
* Flextype Core: Default theme - update assets building process and GULP to 4.X.X #206 #186
* Flextype Core: Default theme - theme.json converted to theme.yaml #201 #186
* Flextype Core: Default theme - settings.json converted to settings.yaml #201 #186
* Flextype Core: Site entries move from JSON to FRONTMATTER (MD) #212 #186
* Flextype Core: Entries - use getDirTimestamp for fetchAll method #212 #186
* Flextype Core: Entries - change private `_file_location()` to public `getFileLocation()` #186
* Flextype Core: Entries - change private `_dir_location()` to public `getDirLocation()` #186
* Flextype Core: Snippets - change private `_file_location()` to public `getFileLocation()` #186
* Flextype Core: Snippets - change private `_dir_location()` to public `getDirLocation()` #186
* Flextype Core: Fieldsets - change private `_file_location()` to public `getFileLocation()` #186
* Flextype Core: Fieldsets - change private `_dir_location()` to public `getDirLocation()` #186
* Flextype Core: Update .gitignore
* Flextype Core: Update copyrights information
* Flextype Core: Update vendor flextype-components/filesystem to 2.0.6
* Flextype Core: Update vendor flextype-components/date to 1.1.0
* Flextype Core: Update vendor zeuxisoo/slim-whoops to 0.6.5
* Flextype Core: Update vendor doctrine/collections to 1.6.2
* Flextype Core: Update vendor slim/slim to 3.12.2
* Flextype Core: Update vendor respect/validation to 1.1.31
* Flextype Core: Update vendor monolog/monolog to 2.0.0
* Flextype Core: Update vendor symfony/yaml to 4.3.4
* Flextype Site Plugin: settings.json converted to settings.yaml #201 #186
* Flextype Site Plugin: plugin.json converted to plugin.yaml #201 #186
* Flextype Site Plugin: en_US.json and ru_RU.json converted to en_US.yaml and ru_RU.yaml #201 #186
* Flextype Admin Panel: Settings page improvements #186
* Flextype Admin Panel: Installation page improvements #194 #186
* Flextype Admin Panel: Entries editor page improvements #186
* Flextype Admin Panel: settings.json converted to settings.yaml #201 #186
* Flextype Admin Panel: plugin.json converted to plugin.yaml #201 #186
* Flextype Admin Panel: en_US.json and ru_RU.json converted to en_US.yaml and ru_RU.yaml #201 #186
* Flextype Admin Panel: JS decoupled in partials from base.html #186
* Flextype Admin Panel: field `editor` changed to `html` #186
* Flextype Admin Panel: improve admin settings page #186

### Removed
* Flextype Core: Remove `date` field #196 #186
* Flextype Admin Panel: Remove save button on the media page #225 #186
* Flextype Admin Panel: Remove unused css code #186
* Flextype Admin Panel: Remove unused js code #186
