<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use app\modules\b24\assets\B24Asset;

//yii\web\AssetManager;
$assetsUrl = B24Asset::register($this);
//echo $theme->baseUrl;
//B24Asset::register($this);
$js = <<<JS
        $('#w0').on('beforeSubmit', function () {
            // Вызывается после удачной валидации всех полей и до того как форма отправляется на северер.
            // Тут можно отправить форму через AJAX. Не забудьте вернуть false для того, чтобы форма не отправлялась как обычно.
        $(":submit").prop('disabled', true); 
        return true
        });
JS;
$this->registerJs($js);
$this->registerCssFile($assetsUrl->baseUrl . '/css/gate-form.css');
?>

<section class='landing-block g-pt-10 g-pb-10'>
    <div class='container'>
        <div class="main-form row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <?php
                $form = ActiveForm::begin([
                            'options' => ['class' => 'sliding-gate-calc form-calc g-mb-30'],
                ]);
                ?>
                <div class="form-group form-group-contact row">
                    <div class="name col-md-12">
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control rounded'])->label('Как к Вам обращаться?') ?>

                    </div>
                    <div class="phone main-phone col-md-12">
                        <?=
                                $form
                                ->field($model, 'phone')
                                ->widget(MaskedInput::className(), ['mask' => '+79999999999'])
                                ->textInput(['placeholder' => '+79999999999'])
                                ->label('<span>*</span> Контактный телефон')
                        ?>
                    </div> 
                </div>
                <?= $form->field($model, 'target')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'url')->hiddenInput()->label(false); ?>  
                <?= $form->field($model, 'utm_source')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_medium')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_campaign')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_term')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_content')->hiddenInput()->label(false); ?>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?=
                        Html::submitButton($textSubmit, [
                            'class' => 'btn btn-md u-btn-primary rounded btn-call',
                            'name' => 'action',
                            'value' => 'submit',
                        ])
                        ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</section>
