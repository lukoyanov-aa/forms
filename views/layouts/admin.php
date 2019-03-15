<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\forms\assets\ModuleAsset;

$assetsUrl = ModuleAsset::register($this);

AppAsset::register($this);
//$this->registerCssFile($assetsUrl->baseUrl . '/js/application.js');
$this->registerJsFile($assetsUrl->baseUrl . '/js/application.js');

$script = <<< JS
    $(document).ready(function () {		
		 
        BX24.init(function(){                        
                app.saveFrameWidth();

        });
        frame = BX24.getScrollSize();
        BX24.resizeWindow(frame.scrollWidth, 400);
    });    
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <script src="//api.bitrix24.com/api/v1/"></script>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="app" style="height: 500px">

            <div class="wrap">
                <?php
                NavBar::begin(
                        [
                            'brandLabel' => 'Webmens forms',
                            'brandUrl' => '/web/forms/admin-base/index',
                            'options' => [
                                'class' => 'navbar-inverse navbar-fixed-top',
                            ],
                        ]
                );

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
//                    [
//                        'label' => 'Домой',
//                        'url' => ['/forms/admin-base/index'],                        
//                    ],
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
                            ],
                        ],
                    ],
                ]);
                NavBar::end();
                ?>

                <div class="container">
                    <?=
                    Breadcrumbs::widget([
                        'homeLink' => ['label' => 'Приложение', 'url' => ['/forms/admin-base/index']],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>                
                    <?= $content ?>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <p class="pull-left">&copy; Webmens <?= date('Y') ?></p>

                    <p class="pull-right"><?= Yii::powered() ?></p>
                </div>
            </footer>
        </div>    
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
