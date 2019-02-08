<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFGroups */

$this->title = 'Update Tfgroups: ' . $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Tfgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iid, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tfgroups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
