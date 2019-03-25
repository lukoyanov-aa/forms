<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\forms\models\forms\FFormsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Формы';
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fforms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'iid',
            'cname',
            [
                'attribute' => 'igroup_id',
                'content' => function($data) {
                    return $data->getGroupName();
                },
                'filter' => ArrayHelper::map($groups, 'iid', 'cname'),
            ],
            'iya_counter_id',
            'cya_metrika_target',
            [
                'attribute' => 'ccrm',
                'content' => function($data) {                    
                    return $data->getCrmName();                    
                },
                'filter' => array("none" => "не создавать", "lead" => "Лид" , "deal" => "Сделка"),
            ],
                        
            [
                'attribute' => 'bemail',
                'format' => 'raw',
                'filter' => false,
                'value' => function ($searchModel, $index, $widget) {
                    return Html::checkbox('bemail[]', $searchModel->bemail, ['value' => $index, 'disabled' => true]);
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
