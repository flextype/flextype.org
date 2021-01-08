<?php

declare(strict_types=1);

/**
 * @link http://digital.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Icon;

use Twig\TwigFunction;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

/**
 * Get SVG icon from specific icons set.
 *
 * @param string|null  $name Icon name.
 * @param string|null  $set  Icon set:
 *                             - tabler
 *                             - bootstrap
 *                             - fontawesome|brands,
 *                             - fontawesome|regular
 *                             - fontawesome|solid
 * @param string|null  $class CSS Class.
 *
 * @return string
 */
function icon(?string $name = null, ?string $set = 'fontawesome|solid', ?string $class = null): string
{
    switch ($set) {
        case 'tabler':
            $iconFilePath = PATH['project'] . '/plugins/icon/assets/dist/tabler/icons/' . $name . '.svg';
            break;
        case 'bootstrap':
            $iconFilePath = PATH['project'] . '/plugins/icon/assets/dist/bootstrap/icons/' . $name . '.svg';
            break;
        case 'fontawesome|brands':
            $iconFilePath = PATH['project'] . '/plugins/icon/assets/dist/fontawesome/icons/brands/' . $name . '.svg';
            break;
        case 'fontawesome|regular':
            $iconFilePath = PATH['project'] . '/plugins/icon/assets/dist/fontawesome/icons/regular/' . $name . '.svg';
            break;
        case 'fontawesome|solid':
        default:
            $iconFilePath = PATH['project'] . '/plugins/icon/assets/dist/fontawesome/icons/solid/' . $name . '.svg';
            break;
    }

    $sadSmileSVG = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-sad" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="12" cy="12" r="9" />
                      <line x1="9" y1="10" x2="9.01" y2="10" />
                      <line x1="15" y1="10" x2="15.01" y2="10" />
                      <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                    </svg>';

    $iconSVG = filesystem()->file($iconFilePath)->exists() ? filesystem()->file($iconFilePath)->get() : $sadSmileSVG;

    return ! is_null($class) ? '<span class="' . $class . '">' . $iconSVG . '</span>' : $iconSVG ;
}

// Shortcode: [icon name="apple" set="fontawesome|brands" class=""]
flextype('parsers')->shortcode()->addHandler('icon', function (ShortcodeInterface $s) {
    return icon(! is_null($s->getParameter('name')) ? $s->getParameter('name') : null,
                ! is_null($s->getParameter('set')) ? $s->getParameter('set') : null,
                ! is_null($s->getParameter('class')) ? $s->getParameter('class') : '');
});

// Twig: {{ icon('apple', 'fontawesome|brands', '') }}
flextype('twig')->addFunction(new TwigFunction('icon', function (?string $name = null, ?string $set = 'fontawesome|solid', ?string $class = null) {
    return icon($name, $set, $class);
}, ['is_safe' => ['html']]));
