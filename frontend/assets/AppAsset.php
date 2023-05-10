<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        ',
        ["vendor/fontawesome-free/webfonts/fa-regular-400.woff2", 'type'=>'font/woff2'],
        ["vendor/fontawesome-free/webfonts/fa-solid-900.woff2", 'type'=>'font/woff2'],
        ["vendor/fontawesome-free/webfonts/fa-brands-400.woff2", 'type'=>'font/woff2'],
        ["fonts/wolmart87d5.woff?png09e", 'type'=>'font/woff'],
        "css/style.min.css",
        "vendor/fontawesome-free/css/all.min.css",
        "vendor/swiper/swiper-bundle.min.css",
        "vendor/animate/animate.min.css",
        "vendor/magnific-popup/magnific-popup.min.css",
        "css/demo1.min.css",
        "css/custom.css",
        'css/iziToast.min.css'
    ];
    public $js = [
//    "/vendor/jquery/jquery.min.js",
    "/vendor/sticky/sticky.js",
    "/vendor/jquery.plugin/jquery.plugin.min.js",
    "/vendor/swiper/swiper-bundle.min.js",
    "/vendor/nouislider/nouislider.min.js",
    "/vendor/jquery.countdown/jquery.countdown.min.js",
    "/vendor/imagesloaded/imagesloaded.pkgd.min.js",
    "/vendor/zoom/jquery.zoom.js",
    "/vendor/magnific-popup/jquery.magnific-popup.min.js",
    "/js/main.min.js",
    "/js/custom.js",
    '/js/iziToast.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
