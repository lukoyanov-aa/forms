<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFEvents */

$this->title = $model->cname;
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efevents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->iid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данное событие?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iid',
            'cname',            
            [
                'label' => $model->getAttributeLabel('itype_id'),
                'value' => $model->eventType->cname,
            ],
            [
                'label' => $model->getAttributeLabel('bopened'),
                'attribute' => 'bopened',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::checkbox('bopened[]', $model->bopened, ['value' => $index, 'disabled' => true]);
                },
            ],
            'imin',
            'imax',
            'ddate_event',
            [
                'label' => $model->getAttributeLabel('icity_id'),
                'value' => $model->city->cname,
            ],            
            //'icity_id',
            'cadress',
            'fbase_price',
            'fprice1',
            'fprice2',
            'dprice1_date',
            'dprice2_date',
        ],
    ])
    ?>

</div>
