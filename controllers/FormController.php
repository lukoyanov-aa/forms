<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;
use app\modules\forms\models\forms\EventRegistration;
use app\modules\forms\models\events\EFEventsSearch;
use app\modules\forms\models\settings\FForms;

class FormController extends B24Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionEventRegistration() { //доделать
        $request = Yii::$app->request;
        $model = new EventRegistration();
        if ($model->load($request->post()) && $model->validate()) {
            $actionName = Yii::$app->controller->action->id;
            $formSettings = FForms::find()->where(['cname' => $actionName])->one();
            $component = new \app\components\b24Tools();
            $this->arB24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], $this->moduleParams['b24PortalName'], $this->moduleParams['applicationScope']);
            $lied = $model->addLied($this->arB24App, $formSettings);
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
//            if (count($events) == 0) {
//                
//                $events = [0 => 'Пока не запланированы семинары, но всё может измениться сразу после Вашего обращения'];
//            }
            
            Yii::warning($events);
            return $this->render('event-registration', compact('model', 'events'));
        }
    }

}
