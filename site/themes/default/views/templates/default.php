<?php namespace Flextype; ?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $page['title']; ?></h2>
    <div class="content">
        <?php echo $page['content']; ?>
    </div>
</main>
<?php Themes::view('partials/footer')->display(); ?>
