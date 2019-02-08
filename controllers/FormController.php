<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;
//use app\modules\forms\models\forms\CalculatorGatesSlidingDoorhanForm;
//use app\modules\forms\models\forms\CalculatorGatesSlidingOwnForm;
//use app\modules\forms\models\forms\CalculatorGatesSwingDoorhanForm;
//use app\modules\forms\models\forms\CalculatorGatesSwingOwnForm;
//use app\modules\forms\models\forms\CalculatorGatesRollingDoorhanForm;
//use app\modules\forms\models\forms\CalculatorWindowsRollingDoorhanForm;
//use app\modules\forms\models\forms\CalculatorDoorsIndustrialDoorhanForm;
//use app\modules\forms\models\forms\CalculatorGatesIndustrialDoorhanForm;
//use app\modules\forms\models\forms\CalculatorGatesSectionalDoorhanForm;
//use app\modules\forms\models\forms\CallForm;
use app\modules\forms\models\forms\EventRegistration;
use app\modules\forms\models\events\EFEventsSearch;
use app\modules\forms\models\turn\TFGroupsManagersSearch;
use app\modules\forms\models\settings\FForms;

//
//use app\modules\b24\models\B24portalSearch;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use \yii\web\HttpException;
//
//use app\modules\forms\models\tutn\B24CalcGroupManager;
//use yii\web\Response;
//use yii\base\Module;

/**
 * Default controller for the `b24` module
 */
class FormController extends B24Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;



        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
//    public function behaviors() {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    } 
    /*
      public function actionCalculatorGatesSlidingDoorhan() { //доделать
      $request = Yii::$app->request;
      $model = new CalculatorGatesSlidingDoorhanForm();
      $gateFillings = $model::GATE_FILLINGS;
      $wicket = $model::WICKET;
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
     */
    public function actionEventRegistration() { //доделать
        $request = Yii::$app->request;
        $model = new EventRegistration();        
        if ($model->load($request->post()) && $model->validate()) {
            $actionName = Yii::$app->controller->action->id;
            $formSettings = FForms::find()->where(['cname' => $actionName])->one();
            $managerId = TFGroupsManagersSearch::getNextManager($formSettings->igroup_id);
            $component = new \app\components\b24Tools();
            $this->arB24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], $this->moduleParams['b24PortalName'], $this->moduleParams['applicationScope']);

            $lied = $model->addLied($this->arB24App, $managerId);
            Yii::warning($lied);
            if (!$lied) {
                Yii::error('создать Лид не удалось', __METHOD__);
                Yii::warning($model, __METHOD__);
            }
            return $this->render('event-registration-confirm', compact('model', 'formSettings'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = $request->get('u') ? $request->get('u') : 'seminar';
                $model->target = $request->get('t') ? $request->get('t') : 'form';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');

                $model->event_type = $request->get('et') ? $request->get('et') : '';
                $model->event = $request->get('e') ? $request->get('e') : '';                                
            }            
            $events = $model->getEvents($model->event_type, $model->event);
            return $this->render('event-registration', compact('model', 'events'));
        }
    }
}
