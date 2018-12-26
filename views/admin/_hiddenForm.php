<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\b24\models\B24portal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="b24portal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PORTAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACCESS_TOKEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REFRESH_TOKEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MEMBER_ID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
