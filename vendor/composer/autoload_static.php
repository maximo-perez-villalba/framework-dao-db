<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit447af6283eafb0b2c40ddca9b1285fe5
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'framework\\dao\\db\\' => 17,
            'framework\\dao\\' => 14,
            'framework\\' => 10,
        ),
        'd' => 
        array (
            'demo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'framework\\dao\\db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/framework/dao/db',
        ),
        'framework\\dao\\' => 
        array (
            0 => __DIR__ . '/..' . '/maximo-perez-villalba/framework-dao/src/framework/dao',
        ),
        'framework\\' => 
        array (
            0 => __DIR__ . '/..' . '/maximo-perez-villalba/framework-environment/src/framework',
        ),
        'demo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/demo/src/demo',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit447af6283eafb0b2c40ddca9b1285fe5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit447af6283eafb0b2c40ddca9b1285fe5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit447af6283eafb0b2c40ddca9b1285fe5::$classMap;

        }, null, ClassLoader::class);
    }
}
