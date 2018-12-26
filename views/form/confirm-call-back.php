<?php

use yii\helpers\Html;
use app\modules\b24\assets\B24Asset;
$assetsUrl=B24Asset::register($this);
$this->registerCssFile($assetsUrl->baseUrl . '/css/confirm-calc.css');
$this->registerJSFile($assetsUrl->baseUrl.'/js/yametrika-vorota-dom.js');
if ($contactId) {
    $js = <<<JS
        window.onload = function() {
            yaCounter51320992.reachGoal('webmens_order', {'$model->url': {target: '$model->target'}}); 
            yaCounter51320992.setUserID("$contactId");            
        }
JS;
} else {
    $js = <<<JS
        window.onload = function() {
            yaCounter51320992.reachGoal('webmens_order', {'$model->url': {target: '$model->target'}});                       
        }
JS;
}
$this->registerJs($js);
?>

<section class="bg-light u-content-space">
    <div class="container">

        <div class="block-main row"> 
            <div class="col-md-1"></div>
            <div class="col-md-5 ">
                <header class="text-center w-md-50 mx-auto block-text">
                    <h1 class="h4">Благодарим за обращение!</h1>
                    <h2 class="h5">Мы сважемся с Вами в ближайшее время</h2>
                    <p class="h5">Пока мы расчитываем стоимость указанной конструкции, предлагаем ознакомится с полезной информацией</p>
                    <?= Html::img($assetsUrl->baseUrl . '/images/ico-spacibo.jpg', ['alt' => 'Спасибо', 'class' => 'block-img-spacibo']) ?>
                    <p class='block-regim'>Режим работы: <b>Пн - Пт</b> c 8:00 до 17:00<p>
                </header>
            </div>
            <div class="col-md-5">
                <div class="row block-social">
                    <div class="col-md-8 col-xs-8">
                        <a class="h5" href="https://www.instagram.com/doorhan_krd.ru_89184573929/" target="_blank">Посетите нашу страницу в Instagram</a>
                        <p class="">Вы увидет много выполненых работ с подробными нюансами внешнего вида, монтажа и комплекатции.</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <?= Html::img($assetsUrl->baseUrl . '/images/ico-in.png', ['alt' => 'Иконка инстаграм']) ?>                        
                    </div>
                </div>
                <div class="row block-zamer">
                    <div class="col-md-8 col-xs-8">
                        <a class="h5" href="https://doorhan-krd.ru/help/zamer/" target="_blank">Ознакомтесь с услугой "Замер"</a>
                        <p class="">Вы узнаете какие работы будут проведены и какую информацию получите, после приезда специалиста на Ваш объект.</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <?= Html::img($assetsUrl->baseUrl . '/images/ico-zamer.png', ['alt' => 'Иконка замер']) ?>                        
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>         
        </div>
    </div>
</section>
