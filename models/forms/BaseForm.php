<?php

namespace app\modules\forms\models\forms;

class BaseForm extends \yii\base\Model {

    const NAME_EMPTY = "Без имени ";
    const TITLE_EMPTY = "заявка с сайта";

    public $name;
    public $phone;
    public $url;
    public $target;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $utm_term;
    public $utm_content;

    public function rules() {
        return [
            [['name', 'target', 'url', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['phone', 'required', 'message' => 'Пожалуйста, введите телефонный номер'],
            ['phone', 'match', 'pattern' => '/^[+]{1}[0-9]{11}$/', 'message' => ' Пожалуйста введите правильный номер телефона'],
        ];
    }

    public function addLied($obB24App = null, $managerId = 0, $sourceId = array(), $title = '', $liedFields = array()) {
        if (!$obB24App) {
            return false;
        }
        if ($obB24App and $managerId != 0) {
            $nameText = $this->parsNameText($this->name);
            $phoneArray = $this->parsPhoneArray($this->phone);
            $titleText = $this->parsTitleText($title);
            $commentsText = $this->generateCommentsText();
            $baseFieldsArray = [
                "TITLE" => $titleText,
                //"ASSIGNED_BY_ID" => $managerId,
                "ASSIGNED_BY_ID" => $managerId,
                "NAME" => $nameText,
                "SOURCE_ID" => $sourceId,
                "PHONE" => $phoneArray,
                "COMMENTS" => $commentsText,
                "UTM_TERM" => $this->utm_term,
                "UTM_SOURCE" => $this->utm_source,
                "UTM_MEDIUM" => $this->utm_medium,
                "UTM_CONTENT" => $this->utm_content,
                "UTM_CAMPAIGN" => $this->utm_campaign,
                    //"UF_CRM_1532342063" => $productType,
            ];

            $liedFieldsArray = array_merge($baseFieldsArray, $liedFields);
            //Yii::warning($liedFieldsArray);
            $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
            $lied = $obB24Lied->add($liedFieldsArray);
            return $lied;
        } else {
            return false;
        }
    }

    protected function generateCommentsText() {
        return '';
    }

    private function parsNameText($name = '') {
        if ($name) {
            return $name;
        } else {
            return 'Без имени';
        }
    }

    private function parsPhoneArray($phone = null) {
        if (!$phone) {
            return [];
        }
        $phoneArray = array(array("VALUE" => $this->parsPhoneText($phone), "VALUE_TYPE" => "WORK"));
        return $phoneArray;
    }

    private function parsTitleText($title = '') {
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

}
