<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token};
use function Flextype\Component\I18n\__;
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-fixed">
    <div class="container-fluid">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="navbar-wrapper">
            <?php if(isset($links)) { ?>
                <?php $i = 0; ?>
                <?php foreach ($links as $link) { ?>
                    <a class="navbar-brand" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    <?php $i++; ?>
                    <?php if (count($links) > 1 and count($links) != $i) echo '&nbsp;/&nbsp;'; ?>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="navbar-buttons">
        <?php if(isset($buttons)) { ?>
            <?php foreach ($buttons as $button) { ?>
                <a class="float-right btn  <?php if (isset($button['class'])) echo $button['class']; ?>" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
            <?php } ?>
        <?php } ?>
        </div>
    </div>
</nav>
<!-- End Navbar -->
