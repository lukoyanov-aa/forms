<?php

namespace app\modules\forms\controllers\settings;

use Yii;
use app\modules\forms\models\settings\FTargetUrl;
use app\modules\forms\models\settings\FTargetUrlSearch;
use app\modules\forms\controllers\admin\B24AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TargetUrlController implements the CRUD actions for FTargetUrl model.
 */
class TargetUrlController extends B24AdminSecondController
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
     * Lists all FTargetUrl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FTargetUrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FTargetUrl model.
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
     * Creates a new FTargetUrl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FTargetUrl();
        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }
        
        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], null, null, $this->moduleParams['applicationScope'], $AccessParams);
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
     * Updates an existing FTargetUrl model.
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
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], null, null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Sources = new \Bitrix24\CRM\Status($b24App);               
        $b24sources = $obB24Sources->entityItems('SOURCE');

        return $this->render('update', [
            'model' => $model,
            'sources' => $b24sources,
        ]);
    }

    /**
     * Deletes an existing FTargetUrl model.
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
     * Finds the FTargetUrl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FTargetUrl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FTargetUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
