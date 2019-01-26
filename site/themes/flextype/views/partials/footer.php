<?php
    namespace Flextype;
    use Flextype\Component\Http\Http;
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 footer-nav-items">
                    <h4 class="h4">Flextype</h4>
                    <ul class="ul">
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['about'] ?></a></li>
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['media'] ?></a></li>
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['donate'] ?></a></li>
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['sponsors'] ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-2 footer-nav-items">
                    <h4 class="h4"><?= Entries::getEntry(Snippets::get('locale'))['text']['downloads'] ?></h4>
                    <ul class="ul">
                        <li><a href="#">Flextype</a></li>
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['plugins'] ?></a></li>
                        <li><a href="#"><?= Entries::getEntry(Snippets::get('locale'))['text']['themes'] ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-2 footer-nav-items">
                    <h4 class="h4"><?= Entries::getEntry(Snippets::get('locale'))['text']['community'] ?></h4>
                    <ul class="ul">
                        <li><a href="#">Discord</a></li>
                        <li><a href="#">Github</a></li>
                        <li><a href="#">Vkontakte</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <p class="p"><a href="<?= Http::getBaseUrl() ?>">Flextype</a> was <i class="fa fa-code"></i> with <i class="fa fa-heart"></i> by <a href="http://awilum.github.io" class="highlight">Sergey Romanenko</a><br> and <a href="https://github.com/flextype/flextype/graphs/contributors" class="highlight">Flextype Community</a></p>
                    <p class="p">Copyright © 2019 - <a href="<?php echo Http::getBaseUrl(); ?>/about/license">Flextype</a> - All rights reserved</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 footer-locales">
                    <p class="p">
                        <a href="#">English</a>
                        <a href="#">Deutsch</a>
                        <a href="#">Français</a>
                        <a href="#">Русский</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php Themes::view('partials/tail')->display() ?>
    </main>
  </body>
</html>
