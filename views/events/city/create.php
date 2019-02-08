<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\events\EFCity */

$this->title = 'Добавление города';
$this->params['breadcrumbs'][] = ['label' => 'События'];
$this->params['breadcrumbs'][] = ['label' => 'Справочники'];
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="efcity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
