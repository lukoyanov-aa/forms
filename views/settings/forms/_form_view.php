<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\FForms */

//$this->title = $model->cname;
//$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
//$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fforms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>        
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iid',
            'cname',
            [
                'label' => $model->getAttributeLabel('igroup_id'),
                'value' => $model->group->cname,
            ],
            'iya_counter_id',
            'cya_metrika_target',
            'cgoogle_id',
            [
                'label' => $model->getAttributeLabel('ccrm'),
                'value' => $model->getCrmName(),
            ],
            //'ccrm', 
            [
                'label' => $model->getAttributeLabel('bemail'),
                'attribute' => 'bemail',
                'format' => 'raw',
                'value' => function ($model, $widget) {
                    return Html::checkbox('bemail[]', $model->bemail, ['value' => $index, 'disabled' => true]);
                },
            ],                       
        ],
    ])
    ?>

</div>
