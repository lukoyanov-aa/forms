<?php

namespace app\modules\forms\models\admin;

use Yii;

/**
 * This is the model class for table "b24portal".
 *
 * @property string $PORTAL
 * @property string $ACCESS_TOKEN
 * @property string $REFRESH_TOKEN
 * @property string $MEMBER_ID
 */
class B24portal extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'b24portal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['PORTAL', 'ACCESS_TOKEN', 'REFRESH_TOKEN', 'MEMBER_ID'], 'required'],
            [['PORTAL'], 'string', 'max' => 255],
            [['MEMBER_ID'], 'string', 'max' => 32],
            [['ACCESS_TOKEN', 'REFRESH_TOKEN'], 'string', 'max' => 70],
            [['PORTAL'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'PORTAL' => 'Portal',
            'ACCESS_TOKEN' => 'Access Token',
            'REFRESH_TOKEN' => 'Refresh Token',
            'MEMBER_ID' => 'Member ID',
        ];
    }

    public function getAuthFromB24portal($portal = '') {
//		$res = $db->getRow('SELECT * FROM `b24_portal_reg` LIMIT 1');
        $res = $this->find()
                ->where(['PORTAL' => $portal])
                ->one();
        return $res;
    }

    public function isSetB24portal($portal = '') {
//		$res = $db->getRow('SELECT * FROM `b24_portal_reg` LIMIT 1');
        $res = $this->find()
                ->where(['PORTAL' => $portal])
                ->count();
        $resBool = boolval($res);
        return $resBool;
    }

}
