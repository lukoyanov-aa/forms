<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFHearers */

$this->title = 'Create Efhearers';
$this->params['breadcrumbs'][] = ['label' => 'Efhearers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efhearers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
