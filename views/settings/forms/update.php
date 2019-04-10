<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\Forms */

$this->title = 'Изменение формы: ' . $model->cname;
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cname, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="forms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'groups' => $groups,        
    ]) ?>

</div>
