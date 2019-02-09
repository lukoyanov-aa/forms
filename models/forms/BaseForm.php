<?php

namespace app\modules\forms\models\forms;

use app\modules\forms\models\settings\FTargetUrl;
use app\modules\forms\models\turn\TFGroupsManagersSearch;
//use app\modules\forms\models\settings\FForms;
use Yii;

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

    //public function addLied($obB24App = null, $managerId = 0, $sourceId = array(), $title = '', $liedFields = array()) {
    public function addLied($obB24App, $formSettings, $liedFields = array()) {

        //$formSettings = FForms::find()->where(['cname' => $actionName])->one();
        $managerId = TFGroupsManagersSearch::getNextManager($formSettings->igroup_id);
        $arrTargetUrl = FTargetUrl::find()->where(['ctarget_url' => $this->target . '_' . $this->url])->one();
        $nameText = $this->nameText;
        $phoneArray = $this->phoneArray;
        $titleText = $this->parsTitleText($arrTargetUrl->ctitle);
        $commentsText = $this->generateCommentsText();
        $baseFieldsArray = [
            "TITLE" => $titleText,
            "ASSIGNED_BY_ID" => $managerId,
            "NAME" => $nameText,
            "SOURCE_ID" => $arrTargetUrl->csource_id,
            "PHONE" => $phoneArray,
            "COMMENTS" => $commentsText,
            "UTM_TERM" => $this->utm_term,
            "UTM_SOURCE" => $this->utm_source,
            "UTM_MEDIUM" => $this->utm_medium,
            "UTM_CONTENT" => $this->utm_content,
            "UTM_CAMPAIGN" => $this->utm_campaign,
        ];

        $liedFieldsArray = array_merge($baseFieldsArray, $liedFields);
        if (true) {
            Yii::$app->mailer->compose()
                    ->setFrom('info@annaholod.ru')
                    ->setTo('info@annaholod.ru')
                    ->setSubject($titleText)
                    ->setTextBody('Текст сообщения')
                    ->setHtmlBody($this->generateEmailBodyText($liedFields))
                    ->send();
        }
        $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
        $lied = $obB24Lied->add($liedFieldsArray);
        return $lied;
    }

    protected function generateCommentsText() {
        return '';
    }

    protected function getNameText() {
        if ($this->name) {
            return $this->name;
        } else {
            return 'Без имени';
        }
    }

    protected function getPhoneArray() {
        if (!$this->phone) {
            return [];
        }
        $phoneArray = array(array("VALUE" => $this->phoneText, "VALUE_TYPE" => "WORK"));
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

    protected function getPhoneText() {
        $phoneText = "+" . preg_replace("/[^0-9]/", '', $this->phone);
        return $phoneText;
    }

    protected function parsFieldsToText($param) {
        $text = '';
        foreach ($param as $key => $value) {
            $text .= /*$key.': '.*/$value.'<br>';
        }
        return $text;
    }

    protected function generateEmailBodyText($fields) {
        $text = 'Имя: ' . $this->nameText. '<br>';
        $text .= 'Телефон: ' . $this->phoneText. '<br>';
        $text .= $this->parsFieldsToText($fields);
        return $text;
    }

}
