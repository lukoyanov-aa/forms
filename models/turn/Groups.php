<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "tf_groups".
 *
 * @property int $iid
 * @property string $cname
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_turn_groups';
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
