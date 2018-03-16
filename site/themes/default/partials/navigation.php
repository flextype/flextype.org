<nav class="navbar navbar-expand-lg navbar-light bg-white">
<div class="container">
  <a class="navbar-brand" href="<?php echo Url::getBase(); ?>"><img src="<?php echo Url::getBase(); ?>/site/themes/default/assets/img/logo.jpg" width=220 title="<?php echo $this->rawilum['config']->get('site.title'); ?>"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'blog') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/blog">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'download') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/download">Download</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'support') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/support">Support</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'about') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/about">About</a>
      </li>
    </ul>
  </div>
</div>
</nav>
