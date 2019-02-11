<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use app\modules\forms\assets\formsAsset;
use yii\helpers\ArrayHelper;
$assetsUrl = formsAsset::register($this);

$js = <<<JS
        $('#w0').on('beforeSubmit', function () {
            // Вызывается после удачной валидации всех полей и до того как форма отправляется на северер.
            // Тут можно отправить форму через AJAX. Не забудьте вернуть false для того, чтобы форма не отправлялась как обычно.
        $(":submit").prop('disabled', true); 
        return true
        });
JS;
$this->registerJs($js);

$this->registerCssFile($assetsUrl->baseUrl . '/css/event-registration.css');
?>

<section class='landing-block g-pt-10 g-pb-10'>
    <div class='container'>
        <div class="main-form row">
            <div class="lateral-block col-md-3">
            </div>
            <div class="col-md-6">
                <?php
                $form = ActiveForm::begin([
                            'options' => ['class' => 'master-class-form form-calc g-mb-30'],
                ]);
                ?>
                <div class="row">
                    <div class="form-title">
                        <p>Оставьте заявку, мы сообщим Вам стоимость и подробную программу мастер-класса</p>
                    </div>  
                    <div class="col-md-12">
                        <?= $form->field($model, 'event_id')->dropDownList(ArrayHelper::map($events, 'iid', 'cname'),['class' => 'form-control rounded form-group'])->label('Интересующий мастер-класс') ?>                        
                    </div>
                    <div class="name col-xs-12 col-sm-6 col-md-6">                    
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-group form-control rounded'])->label('Ваше имя?') ?>
                    </div>
                    <div class="phone main-phone col-xs-12 col-sm-6 col-md-6">                    
                        <?=
                                $form
                                ->field($model, 'phone')
                                ->widget(MaskedInput::className(), ['mask' => '+79999999999'])
                                ->textInput(['placeholder' => '+79999999999'])
                                ->label('<span>*</span> Контактный телефон')
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?=
                        Html::submitButton('Оставить заявку', [
                            'class' => 'form-group btn btn-md u-btn-primary rounded',
                            'name' => 'master-class-form',
                            'value' => 'submit',
                        ])
                        ?>                    
                    </div>
                    <div class="stock-block col-md-6">
                        <p class="stock-text1">Успейте записаться,</p>
                        <p class="stock-text2">места ограниченны</p>
                    </div>
                </div>

                <?= $form->field($model, 'target')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'url')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_source')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_medium')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_campaign')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_term')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_content')->hiddenInput()->label(false); ?> 
                <?= $form->field($model, 'event')->hiddenInput()->label(false); ?> 
                <?= $form->field($model, 'event_type')->hiddenInput()->label(false); ?> 
                <?php ActiveForm::end(); ?>
            </div>
            <div class="lateral-block col-md-3">
            </div>
        </div>
    </div>
</section>
