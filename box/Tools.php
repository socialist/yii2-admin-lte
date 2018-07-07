<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 20.01.17
 * Time: 16:30
 */

namespace socialist\adminlte\box;


use socialist\adminlte\helper\Html;
use yii\base\BaseObject;
use Yii;

class Tools extends BaseObject
{
    public $template = '{collapse}{remove}';

    public $collapsed = false;

    public $buttons = [];

    public $buttonOptions = [
        'data-toggle' => 'tooltip',
        'style' => 'margin-right: 5px;',
    ];

    public function init()
    {
        parent::init();
        $this->initDefaultButtons();
    }

    public function initDefaultButtons()
    {
        $this->initDefaultButton('collapse', ($this->collapsed) ? 'plus' : 'minus', ['class' => ['btn', 'bg-info', 'btn-sm']]);
        $this->initDefaultButton('remove', 'times', ['class' => ['btn', 'btn-sm', 'bg-danger']]);
    }

    public function initDefaultButton($name, $icon, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function() use ($name, $icon, $additionalOptions) {
                $title = Yii::t('adminlte', ucfirst($name));
                $options = array_merge([
                    'title' => $title,
                    'data-widget' => $name,
                ], $this->buttonOptions, $additionalOptions);

                return Html::button(Html::icon($icon), $options);
            };
        }
    }

    public function render()
    {
        $tools = preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) {
            $name = $matches[1];

            if (array_key_exists($name, $this->buttons)) {
                return call_user_func($this->buttons[$name]);
            }

            return '';
        }, $this->template);

        return Html::tag('div', $tools, ['class' => 'pull-right box-tools']);
    }
}
