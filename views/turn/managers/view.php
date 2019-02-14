<?php

use yii\bootstrap\Tabs;
//use yii\grid\GridView;
//use yii\helpers\Html;
$this->title = $model->cname;
$this->params['breadcrumbs'][] = 'Распределение';
$this->params['breadcrumbs'][] = ['label' => 'Менеджеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
echo Tabs::widget([
    'items' => [
        [
            'label' => 'Менеджер',
            'content' => $this->render('_manager_view', ['model' => $model,]),
            'active' => true
        ],
        [
            'label' => 'Группы',
            'content' =>  $this->render('_manager_groups_view', ['groupsDataProvider' => $groupsDataProvider, 'model' => $model]),
        ],
    ]
]);
?>
