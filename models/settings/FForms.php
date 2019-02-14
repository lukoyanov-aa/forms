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
class FForms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cname', 'igroup_id', 'iya_counter_id', 'cya_metrika_target'], 'required'],
            [['igroup_id', 'iya_counter_id'], 'integer'],
            [['cname', 'cya_metrika_target'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'ID',
            'cname' => 'Название',
            'igroup_id' => 'Ответственная группа',
            'iya_counter_id' => 'YaCounterID',
            'cya_metrika_target' => 'Цель в Яндекс метрике'            
        ];
    }
    
    public function getGroup() {
        return $this->hasOne(TFGroups::className(), ['iid' => 'igroup_id']);
    }

    public function getGroupName() {
        $boundItem = $this->group;

        return $boundItem ? $boundItem->cname : '';
    }
}
