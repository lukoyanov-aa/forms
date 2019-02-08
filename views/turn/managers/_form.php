<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFManagers */
/* @var $form yii\widgets\ActiveForm */
//$model->category_id = array(22,20); 
 
?>

<div class="tfmanagers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ib24_user_id')->dropDownList($users) ?>    

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?> 

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
