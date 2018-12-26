<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//\use \yii\base\Model;

namespace app\modules\forms\models\b24;

use Yii;

/**
 * Description of formB24
 *
 * @author Админ
 */
class ModelB24App extends ModelB24 {

    const NAME_EMPTY = "Без имени ";
    const TITLE_EMPTY = "заявка с сайта doorhan-krd.ru";

    //const NAME_NOT_EMPTY = " заявка с сайта doorhan-krd.ru";

    public $name;
    public $phone;
    public $url;
    public $target;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $utm_term;
    public $utm_content;

    protected function generateCommentsText() {
        return '';
    }

    public function addContact($obB24App = null, $managerId = 0) {
        if ($obB24App and $managerId != 0) {
            $nameText = $this->parsNameText($this->name);
            $phoneArray = $this->parsPhoneArray($this->phone);

            $contactFieldsArray = [
                "NAME" => $nameText,
                "OPENED" => "Y",
                "ASSIGNED_BY_ID" => $managerId,
                "TYPE_ID" => "CLIENT",
                "SOURCE_ID" => self::SOURCE_ID,
                "PHONE" => $phoneArray,
            ];
            $obB24Contact = new \Bitrix24\CRM\Contact($obB24App);
            $contact = $obB24Contact->add($contactFieldsArray, ["REGISTER_SONET_EVENT" => "Y"]);
            return $contact;
        } else {
            return false;
        }
    }

    public function addDeal($obB24App = null, $managerId = 0, $contactId = 0) {
        if ($obB24App and $managerId != 0 and $contactId != 0) {
            $titleText = $this->parsTitleText();
            $commentsText = $this->generateCommentsText();
            $dealFieldsArray = [
                "TITLE" => $titleText,
                "OPENED" => "N",
                "ASSIGNED_BY_ID" => $managerId,
                "CONTACT_ID" => $contactId,
                "STAGE_ID" => 'NEW',
                "TYPE_ID" => "SALE",
                "COMMENTS" => $commentsText,
                "SOURCE_ID" => self::DEAL_SOURCE_ID,
                "UTM_TERM" => $this->utm_term,
                "UTM_SOURCE" => $this->utm_source,
                "UTM_MEDIUM" => $this->utm_medium,
                "UTM_CONTENT" => $this->utm_content,
                "UTM_CAMPAIGN" => $this->utm_campaign,
                "UF_CRM_1532342201" => self::PRODUCT_TYPE,
            ];
            $obB24Deal = new \Bitrix24\CRM\Deal\Deal($obB24App);
            $deal = $obB24Deal->add($dealFieldsArray, ["REGISTER_SONET_EVENT" => "Y"]);
            return $deal;
        } else {
            return false;
        }
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

    public function addLied($obB24App = null, $managerId = 0, $sourceId = array(), $productType = [0], $title = '') {
        if (!$obB24App) {
            return false;
        }
        if ($obB24App and $managerId != 0) {
            $nameText = $this->parsNameText($this->name);
            $phoneArray = $this->parsPhoneArray($this->phone);
            $titleText = $this->parsTitleText($title);
            $commentsText = $this->generateCommentsText();
            $liedFieldsArray = [
                "TITLE" => $titleText,
                //"ASSIGNED_BY_ID" => $managerId,
                "ASSIGNED_BY_ID" => 39,
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
            $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
            $lied = $obB24Lied->add($liedFieldsArray);
            return $lied;
        } else {
            return false;
        }
    }

}
