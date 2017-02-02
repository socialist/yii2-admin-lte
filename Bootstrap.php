<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 09.01.17
 * Time: 16:11
 */

namespace socialist\adminlte;


use socialist\adminlte\base\Config;
use yii\base\Application;
use yii\base\BootstrapInterface;
use Yii;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

class Bootstrap implements BootstrapInterface
{
    private $plugins = [];

    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function() {
            Config::getInstance();
            Yii::setAlias('@adminlte', '@vendor/socialist/yii2-admin-lte');
            Yii::setAlias('@adminlte/layout', '@adminlte/views/layout');
        });

        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['adminlte*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@adminlte/messages',
            'fileMap' => [
                'adminlte' => 'adminlte.php',
            ]
        ];
    }
}