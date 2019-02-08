<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

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
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>
</div>
