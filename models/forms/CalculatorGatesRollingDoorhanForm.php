<?php

namespace app\modules\forms\models\forms;
use app\modules\forms\models\b24\ModelB24;
use app\modules\forms\models\b24\ModelB24App;

class CalculatorGatesRollingDoorhanForm extends ModelB24App {

    //put your code here    
    const BASE_COMMENTS = "Расчет стоимости:";
    const AUTOMATIC_ON_COMMENTS_TEXT = "Автоматика: нужна";
    const AUTOMATIC_OFF_COMMENTS_TEXT = "Автоматика: не требуется";
    const INSTALLATION_ON_COMMENTS_TEXT = "Установка: нужна";
    const INSTALLATION_OFF_COMMENTS_TEXT = "Установка: не требуется";
    const DELIVERY_ON_COMMENTS_TEXT = "Доставка: нужна";
    const DELIVERY_OFF_COMMENTS_TEXT = "Доставка: не требуется";
    const GATE_PLACES = [
        0 => 'Въезд в гараж(частный сектор)',
        1 => 'Въезд во двор(частный сектор)',
        2 => 'Въезд в гараж(промышленный сектор)',
        3 => 'Въезд во двор(промышленный сектор)',
        4 => 'Витринный проем',
    ];    
    const GATE_WIDTH_COMMENTS_TEXT = "Ворота (Ширина): ";
    const GATE_HEIGHT_COMMENTS_TEXT = "Ворота (Высота): ";
    const ADDRESS_COMMENTS_TEXT = "Адрес: ";
    const CONTACT_SOURCE_ID = 0;
    const DEAL_SOURCE_ID = 0;
    const PRODUCT_TYPE = 0;
    const SOURCE_ID = 24;

    public $address;
    public $automatic;
    public $installation;
    public $delivery;
    public $gatePlace;
    public $gateWidth;
    public $gateHeight;

    public function rules() {
        return [
            [['name', 'url', 'target', 'address', 'gateWidth', 'gateHeight', 'gatePlace', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            [['automatic', 'installation', 'delivery'], 'boolean'],
            ['phone', 'required', 'message' => 'Пожалуйста, введите телефонный номер'],
            ['phone', 'match', 'pattern' => '/^[+]{1}[0-9]{11}$/', 'message' => ' Пожалуйста введите правильный номер телефона'],
        ];
    }

    protected function generateCommentsText() {
        $commentsText = self::BASE_COMMENTS . "<br/>";
        $commentsText .= ($this->automatic ? self::AUTOMATIC_ON_COMMENTS_TEXT : self::AUTOMATIC_OFF_COMMENTS_TEXT) . "<br/>";
        $commentsText .= ($this->installation ? self::INSTALLATION_ON_COMMENTS_TEXT : self::INSTALLATION_OFF_COMMENTS_TEXT) . "<br/>";
        $commentsText .= ($this->delivery ? self::DELIVERY_ON_COMMENTS_TEXT : self::DELIVERY_OFF_COMMENTS_TEXT) . "<br/>";
        $commentsText .= 'Ворота:' . '<br/>';
        $commentsText .= self::GATE_PLACES[$this->gatePlace]. '<br/>'; 
        $commentsText .= self::GATE_WIDTH_COMMENTS_TEXT . $this->gateWidth . '<br/>';
        $commentsText .= self::GATE_HEIGHT_COMMENTS_TEXT . $this->gateHeight . '<br/>';
        $commentsText .= self::ADDRESS_COMMENTS_TEXT . $this->address . '<br/>';
        return $commentsText;
    }

    public function addLied($obB24App = null, $managerId = 0) {
        $lied = parent::addLied($obB24App, $managerId, self::SOURCE_ID, self::PRODUCT_TYPE);
        return($lied);
    }

}
