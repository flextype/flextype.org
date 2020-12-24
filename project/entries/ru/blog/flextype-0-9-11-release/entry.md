---
title: Flextype 0.9.11 — релиз!
tags: релиз
template: blog-post
published_at: '26-08-2020 09:46'
author:
  name: Sergey Romanenko
---

**Дорогие Друзья!**

Рад вам сообщить о выходе новой версии движка Flextype 0.9.11!  

Добавлено  
* Новый способ доступа ко всему функционалу движка, а также регистрации нового через хелпер функцию flextype()

Исправлено  
* Исправлен баг в ядре
Cannot access protected property Flextype\App\Foundation\Flextype::$container
* Исправлен баг в ядре
Cannot use object of type Flextype\App\Foundation\Flextype as array
* Исправлен баг в медиа при загрузке изображений
Media exif_read_data warning - File not supported
Рефакторинг
* удалена переменная $flextype в инициализации плагинов.
* удален лишний код из метода fetchCollection()
* добавлена дополнительная проверка для getTimestamp() в методе getCacheID()

Подробнее c полным списком изменений, а так же о процедуре обновления 0.9.10 > 0.9.11 можно ознакомится здесь:
[https://github.com/flextype/flextype/releases/tag/v0.9.11](https://github.com/flextype/flextype/releases/tag/v0.9.11)
