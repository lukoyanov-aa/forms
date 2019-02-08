<?php

namespace app\modules\forms\controllers\admin;

use Yii;
use \yii\web\HttpException;

class B24AdminSecondController extends B24AdminController {
    
    public $layout = '@app/modules/forms/views/layouts/admin.php';

    public function beforeAction($action) {
        $session = Yii::$app->session;
        $accessAllowed= $session->get('accessAllowed');
        if (!$accessAllowed) {
            throw new HttpException(404, 'Приложение необходимо запустить из портала Битрикс24');
        }
        $this->accessParams = $session['AccessParams'];
        return parent::beforeAction($action);
    }
    
    protected $accessParams;

}
