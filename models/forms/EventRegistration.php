<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\forms\models\forms;

//use app\modules\forms\models\b24\ModelB24;
//use app\modules\forms\models\forms\tools\SendB24;
//use app\modules\forms\models\forms\BaseForm;

use app\modules\forms\models\events\EFEvents;
use Yii;

/**
 * Description of EntryForm
 *
 * @author Админ
 */
class EventRegistration extends BaseForm {

    //put your code here 
    const NAME_EMPTY = "Без имени Заявка с сайта annaholod.ru";
    const NAME_NOT_EMPTY = " заявка с сайта annaholod.ru";

    public $event;
    public $event_type;
    public $event_id;

    public function rules() {
        return array_merge(parent::rules(), [[['event_id', 'event', 'event_type'], 'string']]);
    }

    public function addLied($obB24App, $actionName) {
        $lied = parent::addLied($obB24App, $actionName, $this->liedFields, $emailSend);
        return($lied);
    }

    public function getEventModel() {   
        return EFEvents::find()->where(['iid' => $this->event_id])->one();
    }    

    public function getEvents($event_type = null, $event = null) {
        if ($event_type and $event) {
            return EFEvents::find()->where(['iid' => $event, 'bopened' => 1])->all();
        } elseif ($event_type) {
            return EFEvents::find()->where(['itype_id' => $event_type, 'bopened' => 1])->all();
        } elseif ($event) {
            return EFEvents::find()->where(['iid' => $event, 'bopened' => 1])->all();
        }
    }
    
    protected function getLiedFields() {        
        $liedFields = [
            "UF_CRM_1549551180" => $this->eventModel->eventTypeName,
            "UF_CRM_1549551207" => $this->eventModel->cityName,
            "UF_CRM_1549551239" => $this->eventModel->cname,
            
        ];
        return $liedFields;
    }

//    protected function generateCommentsText() {
//        $commentsText .= 'Интересующее мероприятие: ' . $this->eventModel->cname . '<br/>';
//        return $commentsText;
//    }

}
