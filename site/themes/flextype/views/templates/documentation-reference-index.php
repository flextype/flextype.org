<?php namespace Flextype ?>
<?php Themes::view('partials/head')->display() ?>
<h2><?= $entry['title'] ?></h2>
<?php foreach($entry['text']['api'] as $level1): ?>
    <h4><a href="<?= $entry['url'] ?>/<?= $level1['url'] ?>"><?= $level1['heading'] ?></a></h4>
    <div class="row">
        <div class="col">
            <?php foreach($level1['codes'] as $level2): ?>
                <a class="badge badge-dark" href="<?= $entry['url'] ?>/<?= $level1['url'] ?>/<?= $level2['url'] ?>"><?= $level2['title'] ?></a>
            <?php endforeach ?>
        </div>
    </div>
<?php endforeach ?>
<?php Themes::view('partials/footer')->display() ?>
