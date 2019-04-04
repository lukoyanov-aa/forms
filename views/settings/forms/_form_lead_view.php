<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\forms\models\turn\TFGroupsManagersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$form_id = $model->iid;
?>
<div class="form-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
        <?= Html::a('Добавить поле', ['settings/crm-fields/create', 'form_id' => $model->iid, 'field_type' => 'lead'], ['class' => 'btn btn-success']) ?>        
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $fieldsLeadDataProvider,
        'columns' => [
            'cfield',
            'ctext:ntext',
            'cfields_type',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key)  {
                        return Html::a('', ['settings/crm-fields/update', 'id' => $key], ['class' => 'glyphicon glyphicon-pencil']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('', ['settings/crm-fields/view', 'id' => $key], ['class' => 'glyphicon glyphicon-eye-open']);
                    },
                    'delete' => function ($url, $model, $key) use($form_id)  {
                        return Html::a('', ['settings/crm-fields/delete', 'id' => $key, 'form_id'=>$form_id, 'tab'=>'lead'], ['class' => 'glyphicon glyphicon-trash', 'title' => 'Удалить', 'aria-label'=>'Удалить', 'data-pjax'=>0, 'data-confirm'=>'Вы уверены, что хотите удалить этот элемент?', 'data-method'=>'post']);
                    }, 
                            
                         
                            //<a href="/web/forms/settings/crm-fields/delete?id=1" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            
                            
                ],
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>