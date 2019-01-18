<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>

    <footer class="footer">
        <div class="container">
            <p class="social-links text-center">
                <a rel="nofollow" href="https://discord.gg/CCKPKVG"><i class="fab fa-discord"></i></a>
                <a rel="nofollow" href="https://twitter.com/getflextype"><i class="fab fa-github"></i></a>
                <a rel="nofollow" href="https://github.com/flextype"><i class="fab fa-vk"></i></a>
                <a rel="nofollow" href="https://vk.com/flextype"><i class="fab fa-twitter"></i></a>
                <a rel="nofollow" href="http://flextype.org/blog"><i class="fas fa-rss-square"></i></a>

            </p>
            <p>
                <ul class="locales">
                    <li><a href="<?= Http::getBaseUrl() ?>/en">English</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/de">Deutsch</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/fr">Français</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/it">Italiano</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/pl">Polski</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/ru">Русский</a></li>
                    <li><a href="<?= Http::getBaseUrl() ?>/uk">Українська</a></li>
                </ul>
            </p>
            <p>
                <ul class="copyright">
                    <li>
                        <p><a href="<?php echo Http::getBaseUrl(); ?>">Flextype</a> was <i class="fa fa-code"></i> with <i class="fa fa-heart"></i> by <a href="http://awilum.github.io" class="highlight">Sergey Romanenko</a> and <a href="https://github.com/flextype/flextype/graphs/contributors" class="highlight">Flextype Community</a></p>
                        <p>Copyright © 2019 - <a href="<?php echo Http::getBaseUrl(); ?>/about/license">Flextype</a> - All rights reserved</p>
                    </li>
                </ul>
            </p>
        </div>
    </footer>
    <?php Themes::view('partials/tail')->display(); ?>
  </body>
</html>
