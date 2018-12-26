<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\b24\models\B24portal */

$this->title = 'Create B24portal';
$this->params['breadcrumbs'][] = ['label' => 'B24portals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="b24portal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
