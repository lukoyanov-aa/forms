<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\FormsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iid') ?>

    <?= $form->field($model, 'cname') ?>

    <?= $form->field($model, 'igroup_id') ?>

    <?= $form->field($model, 'iya_counter_id') ?>

    <?= $form->field($model, 'cya_metrika_target') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
