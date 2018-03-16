<?php $this->rawilum['themes']->getTemplate('partials/head'); ?>
<div class="page-header">
    <div class="container">
        <h2 class="h2"><?php echo $page['title']; ?></h2>
    </div>
</div>
<main role="main" class="container content">
    <?php echo $page['content']; ?>
</main>
<?php $this->rawilum['themes']->getTemplate('partials/footer'); ?>
