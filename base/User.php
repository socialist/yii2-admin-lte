<?php

namespace socialist\adminlte\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * summary
 */
abstract class User extends ActiveRecord
{
    /**
     * Метод должен собирать и возвращать все нужные данные о пользователе
     * @return array Массив данных  о пользователе
     */
    public function getUserData()
    {
    	$userData = [
    		'username' => $this->getUsername(),
    		'profession' => $this->getProfession(),
    		'regData'    => $this->getCreateTime(),
    	];

    	return $userData;
    }

    public function getAvatar()
    {
    	return null;
    }

    public function getUsername()
    {
    	return '';
    }

    public function getProfession()
    {
    	return '';
    }

    public function getCreateTime()
    {
    	return '';
    }

    public function getPermition()
    {
        return Yii::$app->getUser()->isGuest;
    }
}
