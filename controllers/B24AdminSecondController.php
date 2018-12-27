<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;

class B24AdminSecondController extends B24AdminController {

    public function beforeAction($action) {
        $session = Yii::$app->session;
        $portalOpened = $session->get('portalOpened');
        if (!$portalOpened) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return parent::beforeAction($action);
    }

}
