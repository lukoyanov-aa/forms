<?php

namespace app\modules\forms\models\events;

use Yii;

/**
 * This is the model class for table "ef_hearers".
 *
 * @property int $iid
 * @property string $cname
 * @property int $ievent_id
 * @property string $cphone
 */
class EFHearers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ef_hearers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cname', 'ievent_id', 'cphone'], 'required'],
            [['ievent_id'], 'integer'],
            [['cname'], 'string', 'max' => 255],
            [['cphone'], 'string', 'max' => 10],
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
            'ievent_id' => 'Ievent ID',
            'cphone' => 'Cphone',
        ];
    }
}
