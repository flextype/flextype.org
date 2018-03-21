<?php Flextype\Templates::display('partials/head'); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $page['title']; ?></h2>
    <div class="content">
          <div class="row">
              <div class="col-9 flex-content">
                  <?php echo $page['content']; ?>
              </div>
            <div class="col-3 right-nav">
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Url::getUriSegment(0) == 'download' && Url::getUriSegment(1) == '') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/download">Flextype</a>
                  <a class="nav-link <?php if (Url::getUriSegment(1) == 'plugins') echo 'active'; ?>" href="https://github.com/flextype/plugins/issues">Plugins</a>
                  <a class="nav-link <?php if (Url::getUriSegment(1) == 'themes') echo 'active'; ?>" href="https://github.com/flextype/themes/issues">Themes</a>
                </nav>
            </div>
          </div>
    </div>
</main>
<?php Flextype\Templates::display('partials/footer'); ?>
