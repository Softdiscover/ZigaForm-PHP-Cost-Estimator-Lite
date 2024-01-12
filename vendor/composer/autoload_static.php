<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf82c07b3d1976a33b72ae877259ff3ec
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf82c07b3d1976a33b72ae877259ff3ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf82c07b3d1976a33b72ae877259ff3ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf82c07b3d1976a33b72ae877259ff3ec::$classMap;

        }, null, ClassLoader::class);
    }
}
