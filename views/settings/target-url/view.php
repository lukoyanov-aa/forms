<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\b24\FTargetUrl */

$this->title = $model->ctarget_url;
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Источники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftarget-url-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->iid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->iid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данный источник?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iid',
            'cname',
            'ctitle',
            'csource_id',
            'ctarget_url',
            'cmail',
        ],
    ]) ?>

</div>
