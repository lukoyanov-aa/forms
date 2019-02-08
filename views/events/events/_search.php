<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="efevents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iid') ?>

    <?= $form->field($model, 'cname') ?>

    <?= $form->field($model, 'itype_id') ?>

    <?= $form->field($model, 'bopened') ?>

    <?= $form->field($model, 'imin') ?>

    <?php // echo $form->field($model, 'imax') ?>

    <?php // echo $form->field($model, 'ddate_event') ?>

    <?php // echo $form->field($model, 'icity_id') ?>

    <?php // echo $form->field($model, 'cadress') ?>

    <?php // echo $form->field($model, 'fbase_price') ?>    

    <?php // echo $form->field($model, 'dprice1_date') ?>

    <?php // echo $form->field($model, 'dprice2_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
