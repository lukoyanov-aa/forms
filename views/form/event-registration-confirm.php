<?php

use yii\helpers\Html;
use app\modules\forms\assets\formsAsset;

$assetsUrl = formsAsset::register($this);
$this->registerCssFile($assetsUrl->baseUrl . '/css/confirm-event-registration.css');
$yametrika = <<<JS
        (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter$formSettings->iya_counter_id = new Ya.Metrika2({
                    id:$formSettings->iya_counter_id,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
        window.onload = function() {
            yaCounter$formSettings->iya_counter_id.reachGoal('$formSettings->cya_metrika_target', {'$model->url': {target: '$model->target'}});
        }
JS;
$this->registerJs($yametrika);
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
                      <a href="https://www.instagram.com/anna_holod_school/" target="_blank">
                        <img class="" src="https://files.annaholod.ru/img/ico-instagram.jpg" alt="Иконка инстаграм">
                      </a>
                    </div>
                </div>
                <div class="row block-zamer">
                    <div class="col-md-8 col-xs-8">
                        <a class="h5" href="https://www.youtube.com/channel/UCADHydG-5zaCW288q1lD9fw" target="_blank">Посетите наш канал на YouTube</a>
                        <p class="">Вы увидите, как проходили мастер-классы, а также результаты нашего творчества!</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <a href="https://www.youtube.com/channel/UCADHydG-5zaCW288q1lD9fw" target="_blank">
                        <img class="" src="https://files.annaholod.ru/img/ico-youtube.jpg" alt="Иконка YouTube">
                      </a>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>         
        </div>
    </div>
</section>
