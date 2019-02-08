<?php

namespace app\modules\forms\controllers\admin;

use Yii;
use \yii\web\HttpException;
use app\modules\forms\models\admin\B24portal;
use app\modules\forms\controllers\B24Controller;

class B24AdminController extends B24Controller {

    public $layout = '@app/modules/forms/views/layouts/admin.php';

    public function actionAddPortalAuth() {//проработать        
        if (Yii::$app->request->isAjax) {
            $component24 = new \app\components\b24Tools();
            $arAccessParams = $component24->prepareFromAjaxRequest(Yii::$app->request->post());            
            $error = $component24->checkB24Auth();
            if ($error) {
                throw new HttpException(403, 'В доступе отказано');
            }
            $result = $component24->addAuthToDB($this->moduleParams['b24PortalTable'], $arAccessParams);
            if ($result == 1) {
                return json_encode(array('status' => 'success', 'result' => ''));
            }
            return json_encode(array('status' => 'error', 'result' => 'Ошибка записи'));
        } else {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
    }

    protected function isSetB24portal($portal) {
        $model = new B24portal();
        $issetPortal = $model->isSetB24portal($portal);
        return $issetPortal;
    }

}
