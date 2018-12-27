<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;

class AdminBaseController extends B24AdminController {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionInstall() {
        $request = Yii::$app->request;
        if (null === $request->get('DOMAIN') or null === $request->post('member_id') or null === $request->post('AUTH_ID') or null === $request->post('REFRESH_ID')) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return $this->render('install');
    }

    public function actionIndex() {
        $session = Yii::$app->session;
        $request = Yii::$app->request;
        $portalOpened = $session->get('portalOpened');
        if (!$portalOpened) {
            if (null === $request->get('DOMAIN') or null === $request->post('member_id') or null === $request->post('AUTH_ID') or null === $request->post('REFRESH_ID')) {
                throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
            } else {
                //добавить проверку авторизационных данных
                $session->set('portalOpened', true);
            }
        }
        return $this->render('index');
    }

}
