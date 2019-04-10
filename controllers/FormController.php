<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;
use app\modules\forms\models\forms\TestModel;
use app\modules\forms\models\settings\Forms;

class FormController extends \app\modules\b24\controllers\B24Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionTest() { //доделать
        $request = Yii::$app->request;
        $model = new TestModel();
        if ($model->load($request->post()) && $model->validate()) {
            $actionName = Yii::$app->controller->action->id;
            $formSettings = Forms::find()->where(['cname' => $actionName])->one();
            $component = new \app\components\b24Tools();
            $this->arB24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], $this->moduleParams['b24PortalName'], $this->moduleParams['applicationScope']);
            $model->send($this->arB24App, $formSettings);
            return $this->render('test-confirm', compact('model', 'formSettings'));
        } else {
            if ($request->post('action') != 'submit') {
                $model->url = $request->get('u') ? $request->get('u') : 'utest';
                $model->target = $request->get('t') ? $request->get('t') : 'ttest';
                $model->utm_source = $request->get('utm_source');
                $model->utm_medium = $request->get('utm_medium');
                $model->utm_campaign = $request->get('utm_campaign');
                $model->utm_term = $request->get('utm_term');
                $model->utm_content = $request->get('utm_content');
            }
            return $this->render('test', compact('model'));
        }
    }

}
