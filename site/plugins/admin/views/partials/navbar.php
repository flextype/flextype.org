<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Html\Html, Registry\Registry, Token\Token, Arr\Arr};
use function Flextype\Component\I18n\__;
?>

<!-- Top Navbar -->
<?php if(isset($links)) { ?>
<nav class="navbar navbar-expand-lg navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <?php foreach ($links as $link) { ?>
                <?php echo Html::anchor($link['title'], $link['link'], $link['attributes']); ?>
            <?php } ?>
        </div>
    </div>
</nav>
<?php } ?>
<!-- End Navbar -->

<?php if ((Http::get('page') !== null) && (Arr::last(Http::getUriSegments()) !== 'move') && (Arr::last(Http::getUriSegments()) !== 'rename')) { ?>
<div class="page-editor-heading">
     <a target="_blank" href="<?php echo $page['url']; ?>">/<?php if($page['slug'] == '') echo Registry::get('settings.pages.main'); else echo $page['slug']; ?></a>
</div>
<?php } ?>

<!-- Bottom Navbar -->
<?php if(isset($buttons)) { ?>
<nav class="navbar navbar-expand-lg navbar-fixed fixed-bottom">
  <div class="container-fluid">
      <div class="navbar-buttons">
          <?php foreach ($buttons as $button) { ?>
              <?php echo Html::anchor($button['title'], $button['link'], $button['attributes']); ?>
          <?php } ?>
      </div>
  </div>
</nav>
<?php } ?>
</nav>
<!-- End Navbar -->
