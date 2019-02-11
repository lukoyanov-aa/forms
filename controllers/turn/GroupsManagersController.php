<?php

namespace app\modules\forms\controllers\turn;

use Yii;
use app\modules\forms\models\turn\TFGroupsManagers;
use app\modules\forms\models\turn\TFGroupsManagersSearch;
use app\modules\forms\models\turn\TFGroups;
use app\modules\forms\models\turn\TFManagers;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupsManagersController implements the CRUD actions for TFGroupsManagers model.
 */
class GroupsManagersController extends AdminSecondController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all TFGroupsManagers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TFGroupsManagersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TFGroupsManagers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TFGroupsManagers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($imanagers_id = null) {
        $model = new TFGroupsManagers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['turn/managers/view', 'id'=>$imanagers_id]);
        }

        $model->imanagers_id = $imanagers_id;
        $groups = TFGroups::find()->all();
        $manager = TFManagers::find()->where(['iid' => $imanagers_id])->one();

        return $this->render('create', [
                    'model' => $model,
                    'groups' => $groups,
                    'manager' => $manager
        ]);
    }

    /**
     * Updates an existing TFGroupsManagers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $imanagers_id = null) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TFGroupsManagers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TFGroupsManagers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TFGroupsManagers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TFGroupsManagers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
