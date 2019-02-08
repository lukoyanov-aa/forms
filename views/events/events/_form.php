<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="efevents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itype_id')->dropDownList(ArrayHelper::map($eventTypeModel, 'iid', 'cname')) ?>

    <?= $form->field($model, 'bopened')->checkbox(['class' => 'checkbox'], false) ?>

    <?= $form->field($model, 'imin')->textInput() ?>

    <?= $form->field($model, 'imax')->textInput() ?>    

    <?=
    $form->field($model, 'ddate_event')->widget(\yii\jui\DatePicker::class, [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
    ])
    ?>

    <?= $form->field($model, 'icity_id')->dropDownList(ArrayHelper::map($cityModel, 'iid', 'cname')) ?>

    <?= $form->field($model, 'cadress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fbase_price')->textInput() ?>

    <?= $form->field($model, 'fprice1')->textInput() ?>

    <?= $form->field($model, 'fprice2')->textInput() ?>

    <?=
    $form->field($model, 'dprice1_date')->widget(\yii\jui\DatePicker::class, [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
    ])
    ?>

<?=
$form->field($model, 'dprice2_date')->widget(\yii\jui\DatePicker::class, [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
])
?>

    <div class="form-group">
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
