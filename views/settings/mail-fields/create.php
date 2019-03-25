<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\settings\CrmFields */

$this->title = 'Добавление поля';

$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['settings/forms/index']];
$this->params['breadcrumbs'][] = ['label' => 'Форма', 'url' => ['settings/forms/view', 'id' => $model->iforms_id]];
$this->params['breadcrumbs'][] = ['label' => 'Поля письма'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mail-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'fieldsList' => $fieldsList,
        'formField' => $formField
    ])
    ?>

</div>
