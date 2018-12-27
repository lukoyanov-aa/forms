<?php
namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\turn\b24Manager;
use app\modules\forms\models\turn\b24ManagerSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TurnController implements the CRUD actions for b24Manager model.
 */
class TurnController extends B24AdminSecondController
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
     * Lists all b24Manager models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new b24ManagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single b24Manager model.
     * @param integer $id
     * @param string $portal
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $portal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $portal),
        ]);
    }

    /**
     * Creates a new b24Manager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new b24Manager();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'portal' => $model->portal]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing b24Manager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $portal
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $portal)
    {
        $model = $this->findModel($id, $portal);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'portal' => $model->portal]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing b24Manager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $portal
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $portal)
    {
        $this->findModel($id, $portal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the b24Manager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $portal
     * @return b24Manager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $portal)
    {
        if (($model = b24Manager::findOne(['id' => $id, 'portal' => $portal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

//
//namespace app\modules\forms\controllers;
//use Yii;
//use app\modules\forms\models\turn\B24CalcGroupManager;
//
//class TurnController extends B24AdminSecondController {
//    public function actionIndex() {        
//        return $this->render('index');
//    }
//}
