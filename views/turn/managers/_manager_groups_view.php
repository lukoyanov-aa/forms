<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\forms\models\turn\TFGroupsManagersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="tfgroups-managers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?= Html::a('Добавить в группу', ['turn/groups-managers/create', 'imanagers_id' => $model->iid], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $groupsDataProvider,
        'columns' => [
            //'iid',
            [
                'attribute' => 'igroups_id',
                'value' => 'group.cname'
            ],
            'iturn_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'turn/groups-managers',
                'template' => '{delete}',
            ],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>
</div>