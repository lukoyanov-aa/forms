<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfgroups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
