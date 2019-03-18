<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\forms\models\forms;
use Yii;

/**
 * Description of EntryForm
 *
 * @author Админ
 */
class TestModel extends BaseForm {

    //put your code here 
    const NAME_EMPTY = "Без имени Заявка с сайта test.ru";
    const NAME_NOT_EMPTY = " заявка с сайта test.ru";

    public $test;

    public function rules() {
        return array_merge(parent::rules(), [[['test'], 'string']]);
    }

    public function addLied($obB24App, $formSettings) {
        $lied = parent::addLied($obB24App, $formSettings, $this->liedFields);
        return($lied);
    }
   
    
    protected function getLiedFields() {        
        $liedFields = [
            "UF_CRM_XXXXXXXX" => $this->test,
        ];
        return $liedFields;
    }
}
