<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFGroups */

$this->title = 'Изменение группы: ' . $model->cname;
$this->params['breadcrumbs'][] = 'Распределение';
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cname, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="tfgroups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
