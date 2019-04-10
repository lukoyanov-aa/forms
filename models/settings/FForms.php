<?php

namespace app\modules\forms\models\settings;

use Yii;
use app\modules\forms\models\turn\TFGroups;

/**
 * This is the model class for table "f_forms".
 *
 * @property int $iid
 * @property string $cname
 * @property int $igroup_id
 * @property int $iya_counter_id
 * @property string $cya_metrika_target 
 */
class FForms extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'forms_forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cname', 'igroup_id', 'iya_counter_id', 'cya_metrika_target', 'cgoogle_id', 'ccrm', 'bemail'], 'required'],
            [['igroup_id', 'iya_counter_id', 'bemail'], 'integer'],
            [['cname', 'cya_metrika_target', 'ccrm', 'cgoogle_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'iid' => 'ID',
            'cname' => 'Название',
            'igroup_id' => 'Ответственная группа',
            'iya_counter_id' => 'YaCounterID',
            'cya_metrika_target' => 'Цель в Яндекс метрике',
            'ccrm' => 'crm сущность',
            'bemail' => 'Отправить на email',
            'cgoogle_id' => 'Conversion ID/Ярлык конверсии'
        ];
    }

    public function getGroup() {
        return $this->hasOne(TFGroups::className(), ['iid' => 'igroup_id']);
    }

    public function getGroupName() {
        $boundItem = $this->group;

        return $boundItem ? $boundItem->cname : '';
    }

    public function getCrmName() {
        switch ($this->ccrm) {
            case 'none':
                return 'не создавать';
                break;
            case 'lead':
                return 'Лид';
                break;
            case 'deal':
                return 'Сделка';
                break;
            default :
                return 'не создавать';
                break;
        }
    }

    public function getLeadsFieldsForm() {
        return $this->hasMany(CrmFields::className(), ['iforms_id' => 'iid',])->where(['ctype' => 'lead']);        
    }

    public function getDealsFieldsForm() {
        return $this->hasMany(CrmFields::className(), ['iforms_id' => 'iid',])->where(['ctype' => 'deal']);       
    }

    public function getMailFieldsForm() {
        return $this->hasMany(MailFields::className(), ['iforms_id' => 'iid',]);        
    }

}
