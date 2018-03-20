    <footer class="footer">
        <div class="container">
            <p class="social-links text-center">
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.twitter'); ?>"><i class="fab fa-twitter"></i></a>
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.github'); ?>"><i class="fab fa-github"></i></a>
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.gitter'); ?>"><i class="fab fa-gitter"></i></a>
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.facebook'); ?>"><i class="fab fa-facebook"></i></a>
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.telegram'); ?>"><i class="fab fa-telegram"></i></a>
                <a rel="nofollow" href="<?php echo Rawilum\Config::get('social_urls.vkontakte'); ?>"><i class="fab fa-vk"></i></a>
            </p>
            <p>
                <ul class="locales">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Русский</a></li>
                </ul>
            </p>
            <p>
                <ul class="copyright">
                    <li>
                        <p><a href="{Url::getBase()}">Flextype</a> was <i class="fa fa-code"></i> with <i class="fa fa-heart"></i> by <a href="http://awilum.github.io" class="highlight">Sergey Romanenko</a> and <a href="https://github.com/rawilum/rawilum/network/members" class="highlight">Flextype Community</a></p>
                        <p>Copyright © 2018 - <a href="{Url::getBase()}/about/license">Flextype</a> - All rights reserved</p>
                    </li>
                </ul>
            </p>
        </div>
    </footer>
    <?php Rawilum\Templates::display('partials/tail'); ?>
  </body>
</html>
