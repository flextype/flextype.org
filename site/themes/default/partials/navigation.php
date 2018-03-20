<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="<?php echo Url::getBase(); ?>"><h1 class="h1"><img src="<?php echo Url::getBase(); ?>/flextype.jpg" class="site-logo" width=40 /> <b>flextype</b></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'blog') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/blog"><span class="span">Blog</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'download') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/download"><span class="span">Download</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'documentation') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation"><span class="span">Documentation</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'support') echo 'active'; ?>" href="http://forum.flatgear.org"><span class="span">Forum</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (Url::getUriSegment(0) == 'about') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/about"><span class="span">About</span></a>
      </li>
    </ul>
  </div>
</div>
</nav>
