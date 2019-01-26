<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 footer-nav-items">
                    <h4 class="h4">Flextype</h4>
                    <ul class="ul">
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/about"><?= Entries::getEntry(locale())['text']['about'] ?></a></li>
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/about/media"><?= Entries::getEntry(locale())['text']['media'] ?></a></li>
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/about/sponsors"><?= Entries::getEntry(locale())['text']['donate'] ?></a></li>
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/about/sponsors"><?= Entries::getEntry(locale())['text']['sponsors'] ?></a></li>
                    </ul>
                </div>
                <div class="col-md-2 footer-nav-items">
                    <h4 class="h4"><?= Entries::getEntry(locale())['text']['downloads'] ?></h4>
                    <ul class="ul">
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/downloads">Flextype</a></li>
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/downloads/plugins"><?= Entries::getEntry(locale())['text']['plugins'] ?></a></li>
                        <li><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>/downloads/themes"><?= Entries::getEntry(locale())['text']['themes'] ?></a></li>
                    </ul>
                </div>
                <div class="col-md-2 footer-nav-items">
                    <h4 class="h4"><?= Entries::getEntry(locale())['text']['community'] ?></h4>
                    <ul class="ul">
                        <li><a href="https://discord.gg/CCKPKVG">Discord</a></li>
                        <li><a href="https://github.com/flextype">Github</a></li>
                        <li><a href="https://vk.com/flextype">Vkontakte</a></li>
                        <li><a href="https://twitter.com/getflextype">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <p class="p"><a href="<?= Http::getBaseUrl() ?>/<?= locale() ?>">Flextype</a> was <i class="fa fa-code"></i> with <i class="fa fa-heart"></i> by <a href="http://awilum.github.io" class="highlight">Sergey Romanenko</a><br> and <a href="https://github.com/flextype/flextype/graphs/contributors" class="highlight">Flextype Community</a></p>
                    <p class="p">Copyright © 2019 - <a href="https://github.com/flextype/flextype/blob/dev/LICENSE.txt">Flextype</a> - All rights reserved</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 footer-locales">
                    <p class="p">
                        <a href="<?= Http::getBaseUrl() ?>/en">English</a>
                        <a href="<?= Http::getBaseUrl() ?>/ru">Русский</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php Themes::view('partials/tail')->display() ?>
    </main>
  </body>
</html>
