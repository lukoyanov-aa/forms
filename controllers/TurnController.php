<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\Controller;
use app\modules\forms\models\turn\B24CalcGroupManager;


/**
 * Default controller for the `b24` module
 */
class TurnController extends Controller {
    public function actionIndex() {
        $request = Yii::$app->request;
        if (null === $request->get('DOMAIN') or null === $request->post('member_id') or null === $request->post('AUTH_ID') or null === $request->post('REFRESH_ID')) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return $this->render('index');
    }


}
