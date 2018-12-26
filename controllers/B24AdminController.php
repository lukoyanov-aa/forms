<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\b24\B24portal; //???
use \yii\web\HttpException;

/**
 * Description of appController
 *
 * @author Админ
 */
class B24AdminController extends B24Controller {

    public function beforeAction($action) {
        $request = Yii::$app->request;
        if (null === $request->get('DOMAIN') or null === $request->post('member_id') or null === $request->post('AUTH_ID') or null === $request->post('REFRESH_ID')) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return parent::beforeAction($action);
    }

}
