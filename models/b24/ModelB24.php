<?php
namespace app\modules\forms\models\b24;

class ModelB24 extends \yii\base\Model {

    protected function parsNameText($name = '') {
        if ($name) {
            return $name;
        } else {
            return 'Без имени';
        }
    }

    protected function parsPhoneArray($phone = null) {
        if (!$phone) {
            return [];
        }
        $phoneArray = array(array("VALUE" => $this->parsPhoneText($phone), "VALUE_TYPE" => "WORK"));
        return $phoneArray;
    }

    private function parsPhoneText($phone) {
        $phoneText = "+" . preg_replace("/[^0-9]/", '', $phone);
        return $phoneText;
    }

}
