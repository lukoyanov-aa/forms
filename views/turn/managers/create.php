<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\Managers */

$this->title = 'Добавление менеджера';
$this->params['breadcrumbs'][] = 'Распределение';
$this->params['breadcrumbs'][] = ['label' => 'Менеджеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfmanagers-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ])
    ?>

</div>
