<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 19.01.17
 * Time: 18:10
 */

namespace socialist\adminlte\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class Box extends Widget
{
    public $type = 'primary';

    public $header;

    public function init()
    {
        parent::init();

        ob_start();

    }

    public function run()
    {
        $content = ob_get_clean();
        $body = Html::tag('div', $content, ['class' => ['box-body']]);
        return Html::tag('div', $this->header() . $body, ['class' => 'box box-' . $this->type]);
    }

    protected function header()
    {
        if (!is_array($this->header)) {
            return '';
        }

        $this->header['title'] = (isset($this->header['title'])) ? $this->header['title'] : '';

        return $this->render('box-header', $this->header);
    }
}