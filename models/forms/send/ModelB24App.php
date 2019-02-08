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

    

    
    
    
}
