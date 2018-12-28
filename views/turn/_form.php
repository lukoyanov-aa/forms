<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\b24Manager */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="//api.bitrix24.com/api/v1/"></script>

<div class="b24-manager-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->dropDownList($users) ?>
 
    <?= $form->field($model, 'portal')->hiddenInput(['maxlength' => true])->label(false) ?>    

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
