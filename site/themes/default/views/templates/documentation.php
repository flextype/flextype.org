<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
<?php Themes::template('partials/head')->display(); ?>
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
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'requirements') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/basics/requirements">Requirements</a>
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'installation') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/basics/installation">Installation</a>
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'configuration') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/basics/configuration">Configuration</a>
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'getting-help') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/basics/getting-help">Getting Help</a>
                </nav>
                <h3 class="h3">Content</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'pages') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/content/pages">Pages</a>
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'headers') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/content/headers">Headers</a>
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'markdown') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/content/markdown">Markdown</a>
                </nav>
                <h3 class="h3">Themes</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'theme-installation') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/themes/theme-installation">Themes Installation</a>
                </nav>
                <h3 class="h3">Plugins</h3>
                <nav class="nav flex-column">
                  <a class="nav-link <?php if (Http::getUriSegment(2) == 'plugins-installation') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/plugins/plugins-installation">Plugins Installation</a>
                </nav>
            </div>
          </div>
    </div>
</main>
<?php Themes::template('partials/footer')->display(); ?>
