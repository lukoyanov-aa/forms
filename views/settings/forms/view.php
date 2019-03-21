<?php

use yii\bootstrap\Tabs;

//use yii\helpers\Html;
//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\FForms */

$this->title = $model->cname;
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$items = [
    [
        'label' => 'Формы',
        'content' => $this->render('_form_view', ['model' => $model,]),
        'active' => true
    ],
];

Yii::warning($items);

if($model->bemail){
    $mail = [
        'label' => 'Email',
        'content' => $this->render('_form_mail_view')        
    ];
    array_push($items, $mail); 
}
Yii::warning($items);

echo Tabs::widget([
    'items' => $items
//    [
//        [
//            'label' => 'Формы',
//            'content' => $this->render('_form_view', ['model' => $model,]),
//            'active' => true
//        ],
//        [
//            'label' => 'Группы',
//            'content' =>  $this->render('_manager_groups_view', ['groupsDataProvider' => $groupsDataProvider, 'model' => $model]),
//        ],
//    ]
]);
?>
