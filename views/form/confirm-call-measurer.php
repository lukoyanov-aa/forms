<?php

use yii\helpers\Html;
use app\modules\b24\assets\B24Asset;

$assetsUrl = B24Asset::register($this);
$this->registerCssFile($assetsUrl->baseUrl . '/css/confirm-call-measurer.css');
$this->registerJSFile($assetsUrl->baseUrl . '/js/yametrika-vorota-dom.js');
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
            <div class="col-md-12 ">
                <header class="text-center w-md-50 mx-auto block-text">
                    <h1 class="h4">Благодарим за обращение!</h1>
                    <h2 class="h5">Мы свяжемся с Вами в ближайшее время</h2>
                    <?= Html::img($assetsUrl->baseUrl . '/images/ico-spacibo.jpg', ['alt' => 'Спасибо', 'class' => 'block-img-spacibo']) ?>
                    <p class='block-regim'>Режим работы:</br><b>Пн - Пт</b> c 8:00 до 17:00<p>
                </header>
            </div>
        </div>
    </div>
</section>



