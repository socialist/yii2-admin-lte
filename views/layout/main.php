<?php
/* @var $this \yii\web\View */
/* @var $content string */

use socialist\adminlte\assets\AdminAsset;
use socialist\adminlte\widgets\Navigation;

use yii\bootstrap\Nav;
use common\components\Rbac as AdminRbac;
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
        <?php
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
        ];
        if (!Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>
        <?= Navigation::widget([
            'logoText' => [
                'logoLg' => Yii::$app->name,
                'logoMini' => substr(Yii::$app->name, 0, 1),
            ],
            'navbarWidgets' => [
                Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems
                ])
            ],
            'sideMenu' => [
                'title' => Yii::t('app', 'Application Menu'),
                'items' => [
                    [
                        'label' => Yii::t('app', 'Dashboard'),
                        'url' => ['/site/index'],
                        'icon' => 'home'
                    ]
                ]
            ]
        ]) ?>

        <div class="content-wrapper"><?= $content ?></div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>