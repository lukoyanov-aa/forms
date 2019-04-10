<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\GroupsManagers */

$this->title = 'Update Tfgroups Managers: ' . $model->iid;
$this->params['breadcrumbs'][] = ['label' => 'Tfgroups Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iid, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tfgroups-managers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
