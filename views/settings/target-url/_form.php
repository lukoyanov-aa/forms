<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\b24\TargetUrl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftarget-url-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ctitle')->textInput(['maxlength' => true]) ?>    
    
    <?= $form->field($model, 'csource_id')->dropDownList(ArrayHelper::map($sources['result'], 'STATUS_ID', 'NAME')) ?>    

    <?= $form->field($model, 'ctarget_url')->textInput(['maxlength' => true]) ?>    
        
    <?= $form->field($model, 'cmail')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
