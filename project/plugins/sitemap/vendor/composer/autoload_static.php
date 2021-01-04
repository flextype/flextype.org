<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit653a8cb37089a51acc1bb5ed9f5aef41
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Flextype\\Component\\Filesystem\\' => 30,
            'Flextype\\Component\\Arrays\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Flextype\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/flextype-components/filesystem',
        ),
        'Flextype\\Component\\Arrays\\' => 
        array (
            0 => __DIR__ . '/..' . '/flextype-components/arrays/src',
        ),
    );

    public static $classMap = array (
        'Flextype\\Component\\Arrays\\Arrays' => __DIR__ . '/..' . '/flextype-components/arrays/src/Arrays.php',
        'Flextype\\Component\\Filesystem\\Filesystem' => __DIR__ . '/..' . '/flextype-components/filesystem/Filesystem.php',
        'Flextype\\Plugin\\Sitemap\\Controllers\\SitemapController' => __DIR__ . '/../..' . '/app/Controllers/SitemapController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit653a8cb37089a51acc1bb5ed9f5aef41::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit653a8cb37089a51acc1bb5ed9f5aef41::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit653a8cb37089a51acc1bb5ed9f5aef41::$classMap;

        }, null, ClassLoader::class);
    }
}