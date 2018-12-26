<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\forms\models\forms;
use app\modules\forms\models\b24\ModelB24;
use app\modules\forms\models\b24\ModelB24App;

/**
 * Description of EntryForm
 *
 * @author Админ
 */
class CallForm extends ModelB24App {

    //put your code here 
    const NAME_EMPTY = "Без имени Заявка с сайта doorhan-krd.ru";
    const NAME_NOT_EMPTY = " заявка с сайта doorhan-krd.ru";

    public function rules() {
        return [
            [['name', 'target', 'url', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['phone', 'required', 'message' => 'Пожалуйста, введите телефонный номер'],
            ['phone', 'match', 'pattern' => '/^[+]{1}[0-9]{11}$/', 'message' => ' Пожалуйста введите правильный номер телефона'],
        ];
    }

    private function parsTargetUrlText() {
        $arrTargetUrl = [];
        switch ($this->url . '_' . $this->target) {
            case 'gates_sliding_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Откатные doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 19;
                $arrTargetUrl['PRODUCT_TYPE'] = [109];
                break;
            case 'gates_sliding_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Откатные doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 19;
                $arrTargetUrl['PRODUCT_TYPE'] = [109];
                break;
            case 'gates_sliding_own_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Откатные Собственное';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 20;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_sliding_own_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Откатные Собственное';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 20;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_swing_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Распашные doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 21;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_swing_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Распашные doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 21;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_swing_own_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Распашные Собственное';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 22;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_swing_own_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Распашные Собственное';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 22;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_sectional_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Секционные doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 23;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_sectional_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Секционные doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 23;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_rolling_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Ворота Роллетные doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 24;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_rolling_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Ворота Роллетные doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 24;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'windows_rolling_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Роллеты на окна doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 25;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'windows_rolling_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Роллеты на окна doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 25;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_industrial_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Промышленные ворота doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 26;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'gates_industrial_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Промышленные ворота doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 26;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'doors_industrial_doorhan_call_back':
                $arrTargetUrl['NAME'] = 'Промышленные двери doorhan';
                $arrTargetUrl['TITLE'] = 'обратный звонок';
                $arrTargetUrl['SOURCE_ID'] = 27;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            case 'doors_industrial_doorhan_call_measurer':
                $arrTargetUrl['NAME'] = 'Промышленные двери doorhan';
                $arrTargetUrl['TITLE'] = 'вызов замерщика';
                $arrTargetUrl['SOURCE_ID'] = 27;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
            default:
                $arrTargetUrl['NAME'] = '';
                $arrTargetUrl['TITLE'] = '';
                $arrTargetUrl['SOURCE_ID'] = 0;
                $arrTargetUrl['PRODUCT_TYPE'] = 0;
                break;
        }
        return $arrTargetUrl;
    }
    
    public function addLied($obB24App = null, $managerId = 0) { 
        $arrTargetUrl = $this->parsTargetUrlText();
        $lied = parent::addLied($obB24App, $managerId, $arrTargetUrl['SOURCE_ID'], $arrTargetUrl['PRODUCT_TYPE'], $arrTargetUrl['TITLE']);
        return($lied);
    }

//      public function addLied($obB24App = null, $managerId = 0) {
//      if ($obB24App and $managerId != 0) {
//      $lidNameText = $this->getLiedNameText();
//      $lidTitleText = $this->getLiedTitleText();
//      $lidPhoneArray = $this->getLiedPhoneArray();
//      $arrTargetUrl = $this->parsTargetUrlText();
//      $arrLiedFields = [
//      "TITLE" => $lidTitleText,
//      "ASSIGNED_BY_ID" => $managerId,
//      "NAME" => $lidNameText,
//      "SOURCE_ID" => $arrTargetUrl['SOURCE_ID'],
//      "PHONE" => $lidPhoneArray,
//      "UTM_TERM" => $this->utm_term,
//      "UTM_SOURCE" => $this->utm_source,
//      "UTM_MEDIUM" => $this->utm_medium,
//      "UTM_CONTENT" => $this->utm_content,
//      "UTM_CAMPAIGN" => $this->utm_campaign,
//      "UF_CRM_1532342063" => $arrTargetUrl['FORM'],
//      ];
//      $obB24Lied = new \Bitrix24\CRM\Lead($obB24App);
//      $arCreateLied = $obB24Lied->add($arrLiedFields);
//      return $arCreateLied;
//      } else {
//      return false;
//      }
//      }
     
//    public function addContact($obB24App = null, $managerId = 0) {
//        if ($obB24App and $managerId != 0) {
//            $nameText = $this->parsNameText($this->name);
//            $phoneArray = $this->parsPhoneArray($this->phone);
//            $targetUrlArray = $this->parsTargetUrlText();
//
//            $contactFieldsArray = [
//                "NAME" => $nameText,
//                "OPENED" => "Y",
//                "CREATED_BY_ID" => $managerId,
//                "ASSIGNED_BY_ID" => $managerId,
//                "TYPE_ID" => "CLIENT",
//                "SOURCE_ID" => $targetUrlArray['SOURCE_ID'],
//                "PHONE" => $phoneArray,
//            ];
//            $obB24Contact = new \Bitrix24\CRM\Contact($obB24App);
//            $contact = $obB24Contact->add($contactFieldsArray, ["REGISTER_SONET_EVENT" => "Y"]);
//            return $contact;
//        } else {
//            return false;
//        }
//    }
//
//    public function addDeal($obB24App = null, $managerId = 0, $contactId = 0) {
//        if ($obB24App and $managerId != 0 and $contactId != 0) {
//            $titleText = $this->parsTitleText();
//            $phoneArray = $this->parsPhoneArray($this->phone);
//            $targetUrlArray = $this->parsTargetUrlText();
//
//            $dealFieldsArray = [
//                "TITLE" => $titleText,
//                "OPENED" => "N",
//                "ASSIGNED_BY_ID" => $managerId,
//                "CONTACT_ID" => $contactId,
//                "STAGE_ID" => 'NEW',
//                "TYPE_ID" => "SALE",
//                "SOURCE_ID" => $targetUrlArray['SOURCE_ID'],
//                "UTM_TERM" => $this->utm_term,
//                "UTM_SOURCE" => $this->utm_source,
//                "UTM_MEDIUM" => $this->utm_medium,
//                "UTM_CONTENT" => $this->utm_content,
//                "UTM_CAMPAIGN" => $this->utm_campaign,
//                "UF_CRM_1532342201" => $targetUrlArray['PRODUCT_TYPE'],
//            ];
//            $obB24Deal = new \Bitrix24\CRM\Deal\Deal($obB24App);
//            $deal = $obB24Deal->add($dealFieldsArray, ["REGISTER_SONET_EVENT" => "Y"]);
//            return $deal;
//        } else {
//            return false;
//        }
//    }
}
