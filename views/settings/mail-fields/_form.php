<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\settings\CrmFields */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- Modal -->
<div class="modal fade" id="modalFields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFieldsTitle">Вставка значения</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                        
                <select name="fields" id="fields" size="6">
                    <?php
                    $formFieldList = ArrayHelper::toArray($formField, [
                                'app\modules\forms\models\settings\FormFields' => [
                                    'iid', 
                                    'cname',
                                    'ctitle'
                                ]
                    ]);
                    foreach ($formFieldList as $key => $value) {
                        echo '<option value="{=' . $value['cname'] . '}">' . $value['ctitle'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" id="addNodalFieldsBTN" onclick="app.addCode()">Вставить</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Отменить</button>                        
            </div>
        </div>
    </div>
</div>
<?php
//echo '<pre>';
//print_r($formFieldList);
//echo '</pre>';
?>
<div class="mail-fields-form">

<?php $form = ActiveForm::begin(); ?>    
       
    <?= $form->field($model, 'cfields_type')->hiddenInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($model, 'cfield')->dropDownList($fieldsList) ?>

    <?= $form->field($model, 'ctext')->textarea(['rows' => 6, 'class'=>'ctext-area form-control']) ?>
    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalFields" data-field="crmfields-ctext">
        ...
    </button>

<?= $form->field($model, 'iforms_id')->hiddenInput()->label(false); ?>

    <div class="form-group">
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
