---
title: Flextype 0.9.2 release
tags: release
template: blog-post
published_at: '06-07-2019 09:46'
author:
  name: Sergey Romanenko
---

### Added
- Flextype Default Theme: pagination for blog entries added. #164 #165
- Flextype Default Theme: New templates for entry Gallery - added. #165
- Flextype Core: New Shortcode `[raw][registry_get][/raw]` - added. #165
- Flextype Core: New entry Gallery - added. #165
- Flextype Core: New fieldsets for entry Gallery - added. #165
- Flextype Core: Doctrine Collections - added. #175 #165
- Flextype Core: GlobalVarsTwigExtension - new variable - `PHP_VERSION` - added. #165
- Flextype Core: FilesystemTwigExtension - new function `filesystem_get_files_list` added. #165
- Flextype Core: Snippets - new snippet `google-analytics` added. #165
- Flextype Core: Fieldsets Content - menu_item_target fixed. #165
- Flextype Admin Panel: Show nice message if there is no items for current area. #158 #165
- Flextype Admin Panel: Tools - added. #170 #165
- Flextype Admin Panel: Tools - Cache area added. #170 #165
- Flextype Admin Panel: Tools - Registry area added. #170 #165
- Flextype Admin Panel: Themes manager added. #171 #165
- Flextype Admin Panel: New Translates added. #165

### Changed
- Flextype Core: All Twig Extensions - refactored and updated. #165
- Flextype Core: Entries - new params `$id` and `$args` for `fetchAll()` method. #165
- Flextype Core: Entries - fetching methods updated and ready to work with Collections. #175 #165
- Flextype Core: Snippets Shortcode - renamed `snippets_fetch` to `snippets_exec`. #165
- Flextype Admin Panel: Entires - improved styles for fieldsets tabs. #165
- Flextype Admin Panel: Entires - styles for Fieldsets tabs improved #165
- Flextype Admin Panel & Flextype Core: Settings improvements #153 #165
- Flextype Admin Panel: Entries - show entry slug if entry default field is empty. #165
- Flextype Admin Panel: Stay on current page after saving. #155 #165

### Fixed
- Flextype Core & Admin and Default theme: wrong `emmiter_emmit` renamed to correct `emitter_emit` #165
- Flextype Admin Panel: Entries - issues with hardcoded admin url - fixed. #165
- Flextype Admin Panel: Entries - `PATH_FIELDSETS` used instead of hardcoded path. #165
- Flextype Admin Panel: fix all tabs state for Fieldsets, Snippets, Templates areas. #165
- Flextype Admin Panel: Entries - move functionality issues #179 #165

### Removed
- Flextype Admin Panel: Left Navigation - documentation link - removed #165

### Update from Flextype 0.9.1 to Flextype 0.9.2
1. Backup your Site First!
2. Download flextype-0.9.2.zip
3. Unzip the contents to a new folder on your local computer.
4. Upload /flextype/, /vendor/, /site/plugins/admin/, /site/plugins/site/, /site/themes/default/ with an FTP client to your host.
