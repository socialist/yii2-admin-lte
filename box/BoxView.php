<?php

namespace socialist\adminlte\box;


use yii\base\Widget;
use socialist\adminlte\helper\Html;
use Yii;

class BoxView extends Widget
{
    /**
     * @var string the type of box.
     * Can be `default`, `primary`, `success`, `info`, `danger` or `warning`.
     *
     * Defaul value `primary`
     */
    public $type = 'primary';

    /**
     * @var string The box background class name
     *
     * ```php
     * [
     *      'background' => 'bg-light-blue-gradient'
     * ]
     * ```
     */
    public $background;

    /**
     * @var array of header information:
     * *title* - The title of box
     * *icon* - The icon of box header
     */
    public $header;

    public $footer;

    public $solid = false;

    /**
     * @var array of tools object parameters:
     * *class* - Tools class path. Default \socialist\adminlte\box\Tools
     */
    public $tools = [];

    public function init()
    {
        parent::init();

        ob_start();

    }

    public function run()
    {
        $content = ob_get_clean();
        $boxClasses = [
            'box', "box-{$this->type}",
            $this->background,
            ($this->solid) ? 'box-solid' : ''
        ];

        $body = Html::tag('div', $content, ['class' => ['box-body']]);
        return Html::tag('div', $this->header() . $body .  $this->footer(), ['class' => $boxClasses]);
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

    protected function footer()
    {
        if (!$this->footer) {
            return '';
        }

        return Html::tag('div', $this->footer, ['class' => 'box-footer clearfix']);
    }
}