---
title: Flextype 0.9.1 — релиз!
tags: релиз
template: blog-post
published_at: '18-06-2019 09:46'
author:
  name: Sergey Romanenko
---

**Дорогие Друзья!**

Рад вам сообщить о выходе новой версии движка Flextype 0.9.1


Изменения в Flextype 0.9.1


### Добавлено
- Flextype Admin Panel: добавлена новая опция route для легкой смены роута админки.
- Flextype Core: GlobalVarsTwigExtension - добавлена новая константа PATH_FIELDSETS
- Flextype Core: Entries API - добавлена новая публичная проперти $entry
- Flextype Core: Entries API - добавлена публичная проперти $entries
- Flextype Core: Entries API - добавлено новое событие onEntryAfterInitialized
- Flextype Core: Entries API - добавлено новое событие onEntriesAfterInitialized
- Flextype Core: Shortcodes - добавлен новый шорткод[entries_fetch id="entry-id" field="field-name" default="default-value"] для отображения entries(записей) в EntriesShortcode
- Flextype Core: Shortcodes - добавлен новый шорткод[base_url] вместо [site_url] в BaseUrlShortcode
- Flextype Core: Snippets - В SnippetsTwigExtension добавлен новый метод snippets_exec()
- Flextype Core: Snippets - добавлен новый шорткод [snippets_fetch]
- Flextype Core: Snippets - добавлен новый метод _exec_snippet()
- Flextype Core: Snippets - добавлен новый метод exec()
- Flextype Core: Snippets - теперь $flextype и $app доступны в сниппетах.
- Flextype Core: GlobalVarsTwigExtension добавлена новая константа FLEXTYPE_VERSION
- Flextype Site Plugin: добавлена новая пуличная проперти $entry
- Flextype Site Plugin: добавлено новое событие onSiteEntryAfterInitialized

### Исправлено
- Flextype Core: Entries API исправлен критический баг в методе fetchALL()с получением вложенных записей. Также появился параметр bool $recursive который по умолчанию имеет значение false

### Изменено
- Flextype Site: общий рефакторинг кода.
- Flextype Admin Panel: общий рефакторинг кода.
- Flextype Core: Snippets теперь всем переменным, которые попадают в метод exec() добавляется префикс bind_

### Удалено
- Flextype Core: Entries API - удален ненужный код, который использовался раньше для обработки шорктодов в методе fetch()
- Flextype Core: Shortcodes - удален SiteUrlShortcode
- Flextype Core: Snippets - SnippetsTwigExtensio удален snippet
- Flextype Core: Snippets - удален шорткод [snippets]
- Flextype Core: Snippets - удален метод _display_snippet()
- Flextype Core: Snippets - удален метод display()
- Flextype Core: GlobalVarsTwigExtension удалена константа flextype_version

**Скачать:**
https://github.com/flextype/flextype/releases/tag/v0.9.1
