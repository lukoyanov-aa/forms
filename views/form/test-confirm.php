<?php

use yii\helpers\Html;
use app\modules\forms\assets\ModuleAsset;

$assetsUrl = ModuleAsset::register($this);
//$this->registerCssFile($assetsUrl->baseUrl . '/css/confirm-event-registration.css');
$yametrika = <<<JS
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym($formSettings->iya_counter_id, "init", {
            id:$formSettings->iya_counter_id,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });

        window.onload = function() {
            yaCounter$formSettings->iya_counter_id.reachGoal('$formSettings->cya_metrika_target', {'$model->url': {target: '$model->target'}});
        }
JS;
$this->registerJs($yametrika);
$google_id = explode("/", $formSettings->cgoogle_id);
$this->registerJsFile('https://www.googletagmanager.com/gtag/js?id='.$google_id[0],['position' => $this::POS_END, 'async'=>'async']);
$gtag = <<<JS
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '$google_id[0]');
        function gtag_report_conversion() {
            gtag('event', 'conversion', {
                'send_to': '$formSettings->cgoogle_id'                
            });            
        }
         window.onload = function() {
            gtag_report_conversion();
        }
JS;
$this->registerJs($gtag);
?>

<section class="bg-light u-content-space">
    <div class="container">

        <div class="block-main row"> 
            <div class="col-md-1"></div>
            <div class="col-md-5 ">
                <header class="text-center w-md-50 mx-auto block-text">
                    <h1 class="h4">Заявка принята!</h1>
                    <h2 class="h5">Мы свяжемся с Вами в ближайшее время и сообщим всю интересующую Вас информацию!</h2>
                    <img class="block-img-spacibo" src="https://files.annaholod.ru/img/ico-spacibo.png" alt="Спасибо">
                </header>
            </div>
            <div class="col-md-5">
                <div class="row block-social">
                    <div class="col-md-8 col-xs-8">
                        <a class="h5" href="https://www.instagram.com/anna_holod_school/" target="_blank">Посетите нашу страницу в Instagram</a>
                        <p class="">Вы увидите много выполненных работ, а также сможете почитать отзывы наших учеников :)</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <img class="" src="https://files.annaholod.ru/img/ico-youtube.jpg" alt="Иконка инстаграм">
                    </div>
                </div>
                <div class="row block-zamer">
                    <div class="col-md-8 col-xs-8">
                        <a class="h5" href="https://www.youtube.com/channel/UCADHydG-5zaCW288q1lD9fw" target="_blank">Посетите наш канал на YouTube</a>
                        <p class="">Вы увидите, как проходили мастер-классы, а также результаты нашего творчества!</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <img class="" src="https://files.annaholod.ru/img/ico-instagram.jpg" alt="Иконка YouTube">
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>         
        </div>
    </div>
</section>
