<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        ["admin_assets/libs/flatpickr/flatpickr.min.css", 'type'=>'text/css'],
        ["admin_assets/css/bootstrap.min.css", 'type'=>'text/css'],
        ["admin_assets/css/icons.min.css", 'type'=>'text/css'],
        ["admin_assets/css/app.min.css", 'id'=> 'app-style', 'type'=> 'text/css'],
        "admin_assets/libs/mohithg-switchery/switchery.min.css",
        "admin_assets/css/custom.css",
    ];
    public $js = [
        'admin_assets/js/head.js',
        "admin_assets/js/vendor.min.js",
        "admin_assets/libs/flatpickr/flatpickr.min.js",
        "admin_assets/js/pages/dashboard-1.init.js",
        "admin_assets/js/app.min.js",
        "admin_assets/libs/mohithg-switchery/switchery.min.js",
        "admin_assets/js/custom.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
