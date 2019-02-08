<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\turn\b24Manager;
use app\modules\forms\models\turn\b24ManagerSearch;
use app\modules\forms\models\turn\b24Groups;
use app\modules\forms\models\turn\b24GroupsSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TurnController implements the CRUD actions for b24Manager model.
 */
class TurnController extends B24AdminSecondController {

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
     * Lists all b24Manager models.
     * @return mixed
     */
    public function actionManagers() {
        $searchModel = new b24ManagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('managers', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex() {        
        return $this->render('index');
    }

    /**
     * Displays a single b24Manager model.
     * @param integer $id     
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewManager($id) {
        return $this->render('view-manager', [
                    'model' => $this->findManagerModel($id),
        ]);
    }

    /**
     * Creates a new b24Manager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateManager() {
        $model = new b24Manager();
        $session = Yii::$app->session;
        $AccessParams = $session->get('AccessParams');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-manager', 'id' => $model->id]);
        }

        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], null, null, $this->moduleParams['applicationScope'], $AccessParams);
        $obB24Users = new \Bitrix24\User\User($b24App);
        $b24users = $obB24Users->get('ID', '', ['ACTIVE' => true]);
        $usersList = $this->usersList($b24users);

        return $this->render('create-manager', [
                    'model' => $model,
                    'users' => $usersList,
        ]);
    }

    private function usersList($users) {
        $usersList = array();
        foreach ($users['result'] as $user) {
            $usersList[$user['ID']] = $user['NAME'] . ' ' . $user['LAST_NAME'];
        }
        return $usersList;
    }

    /**
     * Updates an existing b24Manager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id     
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateManager($id) {
        $model = $this->findManagerModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-manager', 'id' => $model->id,]);
        }


        $component = new \app\components\b24Tools();
        $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], null, null, $this->moduleParams['applicationScope'], $this->accessParams);
        $obB24Users = new \Bitrix24\User\User($b24App);
        // \CRM\Lead($obB24App);
        $b24users = $obB24Users->get('ID', '', ['ACTIVE' => true]);
        $usersList = $this->usersList($b24users);

        //Yii::warning($b24users);
        //->add($liedFieldsArray);        


        return $this->render('update-manager', [
                    'model' => $model,
                    'users' => $usersList,
        ]);
    }

    /**
     * Deletes an existing b24Manager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id     
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteManager($id) {
        $this->findManagerModel($id)->delete();

        return $this->redirect(['managers']);
    }

    /**
     * Finds the b24Manager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return b24Manager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findManagerModel($id) {
        if (($model = b24Manager::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * Lists all b24Groups models.
     * @return mixed
     */
    public function actionGroups()
    {
        $searchModel = new b24GroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('groups', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single b24Groups model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewGroup($id)
    {
        return $this->render('view-group', [
            'model' => $this->findGroupModel($id),
        ]);
    }

    /**
     * Creates a new b24Groups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateGroup()
    {
        $model = new b24Groups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-group', 'id' => $model->id]);
        }

        return $this->render('create-group', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing b24Groups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateGroup($id)
    {
        $model = $this->findGroupModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-group', 'id' => $model->id]);
        }

        return $this->render('update-group', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing b24Groups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteGroup($id)
    {
        $this->findGroupModel($id)->delete();

        return $this->redirect(['groups']);
    }

    /**
     * Finds the b24Groups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return b24Groups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findGroupModel($id)
    {
        if (($model = b24Groups::findOne($id)) !== null) {
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
