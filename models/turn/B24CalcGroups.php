<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "b24_calc_groups".
 *
 * @property int $id
 * @property string $name
 * @property string $portal
 */
class B24CalcGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b24_calc_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'portal'], 'required'],
            [['name', 'portal'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'portal' => 'Portal',
        ];
    }
}
