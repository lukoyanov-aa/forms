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
class CalculatorGatesIndustrialDoorhanForm extends ModelB24App {

    //put your code here   
    const NAME_EMPTY = "Без имени Заявка с сайта doorhan-krd.ru";
    const NAME_NOT_EMPTY = " заявка с сайта doorhan-krd.ru";
    const BASE_COMMENTS = "Расчет стоимости:";
    const AUTOMATIC_ON_COMMENTS_TEXT = "Автоматика: нужна";
    const AUTOMATIC_OFF_COMMENTS_TEXT = "Автоматика: не требуется";
    const INSTALLATION_ON_COMMENTS_TEXT = "Установка: нужна";
    const INSTALLATION_OFF_COMMENTS_TEXT = "Установка: не требуется";
    const DELIVERY_ON_COMMENTS_TEXT = "Доставка: нужна";
    const DELIVERY_OFF_COMMENTS_TEXT = "Доставка: не требуется";
    const GATE_PLACE = [
        0 => 'Секционные ворота ISD01',
        1 => 'Секционные ворота с панорамным остеклением ISD02',
        2 => 'Секционные ворота из алюминиевых панелей ISD03',
        3 => 'Секционные ворота thermalpro',
        4 => 'Противопожарные секционные ворота ',
        5 => 'Противопожарные откатные ворота ',
        6 => 'Противопожарные распашные ворота ',
        7 => 'Противопожарные шторы ',
        8 => 'Рулонные стальные ворота с навальным приводом ',
        9 => 'Рулонные стальные ворота с внутривальным приводом ',
        10 => 'Рулонные скоростные ворота ',
        11 => 'Скоростные складывающиеся ворота ',
        12 => 'Скоростные спиральные ворота',
        13 => 'Складные ворота без нижней направляющей',
        14 => 'Складные ворота с нижней направляющей',
        15 => 'Откатные ворота без нижней направляющей',
        16 => 'Откатные ворота с нижней направляющей',
    ];
    const GATE_WIDTH_COMMENTS_TEXT = "Ширина: ";
    const GATE_HEIGHT_COMMENTS_TEXT = "Высота: ";
    const ADDRESS_COMMENTS_TEXT = "Адрес: ";
    const CONTACT_SOURCE_ID = 0;
    const DEAL_SOURCE_ID = 0;
    const PRODUCT_TYPE = [0];
    const SOURCE_ID = 26;

    //private $liedName;


    public $address;
    public $automatic;
    public $installation;
    public $delivery;
    public $gatePlace;
    public $gateWidth;
    public $gateHeight;

    public function rules() {
        return [
            [['name', 'gatePlace', 'url', 'target', 'address', 'gateWidth', 'gateHeight', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
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
        $commentsText .= 'Место установки: '.self::GATE_PLACE[$this->gatePlace] . '<br/>';
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
