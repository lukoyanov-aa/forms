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
//    public function addLied($obB24App, $formSettings, $liedFields = array()) {
//
//        //$formSettings = FForms::find()->where(['cname' => $actionName])->one();
//        $managerId = TFGroupsManagersSearch::getNextManager($formSettings->igroup_id);
//        $arrTargetUrl = $this->targetUrl;
//        $nameText = $this->nameText;
//        $phoneArray = $this->phoneArray;
//        $titleText = $this->parsTitleText($arrTargetUrl->cname, $this->phone);
//        $commentsText = $this->generateCommentsText();
//        $baseFieldsArray = [
//            "TITLE" => $titleText,
//            "ASSIGNED_BY_ID" => $managerId,
//            "NAME" => $nameText,
//            "SOURCE_ID" => $arrTargetUrl->csource_id,
//            "PHONE" => $phoneArray,
//            "COMMENTS" => $commentsText,
//            "UTM_TERM" => $this->utm_term,
//            "UTM_SOURCE" => $this->utm_source,
//            "UTM_MEDIUM" => $this->utm_medium,
//            "UTM_CONTENT" => $this->utm_content,
//            "UTM_CAMPAIGN" => $this->utm_campaign,
//        ];
//
//        $liedFieldsArray = array_merge($baseFieldsArray, $liedFields);
//        if ($arrTargetUrl->cmail) {
//            Yii::$app->mailer->compose()
//                    ->setFrom($arrTargetUrl->cmail)//Доделать
//                    ->setTo($arrTargetUrl->cmail)
//                    ->setSubject($titleText)
//                    ->setTextBody('Текст сообщения')
//                    ->setHtmlBody($this->generateEmailBodyText($liedFields))
//                    ->send();
//        }
//        $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
//        $lied = $obB24Lied->add($liedFieldsArray);
//        return $lied;
//    }

    public function send($obB24App, $formSettings, $liedFields = array()) {

        //$formSettings = FForms::find()->where(['cname' => $actionName])->one();
        $managerId = TFGroupsManagersSearch::getNextManager($formSettings->igroup_id);
        $arrTargetUrl = $this->targetUrl;
        $nameText = $this->nameText;
        $phoneArray = $this->phoneArray;
        $titleText = $this->parsTitleText($arrTargetUrl->cname, $this->phone);
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
        if ($formSettings->bemail) {
            if ($arrTargetUrl->cmail) {
                Yii::$app->mailer->compose()
                        ->setFrom($arrTargetUrl->cmail)//Доделать
                        ->setTo($arrTargetUrl->cmail)
                        ->setSubject($titleText)
                        ->setTextBody('Текст сообщения')
                        ->setHtmlBody($this->generateEmailBodyText($liedFields))
                        ->send();
            }
        }

        switch ($formSettings->icrm) {
            case 1:
                //return 'не создавать';
                break;
            case 2:
                //return 'Лид';
                $liedFieldsArray = array_merge($baseFieldsArray, $liedFields);
                $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
                $lied = $obB24Lied->add($liedFieldsArray);
                if (!$lied) {
                    Yii::error('создать Лид не удалось', __METHOD__);
                    Yii::warning($this, __METHOD__);
                }
                break;
            case 3:
                //return 'Сделка';
                $dealFieldsArray = array_merge($baseFieldsArray, $liedFields);
                $obB24Deal = new \Bitrix24\CRM\Deal\Deal($obB24App);
                $deal = $obB24Deal->add($dealFieldsArray);
                if (!$deal) {
                    Yii::error('создать сделку не удалось', __METHOD__);
                    Yii::warning($this, __METHOD__);
                }
                break;
            default :
                //return 'не создавать';
                break;
        }
    }

    public function getTargetUrl() {
        if (FTargetUrl::find()->where(['ctarget_url' => $this->target . '_' . $this->url])->count()) {
            return FTargetUrl::find()->where(['ctarget_url' => $this->target . '_' . $this->url])->one();
            ;
        } else {
            return FTargetUrl::find()->where(['ctarget_url' => 'default'])->one();
            ;
        }
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

    protected function parsTitleText($title = '', $phone = '') {
        $name = '';
        if ($this->name) {
            $name = $this->name;
        } else {
            $name = self::NAME_EMPTY;
        }

        $text = '';
        if ($phone) {
            $text = $name . ' ' . $phone . ' ';
        } else {
            $text = $name . ' ';
        }

        return $text . ' ' . self::TITLE_EMPTY;
    }

    protected function getPhoneText() {
        $phoneText = "+" . preg_replace("/[^0-9]/", '', $this->phone);
        return $phoneText;
    }

    protected function parsFieldsToText($param) {
        $text = '';
        foreach ($param as $key => $value) {
            $text .= /* $key.': '. */$value . '<br>';
        }
        return $text;
    }

    protected function generateEmailBodyText($fields) {
        $text = 'Имя: ' . $this->nameText . '<br>';
        $text .= 'Телефон: ' . $this->phoneText . '<br>';
        $text .= 'Страница: ' . $this->targetUrl->cname . '<br>';
        $text .= $this->parsFieldsToText($fields);
        return $text;
    }

    protected function getLiedFields() {
        return [];
    }

}
