<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 09.01.17
 * Time: 16:11
 */

namespace socialist\adminlte\bootstrap;


use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\helpers\VarDumper;
use yii\log\Logger;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function() {
            \Yii::getLogger()->log('Bootstrap Admin LTE', Logger::LEVEL_INFO);
        });
    }
}