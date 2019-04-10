<?php

use yii\bootstrap\Tabs;

//use yii\helpers\Html;
//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\forms\Forms */

$this->title = $model->cname;
$this->params['breadcrumbs'][] = ['label' => 'Настройки'];
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$items = [
    [
        'label' => 'Формы',
        'content' => $this->render(
                '_form_view', [
            'model' => $model,
                ]
        ),
        'active' => $tab == 'base' ? true : false
    ],
];

//Yii::warning($items);

if ($model->bemail) {
    $mail = [
        'label' => 'Email',
        'content' => $this->render(
                '_form_mail_view', 
                    [
                        'fieldsMailDataProvider' => $fieldsMailDataProvider, 
                        'model' => $model
                    ]
        ),
        'active' => $tab == 'mail' ? true : false
    ];
    array_push($items, $mail);
}
//Yii::warning($items);
switch ($model->ccrm) {
    case 'none':
        //return 'не создавать';
        break;
    case 'lead':
        $lead = [
            'label' => 'Лид',
            'content' => $this->render(
                    '_form_lead_view', 
                    [
                        'fieldsLeadDataProvider' => $fieldsLeadDataProvider, 
                        'model' => $model
                    ]
            ),
            'active' => $tab == 'lead' ? true : false
        ];
        array_push($items, $lead);
        //return 'Лид';
        break;
    case 'deal':
        $deal = [
            'label' => 'Сделка',
            'content' => $this->render(
                    '_form_deal_view',
                    [
                        'fieldsDealDataProvider' => $fieldsDealDataProvider, 
                        'model' => $model
                    ]
            ),
            'active' => $tab == 'deal' ? true : false
        ];
        array_push($items, $deal);
        //return 'Сделка';
        break;
    default :
        //return 'не создавать';
        break;
}

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
