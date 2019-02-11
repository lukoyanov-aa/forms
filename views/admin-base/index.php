<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\b24\models\B24portalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

echo Tabs::widget([
    'items' => [
        [
            'label' => 'Yii2',
            'content' => '<h2>Фреймворк Yii 2 - один из самых быстрых, безопасных и "крутых" php-фреймворков.</h2>',
            'active' => true
        ],
        [
            'label' => 'jQuery',
            'content' => '<h2>jQuery - один из самых популярных JavaScript фреймворков, который работает с объектами DOM.</h2>'
        ],
        [
            'label' => 'Bootstrap',
            'content' => '<h2>Twitter Bootstrap - супер фреймворк, объединяющий в себе html, css, и JavaScript для для верстки веб-интерфейсов и страниц.</h2>',
            'headerOptions' => [
                'id' => 'headerOptions'
            ],
            'options' => [
                'id' => 'options'
            ]
        ],
        [
            'label' => 'Еще табы',
            'content' => '<h2>Вы можете добавить любое количество табов. Просто опишите их структуру в массиве.</h2>'
        ],
        [
            'label' => 'Выпадающий список табов',
            'items' => [
                [
                    'label' => 'Первый таб из выпадающего списка',
                    'content' => '<h2>Обновите свои познания в Yii 2 and Twitter Bootstrap. Все возможнсти уже обернуты в удобные интерфейсы.</h2>'
                ],
                [
                    'label' => 'Второй таб из выпадающего списка',
                    'content' => '<h2>Один в поле не воин, а двое - уже компания.</h2>'
                ],
                [
                    'label' => 'Это третий таб из выпадающего списка',
                    'content' => '<h2>Третий не лишний!</h2>'
                ]
            ]
        ]
    ]
]);

$this->title = 'B24portals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="b24portal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
</div>
<div class="b24-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    
    <p>
        <?php //echo '<pre>' .print_r($arCurrentB24User, true). '<pre>'; ?>
    </p>
</div>
