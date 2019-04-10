<?php

namespace app\modules\forms\models\turn;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\turn\Managers;

/**
 * ManagersSearch represents the model behind the search form of `app\modules\forms\models\turn\Managers`.
 */
class ManagersSearch extends Managers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'ib24_user_id'], 'integer'],
            [['cname'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applead
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Managers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iid' => $this->iid,
            'ib24_user_id' => $this->ib24_user_id,
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname]);

        return $dataProvider;
    }
}
