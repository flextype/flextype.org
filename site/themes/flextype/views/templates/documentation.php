<?php
namespace Flextype;
use Flextype\Component\Http\Http;
?>

<?php Themes::view('partials/head')->display() ?>
<div class="page-content container">
    <h2 class="h2 <?php if (in_array('reference', Http::getUriSegments()) && isset(Http::getUriSegments()[4])): ?>none-text-transform<?php endif ?>">
        <?= $entry['title'] ?>
        <p class="p"><?= Snippets::get('breadcrumbs'); ?></p>
    </h2>
    <div class="inner">
        <?= $entry['content'] ?>
    </div>
</div>
<?php Themes::view('partials/footer')->display() ?>
