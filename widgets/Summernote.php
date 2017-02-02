<?php
namespace socialist\adminlte\widgets;

use Yii;
use socialist\adminlte\helper\Html;
use yii\helpers\Json;
use yii\base\Widget;


class Summernote extends Widget {
    public $elementId = 'summernote';

    public $model;

    public $inputAttribute = 'source';

    public $height = 300;

    public $minHeight;

    public $maxHeight;

    public $focus = false;

    public $language;

    public $toolbar = [
        ['paragrap', ['style']],
        ['fontname', ['fontname', 'fontsize', 'color']],
        ['style', ['bold', 'italic', 'underline', 'clear'] ],
        ['list', ['ol', 'ul', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture', 'link', 'table', 'hr']],
        ['misc', ['undo', 'rendo']],
        ['codeview', ['codeview']],
        ['fullscreen', ['fullscreen']]
    ];

    public $popover = [
        'air' => [
            ['color', ['color']]
        ]
    ];

    public $placeholder = '';

    public $fontNames = ['Arial', 'Arial Black', 'Helvetica', 'Courier New', 'Merriweather'];

    public $fontNamesIgnoreCheck = ['Merriweather'];

    public $dialogsInBody = false;

    public $dialogsFade = false;

    public $shortcuts = true;

    public $callbacks = [];

    public function run()
    {
        $input = $this->initializeInput();

        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($props as $item) {
            if ($item->class == 'socialist\\adminlte\\widgets\\Summernote') {
                $items[$item->name] = $this->{$item->name};
            }
        }


        Yii::$app->view->registerJs('
            jQuery(function($) {
                $("#' . $this->elementId . '").summernote(' . Json::encode($items) . ');
            });
        ');

        return $input . Html::tag('div', '', ['id' => $this->elementId]);
    }

    protected function initializeInput()
    {
        if ($this->model === null) {
            return '';
        }

        $elementId = "{$this->inputAttribute}-summernote";

        Yii::$app->view->registerJs("
            jQuery(function ($) {
                $('#{$this->elementId}').on('summernote.blur', function() {
                    var code = $('#{$this->elementId}').summernote('code');
                    $('#{$elementId}').val(code);
                });
            });
        ");

        return Html::activeHiddenInput($this->model, $this->inputAttribute, ['id' => $elementId]);
    }
}

