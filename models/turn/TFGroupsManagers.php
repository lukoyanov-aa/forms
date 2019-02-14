<?php

namespace app\modules\forms\models\turn;

use Yii;

/**
 * This is the model class for table "tf_groups_managers".
 *
 * @property int $iid
 * @property int $igroups_id
 * @property int $imanagers_id
 */
class TFGroupsManagers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_turn_groups_managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['igroups_id', 'imanagers_id'], 'required'],
            [['igroups_id', 'imanagers_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'ID',
            'igroups_id' => 'Группа',
            'imanagers_id' => 'Менеджер',
            'iturn_id' => 'Коэффициент заявки',
        ];
    }
    public function getGroup(){
        return $this->hasOne(TFGroups::className(), ['iid' => 'igroups_id']);
    }
    
    public static function getNextManager($groupId = null) {
        if ($groupId) {
            $manager = self::find()
                    ->where(['igroups_id' => $groupId])
                    ->orderBy([
                        'iturn_id' => SORT_ASC,
                        'imanagers_id' => SORT_ASC,
                    ])
                    ->one();
            $managerMax = self::find()
                    ->where(['igroups_id' => $groupId])
                    ->orderBy([
                        'iturn_id' => SORT_DESC,
                    ])
                    ->one();
            $manager->iturn_id = $managerMax->iturn_id + 1;
            $manager->save();
            $manager_ = TFManagers::find()
                    ->where(['iid' => $manager->imanagers_id])
                    ->one();
            return $manager_->ib24_user_id;
        }else{
            return 0;
        }
    }
}
