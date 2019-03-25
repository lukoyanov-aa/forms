<?php

namespace app\modules\forms\models\settings;

use Yii;

/**
 * This is the model class for table "forms_settings_form_fields".
 *
 * @property int $iid
 * @property string $cname
 * @property int $iform_id
 * @property string $ctitle 
 */
class FormFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_settings_form_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cname', 'iform_id', 'ctitle'], 'required'],
            [['iform_id'], 'integer'],
            [['cname', 'ctitle'], 'string', 'max' => 255],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'Iid',
            'cname' => 'Cname',
            'iform_id' => 'Iform ID',
            'ctitle' => 'Ctitle',
        ];
    }
}




