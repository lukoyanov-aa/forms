<?php

namespace app\modules\forms\controllers\settings;

use Yii;
use app\modules\forms\models\settings\TargetUrl;
use app\modules\forms\models\settings\TargetUrlSearch;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TargetUrlController implements the CRUD actions for TargetUrl model.
 */
class TargetUrlController extends AdminSecondController
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
     * Lists all TargetUrl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TargetUrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TargetUrl model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TargetUrl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TargetUrl();
        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }
        
        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Sources = new \Bitrix24\CRM\Status($b24App);
                //User\User($b24App);
        $b24sources = $obB24Sources->entityItems('SOURCE');
                //->get('ID', '', ['ACTIVE' => true]);
        //Yii::warning($b24sources);
        //$sourcesList = $this->sourcesList($b24sources);

        return $this->render('create', [
            'model' => $model,
            'sources' => $b24sources,
        ]);
    }

    /**
     * Updates an existing TargetUrl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }
        
        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Sources = new \Bitrix24\CRM\Status($b24App);               
        $b24sources = $obB24Sources->entityItems('SOURCE');

        return $this->render('update', [
            'model' => $model,
            'sources' => $b24sources,
        ]);
    }

    /**
     * Deletes an existing TargetUrl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TargetUrl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TargetUrl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TargetUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
