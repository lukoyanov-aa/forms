<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\b24\FTargetUrl */

$this->title = 'Добавление Источник';
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Источник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftarget-url-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sources' => $sources,
    ]) ?>

</div>
