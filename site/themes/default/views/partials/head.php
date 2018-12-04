<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry};
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116373328-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-116373328-1');
    </script>

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter48198194 = new Ya.Metrika({ id:48198194, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/48198194" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

    <meta name="yandex-verification" content="920bbfc83bbe3fbe" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<?php Event::dispatch('onThemeMeta'); ?>

	<link rel="shortcut icon" href="<?php echo Http::getBaseUrl(); ?>/favicon.ico">

	<title><?php echo Registry::get('site.title'); ?> | <?php echo $page['title']; ?></title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
	<link href="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('system.theme'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="<?php echo Http::getBaseUrl(); ?>/site/themes/<?php echo Registry::get('system.theme'); ?>/assets/css/flextype.min.css" rel="stylesheet">
    <link href="https://daneden.github.io/animate.css/animate.min.css" rel="stylesheet">

    <?php Event::dispatch('onThemeHeader'); ?>
  </head>
  <body>
      <div style="font-size: 14px; background: #000; padding: 10px; color: #fff; text-align: center;">
          Keep Calm and wait for new Gorgeous Flextype Admin Plugin! Join our <a style="text-decoration: underline; color: #fff; font-weight: bold;" href="https://discord.gg/CCKPKVG">Discord Chat Server</a> to be up to date on all the news!
      </div>
  <?php Themes::view('partials/navigation')->display(); ?>
