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
class CalculatorWindowsRollingDoorhanForm extends ModelB24App {

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
    const WINDOW_PLACES = [
        0 => 'Наружный проем(окно)',
        1 => 'Наружный проем(дверь)',
        2 => 'Проемы внутри помещения',
        3 => 'Проем с защитой от взлома',
        4 => 'Витринный проем',
        5 => 'Кузов автомобиля',
    ];
    const WINDOW_WIDTH_COMMENTS_TEXT = "Ролета (Ширина): ";
    const WINDOW_HEIGHT_COMMENTS_TEXT = "Ролета (Высота): ";
    const ADDRESS_COMMENTS_TEXT = "Адрес: ";
    const COUNT_COMMENTS_TEXT = "Количество: ";
    const CONTACT_SOURCE_ID = 0;
    const DEAL_SOURCE_ID = 0;
    const PRODUCT_TYPE = [0];
    const SOURCE_ID = 25;

    //private $liedName;


    public $address;
    public $automatic;
    public $installation;
    public $delivery;
    public $windowPlace;
    public $windowWidth;
    public $windowHeight;
    public $count;

    public function rules() {
        return [
            [['name', 'count', 'windowPlace', 'url', 'target', 'address', 'windowWidth', 'windowHeight', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
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
        $commentsText = self::WINDOW_PLACES[$this->windowPlace] . "<br/>";       
        $commentsText .= self::WINDOW_WIDTH_COMMENTS_TEXT . $this->windowWidth . '<br/>';
        $commentsText .= self::WINDOW_HEIGHT_COMMENTS_TEXT . $this->windowHeight . '<br/>';
        $commentsText .= self::ADDRESS_COMMENTS_TEXT . $this->address . '<br/>';
        $commentsText .= self::COUNT_COMMENTS_TEXT . $this->count . '<br/>';
        return $commentsText;
    }

    public function addLied($obB24App = null, $managerId = 0) {
        $lied = parent::addLied($obB24App, $managerId, self::SOURCE_ID, self::PRODUCT_TYPE);
        return($lied);
    }

}
