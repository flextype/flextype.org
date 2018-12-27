<?php namespace Flextype; ?>
<?php Themes::view('partials/head')->display(); ?>
<main role="main" class="container">
    <h2 class="h2"><?php echo $entry['title']; ?></h2>
    <div class="content">
        <?php echo $entry['content']; ?>

        <div id="disqus_thread"></div>
        <script>

        var disqus_config = function () {
            this.entry.url = "<?php echo $entry['url']; ?>";  // Replace PAGE_URL with your entry's canonical URL variable
            this.entry.identifier = "<?php echo $entry['slug']; ?>"; // Replace PAGE_IDENTIFIER with your entry's unique identifier variable
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
