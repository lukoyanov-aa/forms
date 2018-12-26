<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b24\models\B24portalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="b24portal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PORTAL') ?>

    <?= $form->field($model, 'ACCESS_TOKEN') ?>

    <?= $form->field($model, 'REFRESH_TOKEN') ?>

    <?= $form->field($model, 'MEMBER_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
