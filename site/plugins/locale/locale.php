<?php

namespace Flextype;

/**
 *
 * Locale Plugin for Flextype
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flextype\Component\Event\Event;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Http\Http;
use Flextype\Component\Arr\Arr;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;


//
// Add listner for onCurrentEntryBeforeProcessed event
//
Event::addListener('onCurrentEntryBeforeProcessed', function () {
    if (empty(Http::getUriSegments()[0])) {
        Http::redirect(Http::getBaseUrl() . '/en');
    }
});

Shortcodes::shortcode()->addHandler('locale', function(ShortcodeInterface $s) {
    return locale();
});

function locale() {
    return Http::getUriSegments()[0];
}
