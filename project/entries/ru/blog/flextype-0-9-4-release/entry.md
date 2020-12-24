---
title: Flextype 0.9.4 — релиз!
tags: релиз
template: blog-post
published_at: '12-09-2019 09:46'
author:
  name: Sergey Romanenko
---

Дорогие Друзья!

Рад вам сообщить о выходе новой версии движка Flextype 0.9.4!


Было пересмотренно ранее принятое решение о целесообразности использования JSON формата для хранения данных. Пришел к выводу, о том что JSON крайне неудобный формат для Flat File CMS.
JSON формат только усложняет работу с контентом. Начиная с Flextype 0.9.4 — возвращаемся к работе в Jekyll подобному формату и работаем с другими форматами только по необходимости с помощью Parser. Также в Flextype 0.9.4 множество других важных изменений и улучшений, подробнее:

### Добавлено
- Flextype Core: Добавлена возможность работать с разными типами контента по требованию. Доступы MARKDOWN, YAML и JSON парсеры.
- Flextype Core: Добавлен новый фильтр `tr` для I18nTwigExtension
- Flextype Core: Добавлен MARKDOWN, YAML и JSON парсер.
- Flextype Core: Добавлен YamlTwigExtension
- Flextype Core: Добавлен ResponseTime Middleware
- Flextype Core: Добавлен UUID (universally unique identifier) для всех записей
- Flextype Core: Добавлено сообщение для Glide если изображения не найдено.
- Flextype Core: Добавлен victorjonsson/markdowndocs для генрации API документации в формате `MARKDOWN`
- Flextype Core: Добавлен custom callable resolver, для работы с PSR-15 middlewares.
- Flextype Core: Добавлен git commit message convention.
- Flextype Core: Добавлен AuthMiddleware глобально.
- Flextype Core: Добавлены новые настройки `debug` `charset` `cache` для шаблонизатора Twig.
- Flextype Core: Добавлено новое поле `tags`
- Flextype Core: Добавлено новое поле `datetimepicker`
- Flextype Core: Добавлена блокировка прямого доступа к файлам .md в .htaccess
- Flextype Core: Добавлена блокировка прямого доступа к специфичиским пользовательским файлам в .htaccess
- Flextype Core: Добавлена новая опция `date_display_format`
- Flextype Admin Panel: Добавлена возможность просмотра HTML кода в Trumbowyg.
- Flextype Admin Panel: Добавлена секция tail в base.html шаблоне.
- Flextype Admin Panel: Добавлено новое собоытие `onAdminThemeFooter` в base.html шаблоне.
- Flextype Admin Panel: Добавлены новые поля в записях `published_at`, `created_at`
- Flextype Admin Panel: Добавлена возможность записи `created_by`, `published_by` для всех записей.
- Flextype Site Plugin: Добавлена возможность рабоать с query параметрами в twig шаблонах
- Flextype Site Plugin: Добавлена возможность получения записей в формате JSON, если в конце запроса дописать `?format=json`
- Flextype Default Theme: Добавлена возможность рабоать с тегами.

### Исправлено
- Flextype Core: Исправлен баг в ShortcodesTwigExtension с null значением переменой.
- Flextype Core: Исправлена баг с выражением bind_where для Entries fetchAll метода.
- Flextype Core: Исправлена баг с выражением and_where для Entries fetchAll метода.
- Flextype Core: Исправлена баг с выражением or_where для Entries fetchAll метода.
- Flextype Admin Panel: Исправление стилей для темной и светлой темы админки.
- Изменено
- Flextype Core: Минимальная необходимая версия PHP 7.2!
- Flextype Core: JsonParserTwigExtension переименован в JsonTwigExtension
- Flextype Core: Twig json_parser_decode переименован в json_decode
- Flextype Core: Twig json_parser_encode переименован в json_encode
- Flextype Core: Default theme - обновлена сборка и GULP обновлен до 4
- Flextype Core: Default theme - theme.json конвертирован в theme.yaml
- Flextype Core: Default theme - settings.json конвертирован в settings.yaml
- Flextype Core: Site entries конвертирован JSON в FRONTMATTER (MD)
- Flextype Core: Entries - используется getDirTimestamp для fetchAll метода
- Flextype Core: Entries - приватный метод `_file_location()` перименован в публичный `getFileLocation()`
- Flextype Core: Entries - приватный метод `_dir_location()` перименован в публичный getDirLocation()`
- Flextype Core: Snippets - приватный метод `_file_location()` перименован в публичный `getFileLocation()`
- Flextype Core: Snippets - приватный метод `_dir_location()` перименован в публичный `getDirLocation()`
- Flextype Core: Fieldsets - приватный метод `_file_location()` перименован в публичный `getFileLocation()`
- Flextype Core: Fieldsets - приватный метод `_dir_location()` перименован в публичный getDirLocation()`
- Flextype Core: Обновлнен.gitignore
- Flextype Core: Обновлена информация о копирайтах.
- Flextype Core: Обновлена библиотека flextype-components/filesystem до версии 2.0.6
- Flextype Core: Обновлена библиотека flextype-components/date до версии 1.1.0
- Flextype Core: Обновлена библиотека zeuxisoo/slim-whoops до версии 0.6.5
- Flextype Core: Обновлена библиотека doctrine/collections до версии 1.6.2
- Flextype Core: Обновлена библиотека slim/slim до версии 3.12.2
- Flextype Core: Обновлена библиотека respect/validation до версии 1.1.31
- Flextype Core: Обновлена библиотека monolog/monolog до версии 2.0.0
- Flextype Core: Обновлена библиотека symfony/yaml до версии 4.3.4
- Flextype Site Plugin: settings.json конвертирован в settings.yaml
- Flextype Site Plugin: plugin.json конвертирован в plugin.yaml
- Flextype Site Plugin: en_US.json и ru_RU.json конвертированы в en_US.yaml и ru_RU.yaml
- Flextype Admin Panel: Улучшения интерфейса страницы настроек.
- Flextype Admin Panel: Улучшение интерфейса страницы установки.
- Flextype Admin Panel: Улучшение интерфейса редактора записей.
- Flextype Admin Panel: settings.json конвертирован в settings.yaml
- Flextype Admin Panel: plugin.json конвертирован в plugin.yaml
- Flextype Admin Panel: en_US.json и ru_RU.json конвертирован в en_US.yaml и ru_RU.yaml
- Flextype Admin Panel: JS вынесен из шаблона base.html в отдельные шаблоны.
- Flextype Admin Panel: Поле `editor` переименовано в `html`

### Удалено
- Flextype Core: Удалено поле записей `date`
- Flextype Admin Panel: Удалена кнопка сохранить на странице — Медиа.
- Flextype Admin Panel: Удалено большое количество неиспользуемого CSS и JS кода.


**Скачать**
https://github.com/flextype/flextype/releases/tag/v0.9.4
