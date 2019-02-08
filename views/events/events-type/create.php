<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFEventsType */

$this->title = 'Добавление типа события';
$this->params['breadcrumbs'][] = ['label' => 'События'];
$this->params['breadcrumbs'][] = ['label' => 'Справочники'];
$this->params['breadcrumbs'][] = ['label' => 'Типы событий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efevents-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
