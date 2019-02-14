<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFGroups */

$this->title = 'Добавление группы';
$this->params['breadcrumbs'][] = ['label' => 'Добавление группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfgroups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
