<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1262367e65bc23e55a97d2a0e3685747
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jpa\\Public\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jpa\\Public\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1262367e65bc23e55a97d2a0e3685747::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1262367e65bc23e55a97d2a0e3685747::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1262367e65bc23e55a97d2a0e3685747::$classMap;

        }, null, ClassLoader::class);
    }
}
