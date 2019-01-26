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
            <a class="nav-item nav-link <?php if ((\strpos(Http::getUriString(), 'plugins') === false) && (\strpos(Http::getUriString(), 'themes') === false)): ?>active<?php endif ?>" id="nav-home-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/downloads" role="tab" aria-controls="nav-home" aria-selected="true">Flextype</a>
            <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'plugins') !== false): ?>active<?php endif ?>" id="nav-profile-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/downloads/plugins" role="tab" aria-controls="nav-profile" aria-selected="false"><?= $entry['text']['plugins'] ?></a>
            <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'themes') !== false): ?>active<?php endif ?>" id="nav-contact-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/downloads/themes" role="tab" aria-controls="nav-contact" aria-selected="false"><?= $entry['text']['themes'] ?></a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane text-center fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <a href="#" class="btn btn-download">Dowload Flextype</a>
              <p>
                  <?= $entry['text']['current_stable_version'] ?> 0.8.3<br>
                  <a href="#"><?= $entry['text']['view_changelog'] ?></a>
              </p>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          </div>
        </div>
    </div>
</div>
<?php Themes::view('partials/footer')->display() ?>
