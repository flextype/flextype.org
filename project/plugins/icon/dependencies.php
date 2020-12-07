<?php

declare(strict_types=1);

/**
 * @link http://digital.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Icon;

use Flextype\Plugin\Icon\Twig\IconTwigExtension;

// Add Icon Twig Extension
flextype('twig')->addExtension(new IconTwigExtension());
