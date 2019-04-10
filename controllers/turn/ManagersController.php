<?php

namespace app\modules\forms\controllers\turn;

use Yii;
use app\modules\forms\models\turn\Managers;
use app\modules\forms\models\turn\ManagersSearch;
//use app\modules\forms\controllers\TurnController;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ManagersController implements the CRUD actions for Managers model.
 */
class ManagersController extends AdminSecondController {

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
     * Lists all Managers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ManagersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Managers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $groupsDataProvider = new ActiveDataProvider(['query' => $model->getGroupsManagers()]);

        //Yii::warning($model->getGroups());
        return $this->render('view', [
                    'model' => $model,
                    'groupsDataProvider' => $groupsDataProvider
        ]);
    }

    /**
     * Creates a new Managers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Managers();

        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Users = new \Bitrix24\User\User($b24App);
        $b24users = $obB24Users->get('ID', '', ['ACTIVE' => true]);
        $usersList = $this->usersList($b24users);

        return $this->render('create', [
                    'model' => $model,
                    'users' => $usersList,
        ]);
    }

    /**
     * Updates an existing Managers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iid]);
        }

        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Users = new \Bitrix24\User\User($b24App);
        $b24users = $obB24Users->get('ID', '', ['ACTIVE' => true]);
        $usersList = $this->usersList($b24users);

        return $this->render('update', [
                    'model' => $model,
                    'users' => $usersList,
        ]);
    }

    /**
     * Deletes an existing Managers model.
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
     * Finds the Managers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Managers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Managers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function usersList($users) {
        $usersList = array();
        foreach ($users['result'] as $user) {
            $usersList[$user['ID']] = $user['NAME'] . ' ' . $user['LAST_NAME'];
        }
        return $usersList;
    }

}
