<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>
<script id="dsq-count-scr" src="//flextype.disqus.com/count.js" async></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/Carousel.js"></script>
<script src="https://wowjs.uk/dist/wow.min.js"></script>
<script>
    new WOW().init();

    $('.js-admin-showcase').carousel({
        num: 7,
        maxWidth: 800,
        maxHeight: 517,
        distance: 50,
        scale: 0.6,
        animationTime: 1000,
        showTime: 5000
    });
</script>
<?php Event::dispatch('onThemeFooter'); ?>
