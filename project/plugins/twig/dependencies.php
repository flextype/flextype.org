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
flextype()->container()['csrf'] = static function (){
    return new Guard();
};

/**
 * Add Twig service to Flextype container
 */
flextype()->container()['twig'] = static function () {

    // Get twig settings
    $twigSettings = [
                     'auto_reload' => flextype('registry')->get('plugins.twig.settings.auto_reload'),
                     'cache' => flextype('registry')->get('plugins.twig.settings.cache') ? PATH['tmp'] . '/twig' : false,
                     'debug' => flextype('registry')->get('plugins.twig.settings.debug'),
                     'charset' => flextype('registry')->get('plugins.twig.settings.charset')
                    ];

    // Create Twig View
    $twig = new Twig(PATH['project'], $twigSettings);

    // Instantiate
    $router = flextype('router');
    $uri    = Uri::createFromEnvironment(new Environment($_SERVER));

    // Add Twig Extension
    $twig->addExtension(new TwigExtension($router, $uri));

    // Add Twig Debug Extension
    $twig->addExtension(new DebugExtension());

    // Load Flextype Twig extensions from directory /flextype/twig/ based on settings.twig.extensions array
    $twig_extensions = flextype('registry')->get('plugins.twig.settings.extensions');

    foreach ($twig_extensions as $twig_extension) {
        $twig_extension_class_name = $twig_extension . 'TwigExtension';
        $twig_extension_class_name_with_namespace = 'Flextype\\Plugin\\Twig\\Twig\\' . $twig_extension . 'TwigExtension';

        if (file_exists(ROOT_DIR . '/project/plugins/twig/twig/' . $twig_extension_class_name . '.php')) {

            if ($twig_extension == 'Flash') {
                flextype()->container()['flash'] = static function () {
                    return new Messages();
                };
            }

            $twig->addExtension(new $twig_extension_class_name_with_namespace());
        }
    }

    // Return view
    return $twig;
};
