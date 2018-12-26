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

    public $layout = '@app/modules/forms/views/layouts/admin.php';

    public function beforeAction($action) {
        $session = Yii::$app->session;
        $portalOpened = $session->get('portalOpened');
        if (!$portalOpened) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        return parent::beforeAction($action);
    }

}
