<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "b24_calc_manager".
 *
 * @property int $id
 * @property string $name
 * @property int $i_system_id 
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b24_calc_manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'i_system_id'], 'required'],
           [['i_system_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'i_system_id' => 'I System ID',
        ];
    }
}
