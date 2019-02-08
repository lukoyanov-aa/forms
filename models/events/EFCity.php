<?php

namespace app\modules\forms\models\events;

use Yii;

/**
 * This is the model class for table "ef_city".
 *
 * @property int $iid
 * @property string $cname
 */
class EFCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ef_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cname'], 'required'],
            [['cname'], 'string', 'max' => 255],
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
        ];
    }
}
