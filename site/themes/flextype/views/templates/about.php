<?php
namespace Flextype;
use Flextype\Component\Http\Http;
?>
<?php Themes::view('partials/head')->display() ?>
<div class="page-content container">
    <h2 class="h2"><?= $entry['title'] ?></h2>
    <div class="inner">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link <?php if ((\strpos(Http::getUriString(), 'media') === false) && (\strpos(Http::getUriString(), 'sponsors') === false)): ?>active<?php endif ?>" id="nav-home-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/about" role="tab" aria-controls="nav-about" aria-selected="true">About</a>
              <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'media') !== false): ?>active<?php endif ?>" id="nav-profile-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/about/media" role="tab" aria-controls="nav-media" aria-selected="false">Media</a>
              <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'sponsors') !== false): ?>active<?php endif ?>" id="nav-contact-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/about/sponsors" role="tab" aria-controls="nav-sponsors" aria-selected="false">Sponsors</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade active show" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
              <?= $entry['content'] ?>
          </div>
        </div>
    </div>
</div>
<?php Themes::view('partials/footer')->display() ?>
