<?php
use yii\helpers\Html;
?>

<div class="box-header">
    <?= isset($icon) ? Html::tag('i', '', ['class' => "fa fa-{$icon}"]) : '' ?>

    <?= isset($title) ? Html::tag('h3', $title, ['class' => 'box-title']) : '' ?>

    <?= $tools->render() ?>
</div>