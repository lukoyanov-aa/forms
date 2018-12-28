<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\b24Manager */

$this->title = 'Update B24 Manager: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'B24 Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'portal' => $model->portal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="b24-manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
