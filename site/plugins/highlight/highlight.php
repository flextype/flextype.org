<?php namespace Flextype;

/**
 *
 * Highlight Plugin for Flextype
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


use Flextype\Component\Event\Event;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Html\Html;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

//
// Add listner for onThemeHeader event
//
Event::addListener('onThemeHeader', function () {
    echo('<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/'.Registry::get('plugins.highlight.theme').'.min.css">');
});

//
// Add listner for onThemeFooter event
//
Event::addListener('onThemeFooter', function () {
    echo('<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
          <script>hljs.initHighlightingOnLoad();</script>');
});

Event::addListener('onShortcodesInitialized', function () {
    Content::shortcode()->addHandler('code', function(ShortcodeInterface $s) {
        return Html::toText($s->getContent());
    });
    Content::shortcode()->addHandler('s_start', function() {
        return '[';
    });
    Content::shortcode()->addHandler('s_end', function() {
        return ']';
    });
});
