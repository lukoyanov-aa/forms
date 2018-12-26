<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "b24_calc_group_manager".
 *
 * @property int $manager_id
 * @property int $group_id
 */
class B24CalcGroupManager extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'b24_calc_group_manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['i_manager_id', 'i_group_id'], 'required'],
            [['i_id', 'i_manager_id', 'i_group_id', 'i_turn_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'i_manager_id' => 'Manager ID',
            'i_group_id' => 'Group ID',
        ];
    }

    public static function getNextManager($groupId = null) {
        if ($groupId) {
            $manager = self::find()
                    ->where(['i_group_id' => $groupId])
                    ->orderBy([
                        'i_turn_id' => SORT_ASC,
                        'i_manager_id' => SORT_ASC,
                    ])
                    ->one();
            $managerMax = self::find()
                    ->where(['i_group_id' => $groupId])
                    ->orderBy([
                        'i_turn_id' => SORT_DESC,
                    ])
                    ->one();
            $manager->i_turn_id = $managerMax->i_turn_id + 1;
            $manager->save();
            return $manager->i_manager_id;
        }else{
            return 0;
        }
    }

}
