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
class CrmFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_settings_crm_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ctype', 'cfield', 'iforms_id'], 'required'],
            [['ctext'], 'string'],
            [['iforms_id'], 'integer'],
            [['ctype', 'cfield'], 'string', 'max' => 255],
            [['cfield', 'iforms_id', 'ctype'], 'unique', 'targetAttribute' => ['cfield', 'iforms_id', 'ctype']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'ID',
            'ctype' => 'Вид сущности',
            'cfield' => 'Поле',
            'ctext' => 'Шаблон',
            'iforms_id' => 'Форма',
        ];
    }
}
