---
title: Flextype 0.9.2 — релиз!
tags: релиз
template: blog-post
published_at: '06-07-2019 09:46'
---

Дорогие Друзья!

Рад вам сообщить о выходе новой версии движка Flextype 0.9.2

Изменения в Flextype 0.9.2

### Добавлено
- Flextype Default Theme: Добавлена пагинация для блога. #164 #165
- Flextype Default Theme: Добавлен новый шаблон для страницы Gallery #164 #165
- Flextype Core: Новый шорткод `registry_get` #165
- Flextype Core: Новая страница Gallery. #165
- Flextype Core: Новый набор полей для страницы Gallery #165
- Flextype Core: Добавлены коллекции Doctrine Collections. #175 #165
- Flextype Core: GlobalVarsTwigExtension - Добавлена новая глобальная переменная - `PHP_VERSION`. #165
- Flextype Core: FilesystemTwigExtension — Добавлена новая функция `filesystem_get_files_list`. #165
- Flextype Core: Snippets - Добавлен новый снипет `google-analytics`. #165
- Flextype Core: Fieldsets Content - menu_item_target фикс. #165
- Flextype Admin Panel: Теперь выводится сообщение для всех страниц админки если нет записей в текущей области. #158 #165
- Flextype Admin Panel: Добавлена новая страница Tools/Инструменты #170 #165
- Flextype Admin Panel: Добавлена возможность работы с кешом индивидуально. В отдельной вкладе Сache #170 #165
- Flextype Admin Panel: Добавлена возможность просмотра значений реестра #170 #165
- Flextype Admin Panel: Добавлен менеджер тем. #171 #165
- Flextype Admin Panel: Добавлены новые переводы и исправлены текущие. #165

### Исправлено
- Flextype Core & Admin and Default theme: переименован `emmiter_emmit` на более коректное назание `emitter_emit` #165
- Flextype Admin Panel: Entries - удалены ссылки на админку, которые были грубо прописаны в самих шаблонах. #165
- Flextype Admin Panel: Entries - `PATH_FIELDSETS` теперь используется вместо прописанных путей в шаблонах #165
- Flextype Admin Panel: Исправлено состояния всех вкладок в админке для Fieldsets, Snippets, Templates areas. #165
- Flextype Admin Panel: Entries - Исправлен баг перемещением страниц/записей #179 #165
Изменено
- Flextype Core: Все Twig Extensions были переписаны и улучшены. #165
- Flextype Core: Entries — новые параметры `$id` and `$args` теперь принимает метод `fetchAll()`. #165
- Flextype Core: Entries - обновлены fetching методы и теперь и готовы к работе с коллекциями. #175 #165
- Flextype Core: Snippets Shortcode - переименован шорткод `snippets_fetch` в `snippets_exec`. #165
- Flextype Admin Panel: Entires - улучшены стили вкладок. #165
- Flextype Admin Panel: Entires - улучшены стили вкладок для наборов полей. #165
- Flextype Admin Panel & Flextype Core: улучшена работы с настройками, теперь большими настройками можно управлять прямо из админки. #153 #165
- Flextype Admin Panel: Entries - теперь отображается slug записи если небыло установлено поле по умолчанию. #165
- Flextype Admin Panel: Теперь после сохранения, кнопка сохранить перенаправляет на текущую страницу админки. #155 #165

### Удалено
- Flextype Admin Panel: Удалена ссылка на документацию.

**Скачать:**
https://github.com/flextype/flextype/releases/tag/v0.9.2

### Обновление с Flextype 0.9.1 доFlextype 0.9.2
- Сделать полный бекап сайта!
- Скачать flextype-0.9.2.zip
- Распаковать содержимое архива.
- Прочитать внимательно changlelog, так как есть breaking changes. Например из-за того что добавился функционал работы с коллекциями — обновился функционал метода fetchALL() и теперь правильно будет вот такentries.fetchAll('blog', {'order_by': {'field': 'date', 'direction': 'desc'}, 'set_max_result': '3'})
- Загрузить на сервер /flextype/, /vendor/, /site/plugins/admin/, /site/plugins/site/, /site/themes/default/
