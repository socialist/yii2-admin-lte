<?php

namespace socialist\adminlte\helper;


use Yii;

class Html extends \yii\helpers\Html
{
    public static function icon($iconKey)
    {
        return static::tag('i', '', ['class' => "fa fa-{$iconKey}"]);
    }

    public static function formFileInput($form, $model, $attribute, $options = [])
    {
        Yii::$app->view->registerJs('
            jQuery(function ($) {
                $("#FileInput").on("change", function(e) {
                    var value = this.value;
                    console.log(value);
                    $("#FileValueInput").val(value.split("\\\").pop());
                });
            });
        ');
        return $form->field($model, $attribute, [
            'template' => "{label}" . Html::tag('div',
                            Html::input('text', null, null, [
                                            'class' => 'form-control',
                                            'id' => 'FileValueInput',
                                            'readonly' => true])
                            . Html::tag('span',
                                Html::tag('span',
                                    Html::icon('upload') . '{input}',
                                    ['class' => 'btn btn-success btn-file']),
                                ['class' => 'input-group-btn']),
                            [
                                'class' => 'input-group input-group-file'
                            ]) . "\n{hint}\n{error}"
        ])->fileInput(['maxlength' => true, 'id' => 'FileInput']);
    }
}