<?php

namespace app\modules\forms\controllers\turn;

use Yii;
use app\modules\forms\models\turn\GroupsManagers;
use app\modules\forms\models\turn\GroupsManagersSearch;
use app\modules\forms\models\turn\Groups;
use app\modules\forms\models\turn\Managers;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupsManagersController implements the CRUD actions for GroupsManagers model.
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
     * Lists all GroupsManagers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GroupsManagersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupsManagers model.
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
     * Creates a new GroupsManagers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($imanagers_id = null) {
        $model = new GroupsManagers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['turn/managers/view', 'id'=>$imanagers_id]);
        }

        $model->imanagers_id = $imanagers_id;
        $groups = Groups::find()->all();
        $manager = Managers::find()->where(['iid' => $imanagers_id])->one();

        return $this->render('create', [
                    'model' => $model,
                    'groups' => $groups,
                    'manager' => $manager
        ]);
    }

    /**
     * Updates an existing GroupsManagers model.
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
     * Deletes an existing GroupsManagers model.
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
     * Finds the GroupsManagers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupsManagers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GroupsManagers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
