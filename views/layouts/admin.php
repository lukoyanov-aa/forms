<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => [
//                    ['label' => 'Домой', 'url' => ['admin/admin-base/index']],
//                    ['label' => 'Распределение', 'url' => ['turn/index']],
//                    ['label' => 'События', 'url' => ['events/index']],
//                    ['label' => 'Настройки', 'url' => ['settings/index']],
//                    ['label' => 'Contact', 'url' => ['/site/contact']],
//                ],
//            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    [
                        'label' => 'Домой',
                        'url' => ['/web/forms/admin/admin-base/index'],                        
                    ],
                    [
                        'label' => 'Распределение',
                        'items' => [
                            ['label' => 'Менеджеры', 'url' => '/web/forms/turn/managers/index'],
                            ['label' => 'Группы', 'url' => '/web/forms/turn/groups/index'],
//                            ['label' => 'Группы+Менеджеры', 'url' => '/web/forms/turn/groups-managers/index'],
//                            '<li class="divider"></li>',
//                            '<li class="dropdown-header">Dropdown Header</li>',
//                            ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                        ],
                    ],
                    [
                        'label' => 'Настройки',
                        'items' => [
                            ['label' => 'Источники', 'url' => '/web/forms/settings/target-url/index'],
                            ['label' => 'Формы', 'url' => '/web/forms/settings/forms/index'],
//                            '<li class="divider"></li>',
//                            '<li class="dropdown-header">Dropdown Header</li>',
//                            ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                        ],
                    ],
                    [
                        'label' => 'События',
                        'items' => [
                            ['label' => 'Города', 'url' => '/web/forms/events/city/index'],
                            ['label' => 'Типы событий', 'url' => '/web/forms/events/events-type/index'],
                            ['label' => 'События', 'url' => '/web/forms/events/events/index'],
//                            '<li class="divider"></li>',
//                            '<li class="dropdown-header">Dropdown Header</li>',
//                            ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                        ],
                    ],
//                    [
//                        'label' => 'Login',
//                        'url' => ['site/login'],
//                        'visible' => Yii::$app->user->isGuest
//                    ],
                ],
                //'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>                
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
