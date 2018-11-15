<?php

/**
 *
 * Flextype Markdown Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

include 'vendor/parsedown/Parsedown.php';

use Flextype\Component\Event\Event;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Parsedown;


// Event: onShortcodesInitialized
Event::addListener('onShortcodesInitialized', function () {

    // Shortcode: [markdown]__Some Text Here__[/markdown]
    Content::shortcode()->addHandler('markdown', function(ShortcodeInterface $s) {
        return Markdown::parse($s->getContent(),
         (($s->getParameter('line') === 'true') ? true : false),
         (($s->getParameter('urls_linked') === 'false') ? false : true),
         (($s->getParameter('breaks_enabled') === 'false') ? false : true),
         (($s->getParameter('markup_escaped') === 'false') ? false : true),
         (($s->getParameter('safe_mode') === 'false') ? false : true));
    });
});

class Markdown
{
    /**
     * Parsedown Extra Object
     *
     * @var object
     * @access  protected
     */
    protected static $markdown;

    /**
     * Markdown Text
     *
     * echo Markdown::text('__Some Text Here__');
     *
     * Result:
     * <p><b>Some Text Here</b></p>
     *
     * @access  public
     * @param   string $content Content to parse
     * @return  string Formatted content
     */
    public static function parse(string $content, bool $line = false, bool $urls_linked = true, bool $breaks_enabled = true, bool $markup_escaped = true, bool $safe_mode = true) : string
    {
        ! Markdown::$markdown and Markdown::$markdown = new Parsedown();

        Markdown::$markdown->setUrlsLinked($urls_linked);
        Markdown::$markdown->setBreaksEnabled($breaks_enabled);
        Markdown::$markdown->setMarkupEscaped($markup_escaped);
        Markdown::$markdown->setSafeMode($safe_mode);

        if ($line) {
            $content = Markdown::$markdown->line($content);
        } else {
            $content = Markdown::$markdown->text($content);
        }

        return $content;
    }
}
