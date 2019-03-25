<?php

namespace app\modules\forms\models\turn;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\turn\TFGroupsManagers;

/**
 * TFGroupsManagersSearch represents the model behind the search form of `app\modules\forms\models\turn\TFGroupsManagers`.
 */
class TFGroupsManagersSearch extends TFGroupsManagers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'igroups_id', 'imanagers_id'], 'integer'],
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
        $query = TFGroupsManagers::find();

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
            'igroups_id' => $this->igroups_id,
            'imanagers_id' => $this->imanagers_id,
        ]);

        return $dataProvider;
    }
}
