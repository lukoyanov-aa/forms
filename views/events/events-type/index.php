<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\forms\models\events\EFEventsTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы событий';
$this->params['breadcrumbs'][] = ['label' => 'События'];
$this->params['breadcrumbs'][] = ['label' => 'Справочники'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efevents-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить тип события', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'iid',
            'cname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
