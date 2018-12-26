<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;
use app\modules\forms\models\admin\B24portal; //?

class AdminController extends B24AdminController {

    public function actionAddPortalAuth() {//проработать        
        if (Yii::$app->request->isAjax) {
            $component24 = new \app\components\b24Tools();
            $arAccessParams = $component24->prepareFromRequest(Yii::$app->request->post());
            $result = $component24->addAuthToDB($this->moduleParams['b24PortalTable'], $arAccessParams);
            if ($result == 1) {
                return json_encode(array('status' => 'success', 'result' => ''));
            }
            return json_encode(array('status' => 'error', 'result' => 'Ошибка записи'));
        } else {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
    }

}
