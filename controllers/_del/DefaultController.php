<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\b24\models\B24portal;
use app\modules\b24\models\CalculatorGatesSlidingDoorhanForm;
use app\modules\b24\models\CalculatorGatesSlidingOwnForm;
use app\modules\b24\models\CalculatorGatesSwingDoorhanForm;
use app\modules\b24\models\CalculatorGatesSwingOwnForm;
use app\modules\b24\models\CalculatorGatesRollingDoorhanForm;
use app\modules\b24\models\CalculatorWindowsRollingDoorhanForm;
use app\modules\b24\models\CalculatorDoorsIndustrialDoorhanForm;
use app\modules\b24\models\CalculatorGatesIndustrialDoorhanForm;
use app\modules\b24\models\CalculatorGatesSectionalDoorhanForm;
use app\modules\b24\models\CallForm;
//use app\modules\b24\models\B24portalSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\HttpException;
use app\modules\b24\models\B24CalcGroupManager;

//use yii\web\Response;
//use yii\base\Module;

/**
 * Default controller for the `b24` module
 */
class DefaultController extends app24Controller {

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
     * Lists all B24portal models.
     * @return mixed
     */
    /* public function actionIndex()
      {
      $searchModel = new B24portalSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      $module = \Yii::$app->controller->module;
      $request =  Yii::$app->request;
      return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      ]);
      } */
    /**
     * Displays a single B24portal model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* public function actionView($id)
      {
      return $this->render('view', [
      'model' => $this->findModel($id),
      ]);
      } */
    /**
     * Creates a new B24portal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /* public function actionCreate(){
      $model = new B24portal();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->PORTAL]);
      }

      return $this->render('create', [
      'model' => $model,
      ]);
      } */
    /**
     * Updates an existing B24portal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* public function actionUpdate($id)
      {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->PORTAL]);
      }

      return $this->render('update', [
      'model' => $model,
      ]);
      } */
    /**
     * Deletes an existing B24portal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* public function actionDelete($id)
      {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
      } */

    /**
     * Finds the B24portal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return B24portal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* protected function findModel($id){
      if (($model = B24portal::findOne($id)) !== null) {
      return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
      } */
    public function actionInstall() {
        $request = Yii::$app->request;
        if (null === $request->get('DOMAIN') or null === $request->post('member_id') or null === $request->post('AUTH_ID') or null === $request->post('REFRESH_ID')) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return $this->render('install');
    }

    /* public function actionShow(){
      if( Yii::$app->request->isAjax ){
      return print_r(Yii::$app->request->post());
      //debug(Yii::$app->request);
      //return 'test';
      }
      return $this->render('test');

      //return $this->redirect(['index']);
      } */

    public function actionAddPortalAuth() {//проработать
        if (Yii::$app->request->isAjax) {
            if ($this->b24_error != '') {
                return json_encode(array('status' => 'error', 'result' => $this->b24_error));
            }

            $model = new B24portal();
            $data = [
                'PORTAL' => $this->arB24App->getDomain(),
                'ACCESS_TOKEN' => $this->arB24App->getAccessToken(),
                'REFRESH_TOKEN' => $this->arB24App->getRefreshToken(),
                'MEMBER_ID' => $this->arB24App->getMemberId(),
            ];
            if (($model->attributes = $data) && $model->save()) {
                return json_encode(array('status' => 'success', 'result' => ''));
            } else {
                return json_encode(array('status' => 'error', 'result' => 'Ошибка записи'));
            }
        } else {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
    }

    public function actionCalculatorGatesSlidingDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesSlidingDoorhanForm();
        $gateFillings = $model::GATE_FILLINGS;
        $wicket = $model::WICKET;
        $obB24App = $this->arB24App;        
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }//                       
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_sliding_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-sliding-doorhan', compact('model', 'gateFillings', 'wicket'));
        }
    }

    public function actionCalculatorGatesSwingDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesSwingDoorhanForm();
        $gateFillings = $model::GATE_FILLINGS;
        $wicket = $model::WICKET;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_swing_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-swing-doorhan', compact('model', 'gateFillings', 'wicket'));
        }
    }

    public function actionCalculatorGatesSectionalDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesSectionalDoorhanForm();
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_sectional_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-sectional-doorhan', compact('model'));
        }
    }

    public function actionCalculatorGatesRollingDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesRollingDoorhanForm();
        $gatePlaces = $model::GATE_PLACES;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_rolling_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-rolling-doorhan', compact('model', 'gatePlaces'));
        }
    }

    public function actionCalculatorWindowsRollingDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorWindowsRollingDoorhanForm();
        $windowPlaces = $model::WINDOW_PLACES;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {            
            if ($request->post('action') != 'submit') {
                $model->url = 'windows_rolling_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-windows-rolling-doorhan', compact('model', 'windowPlaces'));
        }
    }

    public function actionCalculatorDoorsIndustrialDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorDoorsIndustrialDoorhanForm();
        $doorTypes = $model::DOOR_TYPE;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'doors_industrial_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-doors-industrial-doorhan', compact('model', 'doorTypes'));
        }
    }

    public function actionCalculatorGatesIndustrialDoorhan() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesIndustrialDoorhanForm();
        $gatePlaces = $model::GATE_PLACE;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_industrial_doorhan';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-industrial-doorhan', compact('model', 'gatePlaces'));
        }
    }

    public function actionCall() { //доделать
        $request = Yii::$app->request;
        $model = new CallForm();
        $obB24App = $this->arB24App;
        $textSubmit = '';


        if ($model->load($request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...

            $managerId = B24CalcGroupManager::getNextManager(1);

            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            $confirmView = 'confirm-' . str_replace('_', '-', $model->target);
            return $this->render($confirmView, compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = $request->get('u');
                $model->target = $request->get('t');
                if (!$model->target) {
                    throw new HttpException(404, 'Нет обязательного параметра t');
                }
                if (!$model->url) {
                    throw new HttpException(404, 'Нет обязательного параметра u');
                }
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            switch ($model->target) {
                case 'call_back':
                    $textSubmit = 'Заказать звонок';
                    break;
                case 'call_measurer':
                    $textSubmit = 'Вызвать специалиста';
                    break;
                default:
                    $textSubmit = 'Отправить';
                    break;
            }
            $confirmView = str_replace('_', '-', $model->target);
            return $this->render($confirmView, compact('model', 'textSubmit'));
        }
    }

    public function actionCalculatorGatesSlidingOwn() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesSlidingOwnForm();
        $gateFillings = $model::GATE_FILLINGS;
        $wicket = $model::WICKET;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_sliding_own';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-sliding-own', compact('model', 'gateFillings', 'wicket'));
        }
    }

    public function actionCalculatorGatesSwingOwn() { //доделать
        $request = Yii::$app->request;
        $model = new CalculatorGatesSwingOwnForm();
        $gateFillings = $model::GATE_FILLINGS;
        $wicket = $model::WICKET;
        $obB24App = $this->arB24App;
        if ($model->load($request->post()) && $model->validate()) {
            $managerId = B24CalcGroupManager::getNextManager(1);
            $lied = $model->addLied($this->arB24App, $managerId);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('confirm-calc', compact('model'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = 'gates_swing_own';
                $model->target = 'calculator';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('calculator-gates-swing-own', compact('model', 'gateFillings', 'wicket'));
        }
    }

}
