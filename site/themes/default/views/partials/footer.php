<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>

    <footer class="footer">
        <div class="container">
            <p class="social-links text-center">
                <a rel="nofollow" href="<?php echo Registry::get('settings.social_link.discord'); ?>"><i class="fab fa-discord"></i></a>
                <a rel="nofollow" href="<?php echo Registry::get('settings.social_link.github'); ?>"><i class="fab fa-github"></i></a>
                <a rel="nofollow" href="<?php echo Registry::get('settings.social_link.vkontakte'); ?>"><i class="fab fa-vk"></i></a>
                <a rel="nofollow" href="<?php echo Registry::get('settings.social_link.twitter'); ?>"><i class="fab fa-twitter"></i></a>
                <a rel="nofollow" href="<?php echo Registry::get('settings.social_link.blog'); ?>"><i class="fas fa-rss-square"></i></a>

            </p>
            <p>
                <ul class="locales">
                    <li><a href="http://flextype.org">English</a></li>
                    <li><a href="http://flextype.ru">Русский</a></li>
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
