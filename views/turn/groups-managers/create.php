<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\turn\TFGroupsManagers */

$this->title = 'Добавление в группу';
$this->params['breadcrumbs'][] = 'Распределение';
$this->params['breadcrumbs'][] = ['label' => 'Менеджеры', 'url' => ['turn/managers/index']];
$this->params['breadcrumbs'][] = ['label' =>$manager->cname , 'url' => ['turn/managers/view', 'id' => $manager->iid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfgroups-managers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'groups' => $groups,
        'manager' => $manager
    ]) ?>

</div>
