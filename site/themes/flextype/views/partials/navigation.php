<?php namespace Flextype ?>
<?php use Flextype\Component\{Http\Http, Registry\Registry, Arr\Arr} ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom box-shadow">
<div class="container">
  <a class="navbar-brand" href="<?= Http::getBaseUrl() ?>"><?= Registry::get('settings.title') ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        <?php foreach (Entries::getEntries('en', 'menu.order', 'ASC') as $entry): ?>
            <?php if (!(isset($entry['visibility']) && ($entry['visibility'] === 'draft' || $entry['visibility'] === 'hidden'))): ?>
                <li class="nav-item">
                    <a class="nav-link <?php if (Http::getUriString() == $entry['slug']): ?>active<?php endif ?>" href="<?= Http::getBaseUrl() ?>/<?= $entry['slug'] ?>"><?= $entry['menu']['title'] ?></a>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
  </div>
</div>
</nav>
