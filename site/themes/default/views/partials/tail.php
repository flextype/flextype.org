<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>
<script id="dsq-count-scr" src="//flextype.org.disqus.com/count.js" async></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('site.theme'); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('site.theme'); ?>/assets/js/bootstrap.min.js"></script>
<?php Event::dispatch('onThemeFooter'); ?>
