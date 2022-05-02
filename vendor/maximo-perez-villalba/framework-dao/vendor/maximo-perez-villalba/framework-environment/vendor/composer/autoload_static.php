<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf9bb27631ac38abd0f03d9233d2e6dfb
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'framework\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/framework',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf9bb27631ac38abd0f03d9233d2e6dfb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf9bb27631ac38abd0f03d9233d2e6dfb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf9bb27631ac38abd0f03d9233d2e6dfb::$classMap;

        }, null, ClassLoader::class);
    }
}