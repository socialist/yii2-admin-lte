<?php

namespace socialist\adminlte\assets;

use Yii;
use yii\web\AssetBundle;

class AdminPluginAsset extends AssetBundle
{
	public $sourcePath = '@bower/admin-lte/plugins';

    public $css = [
        'iCheck/flat/blue.css',
        'jvectormap/jquery-jvectormap-1.2.2.css',
        'datepicker/datepicker3.css',
        'daterangepicker/daterangepicker-bs3.css',
        'bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'iCheck/square/blue.css',
    ];

    public $js = [
        'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'sparkline/jquery.sparkline.min.js',
        'jvectormap/jquery-jvectormap-1.2.2.min.js',
        'jvectormap/jquery-jvectormap-world-mill-en.js',
        'knob/jquery.knob.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        'daterangepicker/daterangepicker.js',
        'datepicker/bootstrap-datepicker.js',
        'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'slimScroll/jquery.slimscroll.min.js',
        'fastclick/fastclick.min.js',
        'iCheck/icheck.min.js',
    ];
    
    public $depends = [
        'socialist\adminlte\assets\AdminAsset',
    ];
}