<?php namespace Flextype; ?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $page['title']; ?></h2>
    <div class="content">
        <?php echo $page['content']; ?>

        <div id="disqus_thread"></div>
        <script>

        var disqus_config = function () {
            this.page.url = "<?php echo $page['url']; ?>";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "<?php echo $page['slug']; ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://flextype.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


    </div>
</main>
<?php Themes::view('partials/footer')->display(); ?>
