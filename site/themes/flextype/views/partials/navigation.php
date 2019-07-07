<?php namespace Flextype ?>
<?php use Flextype\Component\{Http\Http, Registry\Registry, Arr\Arr} ?>
<nav class="navbar navbar-expand-lg section-international">
    <div class="container">
        <a class="navbar-brand" href="<?= Http::getBaseUrl() ?>/<?= locale() ?>"><?= strtolower(Registry::get('settings.title')) ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php foreach (Entries::getEntries(locale(), 'menu.order', 'ASC') as $_entry): ?>
                <?php if (!(isset($_entry['visibility']) && ($_entry['visibility'] === 'draft' || $_entry['visibility'] === 'hidden'))): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if (\strpos(Http::getUriString(), $_entry['slug']) !== false): ?>active<?php endif ?>" href="<?= Http::getBaseUrl() ?>/<?= $_entry['slug'] ?>"><span><?= $_entry['menu']['title'] ?></span></a>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
        <div class="my-2 my-lg-0 social-links">
            <a rel="nofollow" href="https://discord.gg/CCKPKVG"><i class="fab fa-discord"></i></a>
            <a rel="nofollow" href="http://forum.flextype.org"><i class="fas fa-comments"></i></a>
            <a rel="nofollow" href="https://github.com/flextype"><i class="fab fa-github"></i></a>
            <a rel="nofollow" href="https://vk.com/flextype"><i class="fab fa-vk"></i></a>
            <a rel="nofollow" href="https://twitter.com/getflextype"><i class="fab fa-twitter"></i></a>
        </div>
        </div>
    </div>
</nav>
