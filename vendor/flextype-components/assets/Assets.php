<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\Assets;

class Assets
{
    /**
     * Assets files.
     *
     * @var array
     */
    private static $assets = [];

    /**
     * Add new asset
     *
     * Assets::add('js', 'jquery.js', 'site', 1);
     * Assets::add('js', 'site.js', 'site', 2);
     * Assets::add('css', 'site.css', 'site', 1);
     * Assets::add('css', 'theme.css', 'site', 2);
     *
     * @param  string $asset_type
     * @param  string $asset
     * @param  string $namespace
     * @param  int    $priority
     * @return void
     */
    public static function add(string $asset_type, string $asset, string $namespace, int $priority = 1) : void
    {
        static::$assets[$namespace][$asset_type][$priority][] = [
            'asset'  => $asset
        ];
    }

    /**
     * Get assets for current namespace and asset type
     *
     * $css = Assets::get('css', 'site');
     * $js  = Assets::get('js', 'site');
     *
     * @param  string $asset_type
     * @param  string $namespace
     * @return array
     */
    public static function get(string $asset_type, string $namespace) : array
    {
        // is there some registered $assets for current $namespace ?
        if (isset(static::$assets[$namespace])
            && isset(static::$assets[$namespace][$asset_type])
            && count(static::$assets[$namespace][$asset_type]) > 0) {

            // Get all $assets for given $namespace and $asset_type.
            $assets = static::$assets[$namespace][$asset_type];

            // Sort $assets by priority from low to high
            ksort($assets);

            // Return $assets
            return $assets;
        }
    }
}
