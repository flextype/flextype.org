<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Site;

use Flextype\Plugin\Site\Controllers\SiteController;
use Flextype\Plugin\Site\Models\Themes;

/**
 * Add themes service to Flextype container
 */
flextype()->container()['themes'] = static function () {
    return new Themes();
};

/**
 * Init themes
 */
flextype()->container()['themes']->init();

/**
 * Add site controller to Flextype container
 */
flextype()->container()['SiteController'] = static function () {
    return new SiteController();
};


$bootstrapPath = PATH['project']. '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/bootstrap.php';
filesystem()->file($bootstrapPath)->exists() and include_once $bootstrapPath;
