<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Tabs;

$this->title = 'B24portals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "col-xs-12 col-md-4">
    <ul class="nav">
        <li class="nav-header">Главные ссылки</li>
        <li class="active"><a href="#">Главная</a></li>
        <li><a href="#">Обратная связь</a></li>
        <li><a href="#">Каталог</a></li>
        <li class="nav-header">Дополнительные</li>
        <li><a href="#">Наши филиалы</a></li>
        <li><a href="#">Календарь мероприятий</a></li>
        <li class="nav-divider"></li>
        <li><a href="#">Вакансии</a></li>
    </ul>
</div>
<div class="b24portal-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
<div class="b24-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>

    <p>
        <?php //echo '<pre>' .print_r($arCurrentB24User, true). '<pre>'; ?>
    </p>
</div>
