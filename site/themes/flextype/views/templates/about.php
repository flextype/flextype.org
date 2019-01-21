<?php namespace Flextype ?>
<?php Themes::view('partials/head')->display() ?>
<main role="main" class="container">
    <?= $entry['content'] ?>
</main>
<?php Themes::view('partials/footer')->display() ?>
