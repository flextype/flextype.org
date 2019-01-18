<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>

<?php Themes::view('partials/head')->display(); ?>

<?= $entry['content'] ?>

<?php Themes::view('partials/footer')->display(); ?>
