<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFGroupsManagers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfgroups-managers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'igroups_id')->dropDownList(ArrayHelper::map($groups, 'iid', 'cname')) ?>

    <?= $form->field($model, 'imanagers_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
