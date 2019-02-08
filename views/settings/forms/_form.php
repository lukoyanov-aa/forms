<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\FForms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fforms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->hiddenInput() ?>
    
    <?= $form->field($model, 'igroup_id')->dropDownList(ArrayHelper::map($groups, 'iid', 'cname')) ?>

    <?= $form->field($model, 'iya_counter_id')->textInput() ?>

    <?= $form->field($model, 'cya_metrika_target')->textInput(['maxlength' => true]) ?> 

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
