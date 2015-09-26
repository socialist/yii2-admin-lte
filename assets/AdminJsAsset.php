<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2015
 */

namespace socialist\adminlte\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Scripnichenko "socialist" Sergey <skripnichenko.s.a@gmail.com>
 */
class AdminJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';

    public $css = [
    ];

    public $js = [
        'js/app.min.js',
        'js/pages/dashboard.js',
        'js/demo.js',
    ];

    public $depends = [
        'socialist\adminlte\assets\AdminPluginAsset',
    ];
}