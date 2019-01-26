<?php namespace Flextype ?>
<?php use Flextype\Component\{Event\Event, Http\Http, Registry\Registry, Assets\Assets, Text\Text, Html\Html} ?>
<!doctype html>
<html lang="<?= locale() ?>">
  <head>
    <meta charset="<?= Text::lowercase(Registry::get('settings.charset')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= (isset($entry['description']) ? Html::toText($entry['description']) : Html::toText(Registry::get('settings.description'))) ?>">
    <meta name="keywords" content="<?= (isset($entry['keywords']) ? $entry['keywords'] : Registry::get('settings.keywords')) ?>">
    <meta name="robots" content="<?= (isset($entry['robots']) ? $entry['robots'] : Registry::get('settings.robots')) ?>">
    <meta name="generator" content="Powered by Flextype <?= Flextype::VERSION ?>" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@getflextype">
    <meta name="twitter:creator" content="@getflextype">
    <meta name="twitter:title" content="Content Management System &mdash; Flextype">
    <meta name="twitter:description" content="Build fast, flexible, easier to manage websites with Flextype.">
    <meta name="twitter:image" content="https://github.com/flextype/flextype/raw/dev/site/plugins/admin/preview.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://flextype.org">
    <meta property="og:title" content="Content Management System &mdash; Flextype">
    <meta property="og:description" content="Build fast, flexible, easier to manage websites with Flextype.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://github.com/flextype/flextype/raw/dev/site/plugins/admin/preview.png">
    <meta property="og:image:type" content="image/png">

	<?php Event::dispatch('onThemeMeta') ?>

	<title><?= Html::toText($entry['title']) ?> | <?= Html::toText(Registry::get('settings.title')) ?></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://daneden.github.io/animate.css/animate.min.css" rel="stylesheet">

    <?php Assets::add('css', Http::getBaseUrl() . '/site/themes/' . Registry::get('settings.theme') . '/assets/dist/css/flextype.min.css', 'site', 2) ?>
    <?php foreach(Assets::get('css', 'site') as $assets_by_priorities): ?>
        <?php foreach($assets_by_priorities as $assets): ?>
            <link href="<?= $assets['asset'] ?>" rel="stylesheet">
        <?php endforeach ?>
    <?php endforeach ?>

    <?= Snippets::get('yandex-verification') ?>
    <?= Snippets::get('yandex-metrika') ?>

    <?php Event::dispatch('onThemeHeader') ?>
  </head>
  <body>
  <?php Themes::view('partials/navigation')->display() ?>
