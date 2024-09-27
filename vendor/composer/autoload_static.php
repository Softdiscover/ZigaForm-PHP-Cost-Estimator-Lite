<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf59df8903a5361cfc6b26125d89294b2
{
    public static $files = array (
        '7f55c0c8faca7d96e425512293db1ad1' => __DIR__ . '/../..' . '/includes/wp/wp-includes/formatting.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zigaform\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zigaform\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Zigaform\\Admin\\List_data' => __DIR__ . '/../..' . '/includes/admin/class-admin-list.php',
        'Zigaform\\Template' => __DIR__ . '/../..' . '/includes/class-template.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf59df8903a5361cfc6b26125d89294b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf59df8903a5361cfc6b26125d89294b2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf59df8903a5361cfc6b26125d89294b2::$classMap;

        }, null, ClassLoader::class);
    }
}
