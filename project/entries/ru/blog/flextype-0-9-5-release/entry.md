---
title: Flextype 0.9.5 — релиз!
tags: релиз
template: blog-post
published_at: '21-09-2019 09:46'
---

Дорогие Друзья!

Рад вам сообщить о выходе новой версии движка Flextype 0.9.5!

### Исправлено
- core: исправлена проблема с кешем в Entries API — fetchAll()
- core: исправлена проблема c генерацией Cache ID для Themes API
- core: исравлена пролема с emitter twig функцией
- admin-plugin: исправлены стили для кнопок Менеджера Тем
- admin-plugin: исправления переводов
- admin-plugin: исправлена ошибка возникающая если $query['format'] пустой

### Рефакторинг
- core: удалена переменная $response из Forms render метода
- core: добавлена свойство forms в Flextype\EntriesController

**Скачать**
https://github.com/flextype/flextype/releases/tag/v0.9.5
