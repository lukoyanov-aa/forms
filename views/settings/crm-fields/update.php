<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\settings\CrmFields */

$this->title = 'Изменение поля '. $model->cfield;

$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['settings/forms/index']];
$this->params['breadcrumbs'][] = ['label' => 'Форма', 'url' => ['settings/forms/view', 'id' => $model->iforms_id]];
switch ($model->ctype) {
    case 'lead':
        $this->params['breadcrumbs'][] = ['label' => 'Поля лида']; //?
        break;
    case 'deal':
        $this->params['breadcrumbs'][] = ['label' => 'Поля сделки']; //?
        break;
}
$this->params['breadcrumbs'][] = $this->title;



//$this->params['breadcrumbs'][] = ['label' => 'Form Fields', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'fieldsList' => $fieldsList,
        'formField' => $formField
    ])
    ?>

</div>

