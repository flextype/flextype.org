---
title: Flextype 0.9.3 — релиз!
tags: релиз
template: blog-post
published_at: '07-07-2019 09:46'
---

Дорогие Друзья!


Рад вам сообщить о выходе новой версии движка Flextype 0.9.3

### Исправлено
- Flextype Core: Entries - испрален баг с binding arguments в методе fetchAll() #182
- Flextype Core: Entries - исправлен баг с возможным логическим false результатом метода Filesystem::getTimestamp() в fetchAll() #182
- Flextype Core: Entries - исправлен баг с возможным логическим false результатом метода Filesystem::getTimestamp() в fetch() #182
- Flextype Admin Panel: исправлена критическая уязвимость в возможности регистрации нескольких админов #183 #182
- Flextype Admin Panel: исправлен баг с отображением текущего состояния активных пунктов меню для менеджера тем #182
- Flextype Default Theme: исравлен баг `TypeError: undefined is not an object` для лайтобокса #182
- Flextype Default Theme: исправлена превьюшка для темы Default #182

**Скачать**
https://github.com/flextype/flextype/releases/tag/v0.9.3


**Обновление с Flextype 0.9.2 до Flextype 0.9.3**
1. Сделать полный бекап сайта!
2. Скачать flextype-0.9.3.zip
3. Распаковать содержимое архива.
4. Загрузить на сервер /flextype/, /vendor/, /site/plugins/admin/, /site/plugins/site/, /site/themes/default/
