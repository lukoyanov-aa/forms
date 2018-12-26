<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\b24\models\B24portal */

$this->title = 'Update B24portal: ' . $model->PORTAL;
$this->params['breadcrumbs'][] = ['label' => 'B24portals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PORTAL, 'url' => ['view', 'id' => $model->PORTAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="b24portal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
