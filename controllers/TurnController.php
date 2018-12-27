<?php

namespace app\modules\forms\controllers;
use Yii;
use app\modules\forms\models\turn\B24CalcGroupManager;

class TurnController extends B24AdminSecondController {
    public function actionIndex() {        
        return $this->render('index');
    }
}
