---
title: Flextype 0.9.1 release
tags: release
template: blog-post
published_at: '18-06-2019 09:46'
---

### Added
- Flextype Admin Panel: new setting `route` added to customize admin base route. #154
- Flextype Core: GlobalVarsTwigExtension - new global constant `PATH_FIELDSETS` added. #154
- Flextype Core: Entries API - public property `$entry` added. #154
- Flextype Core: Entries API - public property `$entries` added. #154
- Flextype Core: Entries API - new event `onEntryAfterInitialized` added. #154
- Flextype Core: Entries API - new event `onEntriesAfterInitialized` added. #154
- Flextype Core: Shortcodes - `EntriesShortcode` added. #154
- Flextype Core: Shortcodes - `BaseUrlShortcode` added. #154
- Flextype Core: Snippets - SnippetsTwigExtension: `snippets_exec()` added. #154
- Flextype Core: Snippets - `[snppets_fetch]` shortcode added. #154
- Flextype Core: Snippets - `_exec_snippet()` method added. #154
- Flextype Core: Snippets - `exec()` method added. #154
- Flextype Core: Snippets - added ability to access $flextype and $app inside snippets. #154
- Flextype Core: GlobalVarsTwigExtension `FLEXTYPE_VERSION` added. #154
- Flextype Site Plugin: public property `$entry` added. #154
- Flextype Site Plugin: new event `onSiteEntryAfterInitialized` added. #154

### Fixed
- Flextype Core: Entries API - `fetchALL()` issue with fetching entries recursively fixed. #154 #161

### Changed
- Flextype Site: code refactoring. #154
- Flextype Admin Panel: code refactoring. #154
- Flextype Core: Snippets - from now we will set prefix `bind_` for all variables. #154

### Removed
- Flextype Core: Entries API - remove unused Shortcodes code from method `fetch()` #162
- Flextype Core: Shortcodes - `SiteUrlShortcode` removed. #154
- Flextype Core: Snippets - `SnippetsTwigExtension`: snippet removed. #154
- Flextype Core: Snippets - `[snippets]` shortcode removed. #154
- Flextype Core: Snippets - `_display_snippet()` method removed. #154
- Flextype Core: Snippets - `- display()` method removed. #154
- Flextype Core: GlobalVarsTwigExtension `flextype_version` removed. #154
