<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\Forms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->hiddenInput() ?>
    
    <?= $form->field($model, 'igroup_id')->dropDownList(ArrayHelper::map($groups, 'iid', 'cname')) ?>

    <?= $form->field($model, 'iya_counter_id')->textInput() ?>

    <?= $form->field($model, 'cya_metrika_target')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'cgoogle_id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'ccrm')->dropDownList(array("none" => "не создавать", "lead" => "Лид" , "deal" => "Сделка")) ?> 
    
    <?= $form->field($model, 'bemail')->checkbox(['class' => 'checkbox'], false) ?>     

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
