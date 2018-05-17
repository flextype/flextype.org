<?php
    namespace Flextype;
    use Flextype\Component\Registry\Registry;
?>
<?php Themes::view('partials/head')->display(); ?>
<div class="page-header">
    <div class="container">
        <h2 class="h2"><?php echo $page['title']; ?></h2>
    </div>
</div>
<main role="main" class="container content">
    <?php $posts = Content::getPages('blog', false , 'date'); ?>
    <?php foreach ($posts as $post) { ?>
        <h3 class="blog-post-header"><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></h3>
        <p class="blog-post-author"><?php echo date(Registry::get('site.date_format'), strtotime($post['date'])); ?> / <?php echo $post['author']['name']; ?></p>
    <?php } ?>
</main>
<?php Themes::view('partials/footer')->display(); ?>
