<?php

/**
 *
 * Flextype Escape Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Flextype\Component\Event\Event;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

// Event: onShortcodesInitialized
Event::addListener('onShortcodesInitialized', function () {

    // Shortcode: [escape]<b>Some text here</b>[/escape]
    Content::shortcode()->addHandler('escape', function(ShortcodeInterface $s) {
        return htmlspecialchars($s->getContent(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    });
});
