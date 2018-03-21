<?php Flextype\Templates::display('partials/head'); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $page['title']; ?></h2>
    <div class="content">
          <div class="row">
              <div class="col-9 flex-content">
                  <?php echo $page['content']; ?>
              </div>
            <div class="col-3 right-nav">
                <h3 class="h3">Basics</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'requirements') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/basics/requirements">Requirements</a>
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'installation') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/basics/installation">Installation</a>
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'configuration') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/basics/configuration">Configuration</a>
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'getting-help') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/basics/getting-help">Getting Help</a>
                </nav>
                <h3 class="h3">Content</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'pages') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/content/pages">Pages</a>
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'headers') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/content/headers">Headers</a>
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'markdown') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/content/markdown">Markdown</a>
                </nav>
                <h3 class="h3">Themes</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'theme-installation') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/themes/theme-installation">Themes Installation</a>
                </nav>
                <h3 class="h3">Plugins</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Url::getUriSegment(2) == 'plugins-installation') echo 'active'; ?>" href="<?php echo Url::getBase(); ?>/documentation/plugins/plugins-installation">Plugins Installation</a>
                </nav>
            </div>
          </div>
    </div>
</main>
<?php Flextype\Templates::display('partials/footer'); ?>
