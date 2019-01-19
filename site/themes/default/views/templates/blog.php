<?php
    namespace Flextype;
    use Flextype\Component\Registry\Registry;
?>
<?php Themes::view('partials/head')->display(); ?>
<div class="entry-header">
    <div class="container">
        <h2 class="h2"><?php echo $entry['title']; ?></h2>
    </div>
</div>
<main role="main" class="container content">
    <?php $posts = Entries::getEntries('blog', 'date'); ?>
    <?php foreach ($posts as $post) { ?>
        <h3 class="blog-post__header"><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></h3>
        <p class="blog-post__author"><?php echo date(Registry::get('settings.date_format'), strtotime($post['date'])); ?> / <?php echo $post['author']['name']; ?></p>
    <?php } ?>
</main>
<?php Themes::view('partials/footer')->display(); ?>
