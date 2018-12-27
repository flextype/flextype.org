<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $entry['title']; ?></h2>
    <div class="content">
          <div class="row">
              <div class="col-9 flextype-content">
                  <?php echo $entry['content']; ?>
              </div>
            <div class="col-3 right-nav">
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Http::getUriSegment(0) == 'about' && Http::getUriSegment(1) == '') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/about">About</a>
                  <a class="nav-link <?php if (Http::getUriSegment(1) == 'media') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/about/media">Media</a>
                  <a class="nav-link <?php if (Http::getUriSegment(1) == 'sponsors') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/about/sponsors">Sponsors</a>
                  <a class="nav-link <?php if (Http::getUriSegment(1) == 'license') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/about/license">License</a>
                </nav>
            </div>
          </div>
    </div>
</main>
<?php Themes::view('partials/footer')->display(); ?>
