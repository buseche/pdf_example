<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64c54dc70e0b72ba6a83cdfec8d7ed19
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fpdf\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/fpdf/fpdf/src/Fpdf',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64c54dc70e0b72ba6a83cdfec8d7ed19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64c54dc70e0b72ba6a83cdfec8d7ed19::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit64c54dc70e0b72ba6a83cdfec8d7ed19::$classMap;

        }, null, ClassLoader::class);
    }
}
