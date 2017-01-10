<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2015
 */

namespace socialist\adminlte\assets;

use socialist\adminlte\base\Config;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;

/**
 * @author Scripnichenko "socialist" Sergey <skripnichenko.s.a@gmail.com>
 */
class AdminAsset extends AssetBundle
{

    public $sourcePath = '@bower/adminlte';

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
    ];

    public $js = [
        'dist/js/app.min.js',
        //'dist/js/pages/dashboard.js',
        'dist/js/demo.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $plugins = [];

    private $pluginsList = [
        'jquery-ui' => [
            'js' => 'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        ],
        'raphael' => [
            'js' => 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        ],
        'morris' => [
            'plugins/morris/morris.min.js',
        ],
        'sparkline' => [
            'js' => 'plugins/sparkline/jquery.sparkline.min.js',
        ],
        'jvectormap' => [
            'css' => 'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
            'js'  => [
                'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
                'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
            ],
        ],
        'jquery-knob' => [
            'js' => 'plugins/knob/jquery.knob.js',
        ],
        'moment' => [
            'js' => 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        ],
        'daterangepicker' => [
            'css' => 'plugins/daterangepicker/daterangepicker-bs3.css',
            'js'  => 'plugins/daterangepicker/daterangepicker.js',
        ],
        'datepicker' => [
            'css' => 'plugins/datepicker/datepicker3.css',
            'js'  => 'plugins/datepicker/bootstrap-datepicker.js',
        ],
        'bootstrap3-wysihtml5' => [
            'css' => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
            'js'  => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        ],
        'jquery-slimscroll' => [
            'js' => 'plugins/slimScroll/jquery.slimscroll.min.js',
        ],
        'fastclick' => [
            'js' => 'plugins/fastclick/fastclick.min.js',
        ],
        'iCheck' => [
            'css' => [
                'plugins/iCheck/flat/blue.css',
                'plugins/iCheck/square/blue.css',
            ],
            'js'  => 'plugins/iCheck/icheck.min.js',
        ],

    ];


    public function init()
    {
        foreach (Config::get('plugins') as $plugin) {
            if(array_key_exists($plugin, $this->pluginsList)) {
                $pluginFiles = $this->pluginsList[$plugin];

                if(isset($pluginFiles['css'])) {
                    $css = (is_array($pluginFiles['css'])) ? $pluginFiles['css'] : [$pluginFiles['css']];
                    $this->css = ArrayHelper::merge($this->css, $css); 
                }

                if(isset($pluginFiles['js'])) {
                    $js = (is_array($pluginFiles['js'])) ? $pluginFiles['js'] : [$pluginFiles['js']];
                    $this->js = ArrayHelper::merge($js, $this->js);
                }
            }
        }
    }
}