<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\b24\models\B24portal */

$this->title = $model->PORTAL;
$this->params['breadcrumbs'][] = ['label' => 'B24portals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="b24portal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PORTAL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PORTAL], [
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
            'PORTAL',
            'ACCESS_TOKEN',
            'REFRESH_TOKEN',
            'MEMBER_ID',
        ],
    ]) ?>

</div>
