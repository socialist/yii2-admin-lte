<?php
/* @val $this \yii\web\View */
use yii\bootstrap\Html;
?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= $avatar ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $userData['username'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= $avatar ?>" class="img-circle" alt="User Image">
                    <p>
                      <?= $userData['username'] ?><br><?= $userData['profession'] ?>
                      <small><?= $userData['regData'] ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <?php if(count($userLinks) > 0) {
                    foreach ($userLinks as $link) { ?>
                    <div class="col-xs-4 text-center">
                      <?= $link ?>
                    </div>
                    <?php }
                    } ?>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= $profileLink ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <?= Html::beginForm($signOutLink, 'post') ?>
                        <?=
                        Html::submitButton(
                            Yii::t('app', 'Sign out'),
                            ['class' => 'btn btn-default btn-flat logout']
                        )
                        ?>
                      <?= Html::endForm() ?>
                    </div>
                  </li>
                </ul>
              </li>