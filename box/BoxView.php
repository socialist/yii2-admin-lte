<?php
/**
 * Created by PhpStorm.
 * User: seregas
 * Date: 19.01.17
 * Time: 18:10
 */

namespace socialist\adminlte\box;


use yii\base\Widget;
use socialist\adminlte\helper\Html;
use Yii;

class BoxView extends Widget
{
    public $type = 'primary';

    public $header;

    public $tools = [];

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
        $this->tools['class'] = isset($this->tools['class']) ? $this->tools['class'] : Tools::className();
        $this->header['tools'] = Yii::createObject($this->tools);

        return $this->render('box-header', $this->header);
    }
}