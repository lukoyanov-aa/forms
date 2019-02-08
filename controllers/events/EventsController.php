<?php

namespace app\modules\forms\controllers\events;

use Yii;
use app\modules\forms\models\events\EFEvents;
use app\modules\forms\models\events\EFEventsSearch;
use app\modules\forms\models\events\EFCitySearch;
use app\modules\forms\models\events\EFEventsTypeSearch;
use app\modules\forms\controllers\admin\B24AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventsController implements the CRUD actions for EFEvents model.
 */
class EventsController extends B24AdminSecondController
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
     * Lists all EFEvents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EFEventsSearch();       
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $cityModel = EFCitySearch::find()->all();
        $eventTypeModel = EFEventsTypeSearch::find()->all();
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'cityModel' => $cityModel,
            'eventTypeModel' => $eventTypeModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EFEvents model.
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
     * Creates a new EFEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EFEvents();
        $cityModel = EFCitySearch::find()->all();
        $eventTypeModel = EFEventsTypeSearch::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        return $this->render('create', [
            'model' => $model,
            'cityModel' => $cityModel,
            'eventTypeModel' => $eventTypeModel,
        ]);
    }

    /**
     * Updates an existing EFEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cityModel = EFCitySearch::find()->all();
        $eventTypeModel = EFEventsTypeSearch::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        return $this->render('update', [
            'model' => $model,
            'cityModel' => $cityModel,
            'eventTypeModel' => $eventTypeModel,
        ]);
    }

    /**
     * Deletes an existing EFEvents model.
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
     * Finds the EFEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EFEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EFEvents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
