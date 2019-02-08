<?php

namespace app\modules\forms\models\forms\tools;

use yii\base\Behavior;

class BeforeSend extends Behavior {

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

    protected function parsTitleText($title = '') {
        $name = '';
        if ($this->name) {
            $name = $this->name;
        } else {
            $name = self::NAME_EMPTY;
        }
        if ($title) {
            return $name . ' ' . $title;
        } else {
            return $name . ' ' . self::TITLE_EMPTY;
        }
    }

    private function parsPhoneText($phone) {
        $phoneText = "+" . preg_replace("/[^0-9]/", '', $phone);
        return $phoneText;
    }
    
    protected function generateCommentsText() {
        return '';
    }

}
