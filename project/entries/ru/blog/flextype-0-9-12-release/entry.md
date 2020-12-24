---
title: Flextype 0.9.12 — релиз!
tags: релиз
template: blog-post
published_at: '07-12-2020 09:46'
author:
  name: Sergey Romanenko
---

**Дорогие Друзья!**

Рад вам сообщить от выходе новой версии движка Flextype 0.9.12!  

В Flextype 0.9.12 достаточно много важных изменений, которые улучшают работу ядра системы, а также упрощают его расширяемость!   

Было потрачено просто огромное количество человеко-часов на поиск новых технологий и решений, обновление функционала и его тестирование, а также разработку компонентов Atomastiс, которые идут вместе с Flextype 0.9.12!   

В целом для подготовки релиза Flextype 0.9.12 было потрачено:
* 3 месяца разработки и более 300 часов программирования и тестирования.
* Более 900 коммитов в репозитории проекта Flextype + Atomastic!

#### Новые возможности Entries API.

Flextype предлагает самый удобный и мощный функционал для работы с записями по сравнению с ее аналогами в том же Flat-File CMS сегменте.  

А новые возможности Entries API делают Flextype 0.9.12 еще более гибкой и мощной системой управления контентом.

В Flextype 0.9.12 появилась возможность перехвата и любые взаимодействия с Entries API с помощью событий и Flextype Entries Memory Storage (Flextype EMS)  

Flextype EMS — это временное хранилище данных в памяти (по типу реестра), которые хранит всю информацию о текущем состоянии Entries API и при помощи системы событий (Events) есть возможность перехватывать и взаимодействовать с состояниями Entries API на лету.  

Данные о состоянии Flextype EMS хранятся в приватном свойстве $storage класса Flextype\Foundation\Entries

Структура Flextype EMS:  

```php
$storage = [
    'fetch' => [
      'id' => '',
      'data' => '',
    ],
    'create' => [
      'id' => '',
      'data' => '',
    ],
    'update' => [
      'id' => '',
      'data' => '',
    ],
    'delete' => [
      'id' => '',
    ],
    'copy' => [
      'id' => '',
      'new_id' => '',
    ],
    'move' => [
      'id' => '',
      'new_id' => '',
    ],
    'has' => [
      'id' => '',
    ],
];
```

Взаимодействовать с Flextype EMS можно с помощью публичных методов `setStorage()` и `getStorage()` класса `Flextype\Foundation\Entries`

```php
/**
 * Set storage
 *
 * @param  string|null $key   Key.
 * @param  mixed       $value Value.
 */
public function setStorage(?string $key, $value): void

/**
 * Get storage
 *
 * @param  string|int|null $key     Key.
 * @param  mixed           $default Default value.
 */
public function getStorage($key, $default = null)
```

Пример взаимодействия с Flextype EMS

```php
flextype('emitter')->addListener('onEntryAfterInitialized', static function () : void {
    flextype('entries')->setStorage('fetch.data.title', 'New title');
});

$entry = flextype('entries')->fetchSingle('about');

echo $entry['title'];
```

Flextype EMS — это простая, но мощная функциональность для управления данными записей на лету!
но это еще не все!  

В Flextype 0.9.12 появилась возможность создавать макросы для Entries API! Благодаря макросам можно расширять базовую функциональность с помощью своих индивидуальных функций выполняющих специфичные задачи.  

Пример простого макроса для Entries API

```php
// Create new macros for entries to fetch recent posts
flextype('entries')::macro('fetchRecentPosts', function($limit = 10) {
	return flextype('entries')
      			->fetchCollection('blog')
      			->sortBy('published_at')
      			->limit($limit);
});

// Fetch recent posts
$recentPosts = flextype('entries')->fetchRecentPosts(5);
```

Подробная документация по макросам в Entries API здесь: [https://docs.flextype.org/en/core/entries#extending](https://docs.flextype.org/en/core/entries#extending)  

Круто ? но и это еще не все!  

В Flextype 0.9.12 функциональность для работы с запросами к записям была приведена к единому стандарту! Был удален метод fetch() и переработаны методы `fetchSingle()` и `fetchCollection()`  

```php
/**
 * Fetch single entry.
 *
 * @param string $id      Unique identifier of the entry.
 * @param array  $options Options array.
 *
 * @access public
 */
public function fetchSingle(string $id, array $options = []): Arrays

/**
 * Fetch entries collection.
 *
 * @param string $id      Unique identifier of the entries collecton.
 * @param array  $options Options array.
 *
 * @access public
 */
public function fetchCollection(string $id, array $options = []): Arrays
```

Методы `fetchSingle()` и `fetchCollection()` все также выполняют работу по выборке одиночных записей и коллекций записей. Однако теперь они возвращают не просто массив, а объект `Atomastic\Arrays\Arrays`, c которым можно взаимодействовать благодаря богатому функционалу Atomastic Arrays Component.  

Простой пример работы с `Atomastic\Arrays\Arrays` обьектом:  

```php
// Fetch random 10 posts created by Awilum and sort them by published_at field.
$posts = flextype('entries')
           ->fetchCollection('blog')
           ->where('author.name', 'eq', 'Awilum')
           ->sortBy('published_at')
           ->limit(10)
           ->random();
```

Функциональность Atomastic Arrays Component постояно улучшается и пополняется новыми полезными методами для работы с массивами данных.  

Подробная документация по этому компоненту доступа здесь: [https://github.com/atomastic/arrays](https://github.com/atomastic/arrays)

#### Макросы

Макросы — это простой способ расширения класса, без использования наследования, а через замыкание. Это означает, что все экземпляры этого класса будут иметь этот метод. В любом классе движка, который использует трейт Atomastic Macroable Component, могут быть применены макросы.  

Flextype 0.9.12 позволяет создавать макросы для следующих классов:

```
Flextype\Foundation\Entries
Flextype\Foundation\Plugins
Flextype\Foundation\Media\MediaFiles
Flextype\Foundation\Media\MediaFilesMeta
Flextype\Foundation\Media\MediaFolders
Flextype\Foundation\Media\MediaFoldersMeta
```

Подробная документация по макросам доступа здесь: [https://github.com/atomastic/macroable](https://github.com/atomastic/macroable)

#### Новый движок кеширования PHPFastCache

После долгих лет использования Doctrine Cache было принято решение перейти на современный движок кеширования PHPFastCache от разработчика Geo Lim.  

PhpFastCache - это простая в использовании и, тем не менее, мощная библиотека, которая предоставляет несколько API-интерфейсов, которые без особых проблем позволяют реализовать стратегию кэширования по вашему выбору.  

PhpFastCache поддерживает множество адаптеров, которые позволяют выбирать различные бэкенды кеширования, такие как Memcache, Redis, Mongodb, Couchdb, Redis, Riak и другие.  

Также можно написать свой вариант адаптера драйвера.  
В дополнение к базовым функциям библиотека PhpFastCache также предоставляет механизм событий, который позволяет реагировать на определенные события. Например, когда что-то будет удалено из кеша, можно поймать это событие и обновить или удалить соответствующие данные.  

Сайт проекта: [https://www.phpfastcache.com](https://www.phpfastcache.com)  
Автор проекта: [https://github.com/Geolim4](https://github.com/Geolim4)

#### Atomastic Components

В Flextype 0.9.12 используются современные, функциональные и покрытие тестами компоненты Atomastic, вместо морально устаревших Flextype Components и глючных компонентов от Doctrine Projects, которые не исправляются и не обновляются годами!  

Следующие Atomastic компоненты идут в ядре Flextype 0.9.12:  
Session - удобный объектно-ориентированный интерфейс для работы с сессиями.  
Filesystem - удобный объектно-ориентированный интерфейс для работы с файловой системой. Включает функционал для выборочного поиска файлов и директорий, а так же функционал для работы с директориями и файлами.  
Registry - удобный объектно-ориентированный интерфейс работающий по принципу патерна "Реестр", который был создан для глобального хранения данных и работы с ними в памяти прямо на лету.  
Strings - удобный объектно-ориентированный интерфейс для работы с мульти-байтовыми строками.  
Arrays - удобный объектно-ориентированный интерфейс для работы с c массивами данных.  
Macroable - трейт компонент, который позволяет расширять функциональность классов на лету благодаря макросам.  

Сайт проекта и документация: [https://atomastic.com](https://atomastic.com)  

#### Юнит тесты на PEST PHP  

Начиная с Flextype 0.9.12 ядро движка начинает покрываться тестами написаными с использованием фреймворка PEST PHP.  

PestPHP — фреймворк разработанный Nuno Maduro для написания юнит тестов под капотом которого лежит PHPUnit, но с упором на простоту.  

#### Удалены старые и неподдерживаемые библиотеки!

Так как Flextype 0.9.12 использует капотом современные и покрытые тестами компоненты Atomastic, из проекта были удалены такие устаревшие неподдерживаемые библиотеки как:  

```
flextype-components/session
flextype-components/cookie
flextype-components/number
flextype-components/filesystem
flextype-components/arrays
doctrine/collections
doctrine/cache
```

Подробнее c полным списком изменений, а так же о процедуре обновления 0.9.11 > 0.9.12 можно ознакомится здесь: [https://github.com/flextype/flextype/releases/tag/v0.9.12](https://github.com/flextype/flextype/releases/tag/v0.9.12)
