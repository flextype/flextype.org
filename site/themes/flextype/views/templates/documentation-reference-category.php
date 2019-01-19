<?php namespace Flextype ?>
<?php use Flextype\Component\{Http\Http, Arr\Arr} ?>
<?php Themes::view('partials/head')->display() ?>
<h2><?= $entry['title'] ?></h2>
<p><?= $entry['description'] ?></p>
<div class="row">
    <div class="col">
        <?php foreach(Entries::getEntry(Arr::first(Http::getUriSegments()).'/documentation/reference')['text']['api'][Arr::last(Http::getUriSegments())]['codes'] as $level1): ?>
            <a class="badge badge-dark" href="<?= $level1['url'] ?>"><?= $level1['title'] ?></a>
        <?php endforeach ?>
    </div>
</div>
<?php Themes::view('partials/footer')->display() ?>
