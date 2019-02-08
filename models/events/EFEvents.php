<?php

namespace app\modules\forms\models\events;

use Yii;

/**
 * This is the model class for table "ef_events".
 *
 * @property int $iid
 * @property string $cname
 * @property int $itype_id
 * @property int $bopened
 * @property int $imin
 * @property int $imax
 * @property string $ddate_event
 * @property int $icity_id
 * @property string $cadress
 * @property double $fbase_price
 * @property string $dprice1_date
 * @property string $dprice2_date
 */
class EFEvents extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'ef_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cname', 'itype_id', 'bopened', 'ddate_event', 'icity_id', 'cbase_text'], 'required'],
            [['itype_id', 'bopened', 'imin', 'imax', 'icity_id'], 'integer'],
            [['ddate_event', 'dprice1_date', 'dprice2_date'], 'safe'],
            [['fbase_price'], 'number'],
            [['cname', 'cadress', 'cbase_text', 'ctext_condition1', 'ctext_condition2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'iid' => 'ID',
            'cname' => 'Название',
            'itype_id' => 'Тип',
            'bopened' => 'Доступно',
            'imin' => 'Минимальное количество участников',
            'imax' => 'Максимальное количество участников',
            'ddate_event' => 'Дата события',
            'icity_id' => 'Город',
            'cadress' => 'Адрес',
            'fbase_price' => 'Базовая стоимость',
            'dprice1_date' => 'Дата первой скидочной цены',
            'dprice2_date' => 'Дата второй скидочной цены',
            'cbase_text' => 'Базовый текст до условий',
            'ctext_condition1'=> 'Текст при наступлении первого условия', 
            'ctext_condition2'=> 'Текст при наступлении второго условия'
        ];
    }

    public function getCity() {
        return $this->hasOne(EFCity::className(), ['iid' => 'icity_id']);
    }

    public function getCityName() {
        $boundItem = $this->city;

        return $boundItem ? $boundItem->cname : '';
    }

    public function getEventType() {
        return $this->hasOne(EFEventsType::className(), ['iid' => 'itype_id']);
    }

    public function getEventTypeName() {
        $boundItem = $this->eventType;

        return $boundItem ? $boundItem->cname : '';
    }

}
