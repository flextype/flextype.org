<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
<?php $locale = in_array(Http::getUriSegment(0), ['en', 'ru', 'de']) ? Http::getUriSegment(0) : 'en' ?>
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="<?php echo Http::getBaseUrl(); ?>"><h1 class="h1"><img src="https://avatars3.githubusercontent.com/u/17710808?s=200&v=4" class="site-logo" width=40 /> <b>flextype</b></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        <!--
      <li class="nav-item">
        <a class="nav-link <?php if (Http::getUriSegment(0) == 'blog') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/blog"><span class="span">Blog</span></a>
      </li>
        -->
      <li class="nav-item">
        <a class="nav-link <?php if (Http::getUriSegment(0) == 'download') echo 'active'; ?>" href="<?= Http::getBaseUrl() ?>/<?= $locale ?>/download"><span class="span"><?= Entries::getEntry($locale)['navigation_header']['download']['title'] ?></span></a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link <?php if (Http::getUriSegment(0) == 'documentation') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation"><span class="span">Documentation</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if (Http::getUriSegment(2) == 'getting-help') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/basics/getting-help"><span class="span">Community</span></a>
      </li>
    -->
      <li class="nav-item">
        <a class="nav-link <?php if (Http::getUriSegment(0) == 'about') echo 'active'; ?>" href="<?= Http::getBaseUrl() ?>/<?= $locale ?>/about"><span class="span"><?= Entries::getEntry($locale)['navigation_header']['about']['title'] ?></span></a>
      </li>
    </ul>
  </div>
</div>
</nav>
