<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Slim\Http\Environment;
use Slim\Http\Uri;
use Flextype\Plugin\Site\Controllers\SiteController;


flextype('emitter')->addListener('onFlextypeBeforeRun', static function (): void {
    flextype()->get('{uri:.+}', SiteController::class . ':index')
              ->setName('site.index')
              ->add('csrf');
});
