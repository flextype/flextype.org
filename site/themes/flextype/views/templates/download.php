<?php namespace Flextype ?>
<?php Themes::view('partials/head')->display() ?>
<center>
    <h2><?= $entry['title'] ?></h2>
    <p>
        <a href="<?= $entry['links']['download']['url'] ?>" class="btn btn-primary"><?= $entry['links']['download']['title'] ?></a>
        <a href="<?= $entry['links']['donate']['url'] ?>" class="btn btn-default"><?= $entry['links']['donate']['title'] ?></a>
    </p>
    <p>
        <?= $entry['text']['current_stable_version'] ?>: <?= Flextype::VERSION ?><br>
        <a href="<?= $entry['links']['view_release_notes']['url'] ?>"><?= $entry['links']['view_release_notes']['title'] ?></a>
    </p>
</center>
<?php Themes::view('partials/footer')->display() ?>
