<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\b24\FTargetUrl */

$this->title = 'Изменение источника: ' . $model->ctarget_url;
$this->params['breadcrumbs'][] = ['label' => 'Источники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ctarget_url, 'url' => ['view', 'id' => $model->iid]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="ftarget-url-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sources' => $sources,
    ]) ?>

</div>
