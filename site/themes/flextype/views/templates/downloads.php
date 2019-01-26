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
            <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'plugins') !== false): ?>active<?php endif ?>" id="nav-profile-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/downloads/plugins" role="tab" aria-controls="nav-profile" aria-selected="false"><?= Entries::getEntry(locale())['text']['plugins'] ?></a>
            <a class="nav-item nav-link <?php if (\strpos(Http::getUriString(), 'themes') !== false): ?>active<?php endif ?>" id="nav-contact-tab" href="<?= Http::getBaseUrl() ?>/<?= Snippets::get('locale') ?>/downloads/themes" role="tab" aria-controls="nav-contact" aria-selected="false"><?= Entries::getEntry(locale())['text']['themes'] ?></a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane text-center fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <a href="https://github.com/flextype/flextype/releases/download/v<?= Flextype::VERSION ?>/flextype-<?= Flextype::VERSION ?>.zip" class="btn btn-download"><?= $entry['text']['download_flextype'] ?></a>
              <p>
                  <?= $entry['text']['current_stable_version'] ?> <?= Flextype::VERSION ?><br>
                  <a href="https://github.com/flextype/flextype/blob/master/CHANGELOG.md"><?= $entry['text']['view_changelog'] ?></a>
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
