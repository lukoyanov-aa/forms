<?php

namespace app\modules\b24\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b24\models\B24portal;

/**
 * B24portalSearch represents the model behind the search form of `app\modules\b24\models\B24portal`.
 */
class B24portalSearch extends B24portal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PORTAL', 'ACCESS_TOKEN', 'REFRESH_TOKEN', 'MEMBER_ID'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = B24portal::find();

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

        $query->andFilterWhere(['like', 'PORTAL', $this->PORTAL])
            ->andFilterWhere(['like', 'ACCESS_TOKEN', $this->ACCESS_TOKEN])
            ->andFilterWhere(['like', 'REFRESH_TOKEN', $this->REFRESH_TOKEN])
            ->andFilterWhere(['like', 'MEMBER_ID', $this->MEMBER_ID]);

        return $dataProvider;
    }
}
