<?php

declare(strict_types=1);

/**
 * @link http://digital.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Twig;

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Twig\Extension\DebugExtension;

/**
 * Add CSRF (cross-site request forgery) protection service to Flextype container
 */
flextype()->container()['csrf'] = fn() => new Guard();

/**
 * Add Twig service to Flextype container
 */
flextype()->container()['twig'] = function () {

    // Create Twig View
    $twig = new Twig(PATH['project'],
                        ['auto_reload' => flextype('registry')->get('plugins.twig.settings.auto_reload'),
                         'cache' => flextype('registry')->get('plugins.twig.settings.cache') ? PATH['tmp'] . '/twig' : false,
                         'debug' => flextype('registry')->get('plugins.twig.settings.debug'),
                         'charset' => flextype('registry')->get('plugins.twig.settings.charset')]);

    // Add Twig Extension
    $twig->addExtension(new TwigExtension(flextype('router'),
                                          Uri::createFromEnvironment(new Environment($_SERVER))));

    // Add Twig Debug Extension
    $twig->addExtension(new DebugExtension());

    // Load Flextype Twig extensions from directory /flextype/twig/ based on settings.twig.extensions array
    $twigExtensions = flextype('registry')->get('plugins.twig.settings.extensions');

    foreach ($twigExtensions as $twigExtension) {
        $twigExtensionClassName = $twigExtension . 'TwigExtension';
        $twigExtensionClassNameWithNamespace = 'Flextype\\Plugin\\Twig\\Twig\\' . $twigExtension . 'TwigExtension';

        if (file_exists(ROOT_DIR . '/project/plugins/twig/twig/' . $twigExtensionClassName . '.php')) {

            if ($twigExtension == 'Flextype') {
                flextype()->container()['flash'] = fn() => new Messages();
            }

            $twig->addExtension(new $twigExtensionClassNameWithNamespace());
        }
    }

    // Return view
    return $twig;
};
