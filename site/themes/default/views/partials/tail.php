<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>
<script id="dsq-count-scr" src="//flextype.disqus.com/count.js" async></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('settings.theme'); ?>/assets/js/Carousel.js"></script>
<script src="https://wowjs.uk/dist/wow.min.js"></script>
<script>
    new WOW().init();

    var apiRoot = "https://api.github.com/";

   window.onload = function ()
   {
     var imgs = document.querySelectorAll('.js-slide-message'),
     		len = imgs.length,
     		i = len - 1;

     (function go()
     {
           imgs[i].classList.remove('active');
           i++;
           if ( i == len) i = 0;
           imgs[i].classList.add('active');
           window.setTimeout(go, 10000);

     })()
   }

    // Return a HTTP query variable
    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for(var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable) {
                return pair[1];
            }
        }
        return "";
    }

    // Format numbers
    function formatNumber(value) {
        return value.toString().replace(/(\d)(?=(\d{3})+$)/g, '$1,')
    }

    // Display the stats
    function showStats(data) {
        var err = false;
        var errMessage = '';

        if(data.status == 404) {
            err = true;
            errMessage = "The project does not exist!";
        }

        if(data.status == 403) {
            err = true;
            errMessage = "You've exceeded GitHub's rate limiting.<br />Please try again in about an hour.";
        }

        if(data.length == 0) {
            err = true;
            errMessage = "There are no releases for this project";
        }

        var html = "";

        if(err) {
            html += "<div class='col-md-6 col-md-offset-3 alert alert-danger output'>" + errMessage + "</div>";
        } else {
            html += "";

            var isLatestRelease = true;
            var totalDownloadCount = 0;
            $.each(data, function(index, item) {
                var releaseTag = item.tag_name;
                var releaseBadge = "";
                var releaseClassNames = "release";
                var releaseURL = item.html_url;
                var isPreRelease = item.prerelease;
                var releaseAssets = item.assets;
                var releaseDownloadCount = 0;
                var releaseAuthor = item.author;
                var publishDate = item.published_at.split("T")[0];

                var downloadInfoHTML = "";
                if(releaseAssets.length) {


                    $.each(releaseAssets, function(index, asset) {
                        var assetSize = (asset.size / 1048576.0).toFixed(2);
                        var lastUpdate = asset.updated_at.split("T")[0];

                        downloadInfoHTML += "<li><code>" + asset.name + "</code> (" + assetSize + "&nbsp;MiB) - " +
                            "downloaded " + formatNumber(asset.download_count) + "&nbsp;times. " +
                            "Last&nbsp;updated&nbsp;on&nbsp;" + lastUpdate + "</li>";

                        totalDownloadCount += asset.download_count;
                        releaseDownloadCount += asset.download_count;
                    });
                }
            });

            if(totalDownloadCount) {
                var totalHTML = "<div class='total-downloads'>";
                totalHTML += "Total downloads:&nbsp;";
                totalHTML += "<span>" + formatNumber(totalDownloadCount) + "</span>";
                totalHTML += "</div>";

                html = totalHTML + html;
            }
        }

        var resultDiv = $("#stats-result");
        resultDiv.hide();
        resultDiv.html(html);
        $("#loader-gif").hide();
        resultDiv.slideDown();
    }

    // Callback function for getting release stats
    function getStats() {
        var user = 'Flextype';
        var repository = 'flextype';

        var url = apiRoot + "repos/" + user + "/" + repository + "/releases" + "?=" + new Date().getTime();
        $.getJSON(url, showStats).fail(showStats);
    }

    getStats();

</script>
<?php Event::dispatch('onThemeFooter'); ?>
