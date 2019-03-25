<?php

namespace app\modules\forms\models\settings;

use Yii;

/**
 * This is the model class for table "forms_settings_crm_fields".
 *
 * @property int $iid
 * @property string $ctype
 * @property string $cfield
 * @property string $ctext
 * @property int $iforms_id
 */
class MailFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_settings_mail_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cfield', 'iforms_id'], 'required'],
            [['ctext'], 'string'],
            [['iforms_id'], 'integer'],
            [['cfield'], 'string', 'max' => 255],
            [['cfield', 'iforms_id'], 'unique', 'targetAttribute' => ['cfield', 'iforms_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'ID',            
            'cfield' => 'Поле',
            'ctext' => 'Шаблон',
            'iforms_id' => 'Форма',
        ];
    }
}
