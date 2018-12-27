<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?= $entry['title']; ?></h2>
    <div class="content">
          <div class="row">
              <div class="col-9 flextype-content">
                  <?php if(Http::getUriSegment(1) == 'cookbook' && Http::getUriSegment(2) == ''): ?>
                      <?php foreach(Entries::getEntries('documentation/cookbook') as $entry): ?>
                        <h3><a href="<?= $entry['url'] ?>"><?= $entry['title'] ?></a></h3>
                      <?php endforeach ?>
                  <?php else: ?>
                      <?= $entry['content'] ?>
                  <?php endif ?>
              </div>
            <div class="col-3 right-nav">
                <?php Themes::view('partials/navigation-documentation')->display() ?>
            </div>
          </div>
    </div>
</main>
<?php Themes::view('partials/footer')->display() ?>
