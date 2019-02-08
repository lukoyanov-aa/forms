<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFCity */

$this->title = 'Изменение города: ' . $model->cname;
$this->params['breadcrumbs'][] = ['label' => 'События'];
$this->params['breadcrumbs'][] = ['label' => 'Справочники'];
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cname, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="efcity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
