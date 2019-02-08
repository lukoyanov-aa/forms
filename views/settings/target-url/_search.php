<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\b24\FTargetUrlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftarget-url-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iid') ?>

    <?= $form->field($model, 'cname') ?>

    <?= $form->field($model, 'ctitle') ?>

    <?= $form->field($model, 'csource_id') ?>    

    <?= $form->field($model, 'ctarget_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
