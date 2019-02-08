<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFHearers */

$this->title = $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Efhearers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efhearers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iid',
            'cname',
            'ievent_id',
            'cphone',
        ],
    ]) ?>

</div>
