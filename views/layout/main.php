<?php
/* @var $this \yii\web\View */
/* @var $content string */

use socialist\adminlte\assets\AdminAsset;
use socialist\adminlte\widgets\Navigation;
use socialist\adminlte\base\Config;

use yii\helpers\Html;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= Navigation::widget([
            'logoText' => [
                'logoLg' => Yii::$app->name,
                'logoMini' => substr(Yii::$app->name, 0, 1),
            ],
            'navbarWidgets' => [
                \socialist\adminlte\widgets\navbar\UserMenu::widget(Config::get('userMenu'))
            ],
        ]) ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1><?= Html::encode($this->title) ?></h1>
            </section>
            <div class="content">
                <?= $content ?>
            </div>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2016 <?= Html::a(Yii::$app->name, ['/']) ?>.</strong> All rights
            reserved.
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>