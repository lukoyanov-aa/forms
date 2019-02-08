<?php

namespace app\modules\forms\models\settings;

use Yii;

/**
 * This is the model class for table "f_target_url".
 *
 * @property int $iid
 * @property string $cname
 * @property string $ctitle
 * @property int $isource_id 
 * @property string $ctarget_url
 */
class FTargetUrl extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'f_target_url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cname', 'ctitle', 'csource_id', 'ctarget_url'], 'required'],
            [['cname', 'ctitle', 'ctarget_url', 'csource_id',], 'string', 'max' => 255],
            [['ctarget_url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'iid' => 'ID',
            'cname' => 'Продукт',
            'ctitle' => 'Источник',
            'csource_id' => 'ID источника в Б24',
            'ctarget_url' => 'Target_Url',
        ];
    }

}
