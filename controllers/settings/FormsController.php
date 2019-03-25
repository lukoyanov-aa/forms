<?php

namespace app\modules\forms\controllers\settings;

use Yii;
use app\modules\forms\models\settings\FForms;
use app\modules\forms\models\settings\FFormsSearch;
use app\modules\forms\controllers\AdminSecondController;
use app\modules\forms\models\turn\TFGroups;
use app\modules\forms\models\settings\FTargetUrl;
use app\modules\forms\models\settings\CrmFields;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * FormsSettingsController implements the CRUD actions for FForms model.
 */
class FormsController extends AdminSecondController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FForms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FFormsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $groups = TFGroups::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'groups' => $groups,
        ]);
    }

    /**
     * Displays a single FForms model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $tab = null)
    {
        if(!$tab){
            $tab = 'base';
        }
        $model = $this->findModel($id);
        $fieldsLeadDataProvider = new ActiveDataProvider(['query' => $model->getLeadsFieldsForm()]);
        $fieldsDealDataProvider = new ActiveDataProvider(['query' => $model->getDealsFieldsForm()]);
        $fieldsMailDataProvider = new ActiveDataProvider(['query' => $model->getMailFieldsForm()]);
        //$groups = TFGroups::find()->all();//?
        //$leadFields = CrmFields::find()->where(['ctype' => 'lead'])->all();
        return $this->render('view', [
            'model' => $model,
            'fieldsLeadDataProvider' => $fieldsLeadDataProvider,
            'fieldsDealDataProvider' => $fieldsDealDataProvider,
            'fieldsMailDataProvider' => $fieldsMailDataProvider,
            'tab' => $tab
                
        ]);
    }
    

    /**
     * Updates an existing FForms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $groups = TFGroups::find()->all();        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        return $this->render('update', [
            'model' => $model,
            'groups' => $groups,                        
        ]);
    }
    

    /**
     * Finds the FForms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FForms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FForms::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
