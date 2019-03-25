<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\settings\CrmFields */


$this->title = $model->cfield;
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['settings/forms/index']];
$this->params['breadcrumbs'][] = ['label' => 'Форма', 'url' => ['settings/forms/view', 'id' => $model->iforms_id]];
switch ($model->ctype) {
    case 'lead':
        $this->params['breadcrumbs'][] = ['label' => 'Поля лида']; //?
        break;
    case 'deal':
        $this->params['breadcrumbs'][] = ['label' => 'Поля сделки']; //?
        break;
}
$this->params['breadcrumbs'][] = $this->title;



\yii\web\YiiAsset::register($this);
?>
<div class="form-fields-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->iid,  'form_id'=>$model->iforms_id, 'tab'=>$model->ctype ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Отмена', ['settings/forms/view', 'id' => $model->iforms_id, 'tab'=>$model->ctype], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iid',
            'ctype',
            'cfield',
            'ctext:ntext',
            'iforms_id',
        ],
    ]) ?>

</div>
