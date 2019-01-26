<?php

namespace Flextype;

/**
 *
 * Redirect Plugin for Flextype
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

//
// Add listner for onCurrentPageAfterProcessed event
//
Event::addListener('onCurrentEntryAfterProcessed', function () {

    //
    // Search in frontmatter of the curent entry element 'redirect'
    //
    if (Arr::keyExists(Entries::getCurrentEntry(), 'redirect')) {
        Http::redirect(Arr::get(Entries::getCurrentEntry(), 'redirect'));
    }

    //
    // Redirect to the custom urls on specific pages
    //
    if (Registry::exists('settings.redirects')) {
        $redirects = Registry::get('settings.redirects');

        if (is_array($redirects) && count($redirects) > 0) {
            foreach ($redirects as $old_url => $new_url) {
                if (Http::getUriString() == $old_url) {
                    Http::redirect($new_url);
                }
            }
        }
    }
});
