<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\forms\models\events\EFEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'iid',            
            'cname', 
            [
                'attribute' => 'itype_id',                
                'content' => function($data) {
                    return $data->getEventTypeName();
                },
                'filter' => ArrayHelper::map($eventTypeModel, 'iid', 'cname'),
            ],
            [
                'attribute' => 'bopened',
                'format' => 'raw',
                'filter' => false,
                'value' => function ($searchModel, $index, $widget) {
                    return Html::checkbox('bopened[]', $searchModel->bopened, ['value' => $index, 'disabled' => true]);
                },
            ],            
            //'imin',
            //'imax',
            'ddate_event',
            [
                'attribute' => 'icity_id',                
                'content' => function($data) {
                    return $data->getCityName();
                },
                'filter' => ArrayHelper::map($cityModel, 'iid', 'cname'),
            ],            
            'cadress',
            //'fbase_price',
            //'fprice1',
            //'fprice2',
            //'dprice1_date',
            //'dprice2_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
