<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],


        'logos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/logos'),
            'url' => env('APP_URL') . '/storage/logos',
            'visibility' => 'public',
        ],

        'slider_tm' => [
            'driver' => 'local',
            'root' => storage_path('app/public/slider_tm'),
            'url' => env('APP_URL') . '/storage/slider_tm',
            'visibility' => 'public',
        ],
        'slider_en' => [
            'driver' => 'local',
            'root' => storage_path('app/public/slider_en'),
            'url' => env('APP_URL') . '/storage/slider_en',
            'visibility' => 'public',
        ],

        'slider_ru' => [
            'driver' => 'local',
            'root' => storage_path('app/public/slider_ru'),
            'url' => env('APP_URL') . '/storage/slider_ru',
            'visibility' => 'public',
        ],

        'icon' => [
            'driver' => 'local',
            'root' => storage_path('app/public/icon'),
            'url' => env('APP_URL') . '/storage/icon',
            'visibility' => 'public',
        ],

        'about' => [
            'driver' => 'local',
            'root' => storage_path('app/public/about'),
            'url' => env('APP_URL') . '/storage/about',
            'visibility' => 'public',
        ],
        'about2' => [
            'driver' => 'local',
            'root' => storage_path('app/public/about2'),
            'url' => env('APP_URL') . '/storage/about2',
            'visibility' => 'public',
        ],

        'services' => [
            'driver' => 'local',
            'root' => storage_path('app/public/services'),
            'url' => env('APP_URL') . '/storage/services',
            'visibility' => 'public',
        ],
        'products' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/storage/products',
            'visibility' => 'public',
        ],

        'products_2' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/storage/products',
            'visibility' => 'public',
        ],

        'products_3' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/storage/products',
            'visibility' => 'public',
        ],

        'products_4' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/storage/products',
            'visibility' => 'public',
        ],

        'products_5' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/storage/products',
            'visibility' => 'public',
        ],




        'posts' => [
            'driver' => 'local',
            'root' => storage_path('app/public/posts'),
            'url' => env('APP_URL') . '/storage/posts',
            'visibility' => 'public',
        ],

        'banners' => [
            'driver' => 'local',
            'root' => storage_path('app/public/banners'),
            'url' => env('APP_URL') . '/storage/banners',
            'visibility' => 'public',
        ],


        'brands' => [
            'driver' => 'local',
            'root' => storage_path('app/public/brands'),
            'url' => env('APP_URL') . '/storage/brands',
            'visibility' => 'public',
        ],

        'categories' => [
            'driver' => 'local',
            'root' => storage_path('app/public/categories'),
            'url' => env('APP_URL') . '/storage/categories',
            'visibility' => 'public',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
