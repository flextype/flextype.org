---
title: Flextype 0.8.0 release
tags: release
template: blog-post
published_at: '28-12-2018 09:46'
author:
  name: Sergey Romanenko
---

### Added
- Flextype Core: To improve engine flexibility was decided to use entity name Entries/Entry instead of entity name Pages/Page.
- Flextype Core: New folder `/site/entries/` added.
- Flextype Core: New entry variable `base_url` added.
- Flextype Core: Snippets functionality added.
- Flextype Core: New constant PATH['snippets'] added for Snippets.
- Flextype Core: New folder `/site/snippets/` added.
- Flextype Core: Menus functionality added.
- Flextype Core: New folder `/site/menus/` added.
- Flextype Core: Fieldsets functionality added.
- Flextype Core: Fallback functionality for settings added.
- Flextype Core: New settings item `accept_file_types` added.
- Flextype Core: Common PHP Overrides added to .htaccess
- Flextype Core: Custom YamlParser with native support to increase system performance added.
- Flextype Core: Ability to get hidden entries for method getEntries() added.
- Flextype Core: New setting options `entries.error404` for error404 page added.
- Admin Panel: Fieldsets Manager added.
- Admin Panel: Menus Manager added.
- Admin Panel: Snippets Manager added.
- Admin Panel: Templates Manager added.
- Admin Panel: Entries Manager with nice one level tree view for pages list added.
- Admin Panel: Português locale added.
- Admin Panel: General - trumbowyg - table plugin added.
- Flextype new Default Theme with predefined Fieldsets and Entries templates added.

### Changed
- Flextype Core: Plugins - Locales Array updated.
- Flextype Core: Form Components updated to 1.0.2.
- Flextype Core: Filesystem Components updated to 1.1.5.
- Flextype Core: Content - used new updated getFilesList() method.
- Flextype Core: Updated order of params in getEntries() method.
- Admin Panel: Settings Manager - display only available locales.
- Admin Panel: Profile Manager - improvements for profile look and feel.
- Admin Panel: Entries Manager - Form Genetator will not create labels for hidden inputs.
- Admin Panel: Plugins Manager - Get More Plugins button moved to the right.
- Admin Panel: General - trumbowyg editor styles updates.
- Admin Panel: General - trumbowyg updated to 2.13.0
- Admin Panel: Font Awesome updated to 5.6.3.
- Admin Panel: General - Messenger moved to to the bottom.
- Admin Panel: General - updates according to the php template syntax guidelines.
- Admin Panel: Pages Manager - use defined file types (extensions to be exact) that are acceptable for upload.

### Fixed
- Flextype Core: Content - Issue with returned value of Arr::sort() fixed.
- Admin Panel: General - translates fixes.
