<?php

namespace app\modules\forms\controllers;

use Yii;
use \yii\web\HttpException;

class AdminBaseController extends \app\modules\b24\controllers\AdminBaseController {
    
    public $layout = '@app/modules/forms/views/layouts/admin.php';

public function actionInstall() {
        $request = Yii::$app->request;
        $issetPortal = $this->isSetB24portal($request->get('DOMAIN'));
        if ($issetPortal) {
            return $this->render('index');
        } else {
            return $this->render('install');
        }
    }

    public function actionIndex() {
        return $this->render('index');
    }

}

