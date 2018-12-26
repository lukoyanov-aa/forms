<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use app\modules\b24\assets\B24Asset;

$assetsUrl = B24Asset::register($this);
$js = <<<JS
        $('#w0').on('beforeSubmit', function () {
            // Вызывается после удачной валидации всех полей и до того как форма отправляется на северер.
            // Тут можно отправить форму через AJAX. Не забудьте вернуть false для того, чтобы форма не отправлялась как обычно.
        $(":submit").prop('disabled', true); 
        return true
        });
JS;
$this->registerJs($js);
$this->registerCssFile($assetsUrl->baseUrl . '/css/gate-sectional-doorhan.css');
$this->registerCssFile($assetsUrl->baseUrl . '/css/forms-general.css');
?>
<section class='landing-block g-pt-10 g-pb-10'>
    <div class='container'>
        <div class="main-form row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <?php
                $form = ActiveForm::begin([
                            'options' => ['class' => 'sectional-gate-calc form-calc g-mb-30'],
                ]);
                ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="goal col-xs-12 col-md-12">
                                <?=
                                        $form->field($model, 'gateTop')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Расстояние от верха проёма до потолка (притолока), мм')
                                ?> 
                            </div>
                            <div class="goal col-xs-12 col-md-12">
                                <?=
                                        $form->field($model, 'gateWidth')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Ширина проёма, мм')
                                ?>  
                            </div>
                            <div class="goal col-xs-12 col-md-12">
                                <?=
                                        $form->field($model, 'gateHeight')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Высота проёма, мм')
                                ?>                   
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="group-check row g-mb-20">
                            <div class="form-check col-sm-6">
                                <?=
                                        $form->field($model, 'door', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Дверь', ['class' => 'form-check-label'])
                                ?>
                            </div>
                            <div class="form-check col-sm-6">
                                <?=
                                        $form->field($model, 'automatic', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Автоматика', ['class' => 'form-check-label'])
                                ?>
                            </div>
                            <div class="form-check col-sm-6">
                                <?=
                                        $form->field($model, 'installation', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Монтаж', ['class' => 'form-check-label'])
                                ?>
                            </div>
                            <div class="form-check col-sm-6">
                                <?=
                                        $form->field($model, 'delivery', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Доставка', ['class' => 'form-check-label'])
                                ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="address col-md-12">
                                <?=
                                        $form->field($model, 'address')
                                        ->textInput(['class' => 'form-control rounded form-control-md'])
                                        ->label('Введите название Вашего населённого пункта')
                                ?> 
                            </div>
                            <div class="name col-xs-6 col-md-6">
                                <?=
                                        $form->field($model, 'name')
                                        ->textInput(['class' => 'form-control rounded'])
                                        ->label('Как к Вам обращаться?')
                                ?>
                            </div>
                            <div class="phone main-phone col-xs-6 col-md-6">
                                <?=
                                        $form->field($model, 'phone')
                                        ->widget(MaskedInput::className(), ['mask' => '+79999999999'])
                                        ->textInput(['placeholder' => '+79999999999', 'class' => 'form-control rounded'])
                                        ->label('<span>*</span> Контактный телефон')
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $form->field($model, 'target')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'url')->hiddenInput()->label(false); ?>  
                <?= $form->field($model, 'utm_source')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_medium')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_campaign')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_term')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'utm_content')->hiddenInput()->label(false); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?=
                        Html::submitButton('Рассчитать стоимость', [
                            'class' => 'btn btn-md u-btn-primary rounded',
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