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

    public $sourcePath = '@vendor/almasaeed2010/adminlte';

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
    ];

    public $js = [
        'dist/js/adminlte.min.js',
        //'dist/js/pages/dashboard.js',
        'dist/js/demo.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\YiiAsset',
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
            'bower_components/morris.js/morris.min.js',
        ],
        'sparkline' => [
            'js' => 'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        ],
        'jvectormap' => [
            'css' => 'bower_components/jvectormap/jquery-jvectormap.css',
            'js'  => [
                'bower_components/jvectormap/jquery-jvectormap.js',
                'bower_components/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js',
            ],
        ],
        'jquery-knob' => [
            'js' => 'bower_components/jquery-knob/dist/jquery.knob.min.js',
        ],
        'moment' => [
            'js' => 'bower_components/moment/min/moment.min.js',
        ],
        'daterangepicker' => [
            'css' => 'bower_components/bootstrap-daterangepicker/daterangepicker.css',
            'js'  => 'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        ],
        'datepicker' => [
            'css' => 'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
            'js'  => 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        ],
        'bootstrap3-wysihtml5' => [
            'css' => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
            'js'  => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        ],
        'jquery-slimscroll' => [
            'js' => 'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        ],
        'fastclick' => [
            'js' => 'bower_components/fastclick/lib/fastclick.js',
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
            if ($plugin == 'summernote') {
                $this->depends[] = 'socialist\adminlte\assets\SummernoteAsset';
                continue;
            }
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
