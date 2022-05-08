<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdb3852c9b9ecc35f958b5537594b8bbd
{
    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yidas\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yidas\\' => 
        array (
            0 => __DIR__ . '/..' . '/yidas/pagination/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdb3852c9b9ecc35f958b5537594b8bbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdb3852c9b9ecc35f958b5537594b8bbd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdb3852c9b9ecc35f958b5537594b8bbd::$classMap;

        }, null, ClassLoader::class);
    }
}
