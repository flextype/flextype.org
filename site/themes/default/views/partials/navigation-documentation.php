<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>

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
    <a class="nav-link <?php if (Http::getUriSegment(2) == 'media') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/content/media">Media</a>
</nav>

<h3 class="h3">Development</h3>
<nav class="nav flex-column">
    <a class="nav-link <?php if (Http::getUriSegment(2) == 'constants') echo 'active'; ?>" href="<?php echo Http::getBaseUrl(); ?>/documentation/development/constants">Constants</a>
</nav>

<h3 class="h3">Other</h3>
<nav class="nav flex-column">
    <a class="nav-link <?php if(Http::getUriSegment(1) == 'cookbook'): ?> active <?php endif ?>" href="<?= Http::getBaseUrl() ?>/documentation/cookbook">Cookbook</a>
</nav>
