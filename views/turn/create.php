<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\b24Manager */

$this->title = 'Create B24 Manager';
$this->params['breadcrumbs'][] = ['label' => 'B24 Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="b24-manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
