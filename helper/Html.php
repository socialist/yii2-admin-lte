<?php

namespace socialist\adminlte\helper;


class Html extends \yii\helpers\Html
{
    public static function icon($iconKey)
    {
        return static::tag('i', '', ['class' => "fa fa-{$iconKey}"]);
    }
}