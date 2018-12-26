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
class CalculatorDoorsIndustrialDoorhanForm extends ModelB24App {

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
    const DOOR_TYPE = [
        0 => 'Противопожарные Одностворчатые',
        1 => 'Противопожарные Двустворчатые',
        2 => 'Для охлаждаемых помещений Откатная',
        3 => 'Для охлаждаемых помещений Откатная',
        4 => 'Для охлаждаемых помещений Распашная',
        5 => 'Автоматические раздвижные двери',
        6 => 'Для технических помещений Одностворчатые',
        7 => 'Для технических помещений Двустворчатые',
        8 => 'Для чистых помещений Одностворчатые',
        9 => 'Для чистых помещений Двустворчатые',
        10 => 'Пленочные маятниковые',
        11 => 'Пластиковые маятниковые',
        12 => 'Откатная для камер с регулируемой газовой средой',
        13 => 'Для фрукто- и овощехранилищ Вентиляционный клапан',
    ];    
    const DOOR_WIDTH_COMMENTS_TEXT = "Ширина: ";
    const DOOR_HEIGHT_COMMENTS_TEXT = "Высота: ";
    const ADDRESS_COMMENTS_TEXT = "Адрес: ";
    const COUNT_COMMENTS_TEXT = "Количество: ";
    const CONTACT_SOURCE_ID = 0;
    const DEAL_SOURCE_ID = 0;
    const PRODUCT_TYPE = [0];
    const SOURCE_ID = 27;

    //private $liedName;


    public $address;
    public $automatic;
    public $installation;
    public $delivery;
    public $doorType;
    public $doorWidth;
    public $doorHeight;
    public $count;

    public function rules() {
        return [
            [['name', 'count', 'doorType', 'url', 'target', 'address', 'doorWidth', 'doorHeight', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
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
        $commentsText .= 'Дверь:' . '<br/>';
        $commentsText .= 'Тип: '.self::DOOR_TYPE[$this->doorType]. '<br/>';        
        $commentsText .= self::DOOR_WIDTH_COMMENTS_TEXT . $this->doorWidth . '<br/>';
        $commentsText .= self::DOOR_HEIGHT_COMMENTS_TEXT . $this->doorHeight . '<br/>';
        $commentsText .= self::ADDRESS_COMMENTS_TEXT . $this->address . '<br/>';
        $commentsText .= self::COUNT_COMMENTS_TEXT . $this->count . '<br/>';
        return $commentsText;
    }

    public function addLied($obB24App = null, $managerId = 0) {
        $lied = parent::addLied($obB24App, $managerId, self::SOURCE_ID, self::PRODUCT_TYPE);
        return($lied);
    }

}
