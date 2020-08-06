---
title: Flextype 0.9.6 — релиз!
tags: релиз
template: blog-post
published_at: '30-11-2019 09:46'
---

Дорогие Друзья!

Рад вам сообщить о выходе новой версии движка Flextype 0.9.6!

Более двух месяц работы над новой версией движка и почти 300 часов программирования и тестирования!
Основное отличнее Flextype 0.9.6 от 0.9.5 - это улучшение производительности в разы! Flextype всегда была быстрой системой, но новая Flextype 0.9.6 еще быстрее! Быстрее в 12 - 14 раз!

С помощью backfire.io было найдено несколько критических мест, которые оказывали влияние на производительность системы в целом.

Было проведено несколько тестов и сравнений производительности с другим Flat File CMS, Flextype 0.9.6 быстрее их в разы! Новая Flextype 0.9.6 отдает одну страницу из 100 000 тысяч страниц за доли миллисекунд!

### 1 — Улучшение производительности в 12 — 14 раз!

Новая Flextype 0.9.6 отдает одну страницу из 100 000 тысяч страниц за доли миллисекунд, что нельзя сказать например о Grav CMS.

Секрет такой высокой производительности Flextype, в том что Flextype не загружает всю базу данных страниц в память при каждом запросе к странице (не понимаю зачем вообще так делать ?!), а загружает лишь запрашиваемую страницу. Flextype загружает толко то что вы запрашиваете и ничего лишнего. Так же прирост производительности получается благодаря сохранению результат парсинга YAML, Markdown, JSON в кэше!

Да, YAML - удобный и легко читаемый язык для работы с данными, но его парсинг занимает большое количество времени, особенно когда данных достаточно много и в Flextype 0.9.6 эта проблема решается с помощью кэша по ключу генерируемого на основе передаваемого контента. Сохраняем результаты работы парсеров и получаем дополнительный прирост производительности :)

Вот такие результаты теста производительности: Flextype 0.9.6 vs Grav 1.7.0-rc.1!

БД из 100 000 страниц! Размер БД - 700mb!
Запрашиваемую страницу Flextype мне отдал отдал за 269ms!
в то время как Grav просто разогрел мой МакбукПро до 100℃ градусов и ничего мне не отдал :(

Страшно вообще тестировать выборку страниц из большой коллекции в Grav.

Как видите, Flextype 0.9.6 очень шустрая Flat File CMS и она быстрее своих конкурентов в разы!

Для уточнения!
Тест проводился на запрос одной страницы из 100 000 страниц и Flextype 0.9.6 отлично с этой задачей справляется, но важно заметить, то что работа с коллекциями данных это непростая задача и ее решение крайне непростое!

Flextype практически мгновенно отдаст запрашиваемую страницу из 100 000 страниц, но вот выборка коллекции страниц из 100 000 страниц потребует дополнительной оптимизации со стороны пользователей(разработчиков) и со стороны Flextype над которыми я также работаю!

Итого: производительность Flextype уже возросла в 12 — 14 раз, но работа над улучшением производительности продолжается! Есть куда расти и есть что улучшать!

Для повышения производтельности в будущем необходимо будет еще раз пересмотерть работу с кешем на уровне ядра и реализовать stache_always_update функциональность, которая повысит в разы скорость загрузки страниц клиентской части сайта. Пересмотреть и отсечь двойные запросы к одним и тем же данным. Убрать всю графику из папок с entries (там должны быть только записи!) все что относится к assets должно храниться отдельно от страниц. Например в папке /site/assets/

### 2 — Редактирование и перезагрузка настроек плагинов и тем!

В Flextype 0.9.6 появилась возможность редактирования и перезагрузки настроек плагинов и тем оформления, которые идут по умолчанию с плагинами и темами.
Больше не будет необходимости лазить ручками в плагины и править их настройки прямо в их директориях, так как теперь все настройки можно перезаписать поверх или добавить новые.
В будущих версиях скорее всего появится интерфейс кнопок, вместо редактора настроек.
Также мы получаем еще один способ хранения глобальных переменных :)
Например, можно сохранить какие нибудь глобальные переменные в плагине site и потом использовать их глобально по сайту, вызывая их из реестра.

### 3 — Иконки для записей!

В Flextype 0.9.6 появилась возможность назначать индивидуальные иконки для записей и коллекций записей.
Так как записи в Flextype это нечто большее чем просто страницы - иконки позволят визуально выделить их в зависимости от их назначения 🤠

Теперь каталоги, отзывы и прочий функционал сайта созданный с помощью записей будут выделяться на фоне других записей (страниц) сайта.

### 4 — Улучшен интрефейс!
Интерфейс админки стал более минималистичнее и удобнее! Появились иконки во всех разделах админки и все кнопки действий спрятаны в выпадающие списки.

Также появились подсказки и автозаполнение полей!

### 5 — Упрощенная сборка!

В сборке начиная с Flextype 0.9.6 включено Flextype Core + Admin Panel Plugin + Site Plugin и всего одна главная страница!

Страницы, наборы полей, скрипты и графика необходимая для блога, галереи и тд. будут вынесены из сборки в отдельные решения: плагины, темы, скрипты или мануалы и гайды.
Если посмотреть успешные Headless решения - они всегда идут "голыми", но предлагают возможные варианты развертывания какого либо проекта: блога, каталога и тд. - и это по желанию каждого, но без принудительного навязывания.

Идея в том чтобы иметь чистую сборку, а проект на ней разворачивать уже под свои требования!

### 6 — Индивидуальные наборы полей для каждой страницы!

Flextype уже предоставляет возможность работы с индивидуальными полями для страниц/записей, но в Flextype 0.9.6 появилась возможность создавать индивидуальные поля и для каждой записи индивидуально! Набор индивидуальных полей записи можно хранить в поле `еntry_fieldset`


### 7 — Возможность работы с кешем в шаблонах!
В новой Flextype 0.9.6 появилась полноценная возможность работать с кешем в twig шаблонах. Это позволит оптимизировать производительность проекта на уровне шаблонов, например сохраняя результаты запросов или парсинга в кеше.

А также множество других улучшений и исправлений найденых багов: https://github.com/flextype/flextype/releases/tag/v0.9.6

**Скачать**
https://github.com/flextype/flextype/releases/tag/v0.9.6


### Обновление с Flextype 0.9.5 до Flextype 0.9.6
- Сделать полный бекап сайта!
- Скачать flextype-0.9.6.zip
- Распаковать содержимое архива.
- Внимательно прочитать список изменений и особенно раздел BREAKING CHANGES
- Загрузить на сервер /flextype/, /vendor/, /site/plugins/admin/, /site/plugins/site/, /site/themes/default/