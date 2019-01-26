<?php namespace Flextype ?>
<?php use Flextype\Component\{Event\Event, Http\Http, Registry\Registry, Assets\Assets} ?>
<?php Assets::add('js', Http::getBaseUrl() . '/site/themes/' . Registry::get('settings.theme') . '/assets/dist/js/flextype.min.js', 'site', 1) ?>
<?php foreach(Assets::get('js', 'site') as $assets_by_priorities): ?>
    <?php foreach($assets_by_priorities as $assets): ?>
        <script src="<?= $assets['asset'] ?>"></script>
    <?php endforeach ?>
<?php endforeach ?>
<script src="https://wowjs.uk/dist/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<?php Event::dispatch('onThemeFooter') ?>
