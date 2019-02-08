<?php

namespace app\modules\forms\models\events;

use Yii;

/**
 * This is the model class for table "ef_events_type".
 *
 * @property int $iid
 * @property string $cname
 */
class EFEventsType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ef_events_type';
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
