<?php

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
}
