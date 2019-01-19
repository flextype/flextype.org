<?php namespace Flextype ?>
<?php Themes::view('partials/head')->display() ?>
<a href="<?= $entry['url'] ?>/<?= $entry['links']['reference']['url'] ?>"><?= $entry['links']['reference']['title'] ?></a>
<?php Themes::view('partials/footer')->display() ?>
