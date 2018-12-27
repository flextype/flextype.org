<?php namespace Flextype; ?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $entry['title']; ?></h2>
    <div class="content">
        <?php echo $entry['content']; ?>
    </div>
</main>
<?php Themes::view('partials/footer')->display(); ?>
