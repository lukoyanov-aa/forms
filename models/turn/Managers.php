<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "tf_managers".
 *
 * @property int $iid
 * @property int $ib24_user_id
 * @property string $cname
 */
class Managers extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'forms_turn_managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ib24_user_id', 'cname'], 'required'],
            [['ib24_user_id'], 'integer'],
            [['cname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'iid' => 'ID',
            'ib24_user_id' => 'ID пользователя Битрикс24',
            'cname' => 'Имя',
        ];
    }

    public function getGroupsManagers() {
        return $this->hasMany(GroupsManagers::className(), ['imanagers_id' => 'iid']);
        //->viaTable('tf_groups_managers', ['imanagers_id'=>'iid']);
    }

    public function getGroup() {
        return $this->hasMany(Groups::className(), ['iid' => 'igroups_id'])
                        ->viaTable('tf_groups_managers', ['imanagers_id' => 'iid']);
    }

    public function getGroupName() {
        return $this->group->cname;
        
    }

}
