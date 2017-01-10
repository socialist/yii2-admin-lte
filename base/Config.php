<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 09.01.17
 * Time: 20:35
 */

namespace socialist\adminlte\base;

use Yii;

class Config
{
    private static $params = [];

    private static $instance;

    private function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $params = null;
        if (isset(Yii::$app->params['adminlte'])) {
            $params = Yii::$app->params['adminlte'];
        } else if (file_exists(Yii::getAlias('@app/config/adminlte.php'))) {
            $params = include_once Yii::getAlias('@app/config/adminlte.php');
        }

        $plugins = (isset($params['plugins'])) ? $params['plugins'] : [];
        $params['plugins'] = array_unique(array_merge($plugins, ['iCheck']));

        $params = $this->addUser($params);

        self::$params = $params;
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function get($key)
    {
        if (array_key_exists($key, self::$params)) {
            return self::$params[$key];
        }

        return null;
    }

    public static function set($key, $value)
    {
        self::$params[$key] = $value;
    }

    public function getParams()
    {
        return self::$params;
    }

    protected function addUser($params)
    {
        $user = (isset($params['userClass'])) ? $params['userClass'] : 'socialist\adminlte\base\User';

        $params['user'] = $user::findOne(Yii::$app->getUser()->getId());

        return $params;
    }
}