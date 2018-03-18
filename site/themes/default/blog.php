<?php Rawilum\Templates::display('partials/head'); ?>
<div class="page-header">
    <div class="container">
        <h2 class="h2"><?php echo $page['title']; ?></h2>
    </div>
</div>
<main role="main" class="container content">
    <?php $posts = Rawilum\Pages::getPages('blog', false , 'date'); ?>
    <?php foreach ($posts as $post) { ?>
        <h3 class="blog-post-header"><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></h3>
        <p class="blog-post-author"><?php echo $post['date']; ?> / <?php echo $post['author']['name']; ?></p>
    <?php } ?>
</main>
<?php Rawilum\Templates::display('partials/footer'); ?>
