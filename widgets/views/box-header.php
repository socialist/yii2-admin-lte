<?php
use yii\helpers\Html;
?>

<div class="box-header">
    <?= isset($icon) ? Html::tag('i', '', ['class' => "fa fa-{$icon}"]) : '' ?>

    <?= isset($title) ? Html::tag('h3', $title, ['class' => 'box-title']) : '' ?>

    <?php if (isset($tools) && is_array($tools)) { ?>
        <div class="box-tools pull-right">
            <?php foreach ($tools as $tool) {
                echo $tool;
            } ?>
        </div>
    <?php } ?>
</div>