<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2015
 */

namespace socialist\adminlte\assets;

use yii\web\AssetBundle;

/**
 * @author Scripnichenko "socialist" Sergey <skripnichenko.s.a@gmail.com>
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
    ];

    public $js = [
        'js/app.min.js',
        'js/pages/dashboard.js',
        'js/demo.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}