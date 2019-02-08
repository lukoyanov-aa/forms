<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFHearers */

$this->title = 'Update Efhearers: ' . $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Efhearers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iid, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="efhearers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
