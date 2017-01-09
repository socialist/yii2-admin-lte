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
        $menuItems = []; /*[
            ['label' => 'Home', 'url' => ['/site/index']],
        ];
        if (!Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems = '<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">' . Yii::$app->user->identity->username . '</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  ' . Yii::$app->user->identity->username . ' - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>';
        }*/
        ?>
        <?= Navigation::widget([
            'logoText' => [
                'logoLg' => Yii::$app->name,
                'logoMini' => substr(Yii::$app->name, 0, 1),
            ],
            /*'navbarWidgets' => [
                $menuItems
            ],*/
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