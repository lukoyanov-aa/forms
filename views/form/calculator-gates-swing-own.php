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
$this->registerCssFile($assetsUrl->baseUrl . '/css/gate-swing-own.css');
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
                            'options' => ['class' => 'sliding-gate-calc form-calc g-mb-30'],
                ]);
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <?=
                                        $form
                                        ->field($model, 'gateFilling')
                                        ->dropDownList($gateFillings, ['class' => 'form-control rounded'])
                                        ->label('Заполнение ворот')
                                ?>                                
                            </div>
                            <div class="goal col-xs-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'gateWidth')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Ширина, мм')
                                ?>                                
                            </div>
                            <div class="goal col-xs-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'gateHeight')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Высота, мм')
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="wicket-select col-md-12">
                                <?=
                                        $form->field($model, 'wicket')
                                        ->dropDownList($wicket, ['class' => 'form-control rounded'])
                                        ->label('Нужна калитка?')
                                ?>                                
                            </div>
                            <div class="wicket col-xs-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'wicketWidth')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Ширина, мм')
                                ?> 
                            </div>
                            <div class="wicket col-xs-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'wicketHeight')
                                        ->textInput(['class' => 'form-control rounded', 'placeholder' => 'Введите значение'])
                                        ->label('Высота, мм')
                                ?>                   
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group-contact row">

                    <div class="col-md-4 col-sm-4 col-sm-push-8">
                        <div class="group-check row g-mb-20">
                            <div class="form-check col-md-12">
                                <?=
                                        $form
                                        ->field($model, 'automatic', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Автоматика')
                                ?>
                            </div>
                            <div class="form-check col-md-12">
                                <?=
                                        $form
                                        ->field($model, 'installation', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Монтаж')
                                ?>
                            </div>
                            <div class="form-check col-md-12">
                                <?=
                                        $form
                                        ->field($model, 'delivery', ['template' => "{input}\n{label}\n{hint}\n{error}",])
                                        ->checkbox(['class' => 'checkbox'], false)
                                        ->label('Доставка')
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-8 col-sm-pull-4">
                        <div class="row g-mb-20">                            
                            <div class="form-group address col-md-12">
                                <?=
                                        $form
                                        ->field($model, 'address')
                                        ->textInput(['class' => 'form-control rounded form-control-md'])
                                        ->label('Введите название Вашего населённого пункта')
                                ?>                                
                            </div>
                            <div class="name col-xs-12 col-sm-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'name')
                                        ->textInput(['class' => 'form-control rounded'])
                                        ->label('Как к Вам обращаться?')
                                ?>
                            </div>
                            <div class="phone main-phone col-xs-12 col-sm-6 col-md-6">
                                <?=
                                        $form
                                        ->field($model, 'phone')
                                        ->widget(MaskedInput::className(), ['mask' => '+79999999999'])
                                        ->textInput(['placeholder' => '+79999999999', 'class' => 'form-control rounded'])
                                        ->label('<span>*</span> Контактный телефон')
                                ?>                                
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
                </div>
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


<?php
$js1 = <<<JS
    if($(".wicket-select select").val()==0){
        $('.wicket input').prop('disabled',true); 
    }
    $(".wicket-select select").change(function(){
        switch ($(".wicket-select select").val()) {
          case "0":
            $('.wicket input').prop('disabled',true);
            break;
          case "1":
            $('.wicket input').prop('disabled',false);
            break;
          case "2":
            $('.wicket input').prop('disabled',false);           
            break;
          default:
            $('.wicket input').prop('disabled',true);
        }  
    });
JS;
$this->registerJs($js1);
?>