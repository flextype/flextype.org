<?php Flextype\Templates::display('partials/head'); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $page['title']; ?></h2>
    <div class="content">
        <?php echo $page['content']; ?>
    </div>
</main>
<?php Flextype\Templates::display('partials/footer'); ?>
