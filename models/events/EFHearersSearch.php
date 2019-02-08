<?php

namespace app\modules\forms\models\events;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\events\EFHearers;

/**
 * EFHearersSearch represents the model behind the search form of `app\modules\forms\models\events\EFHearers`.
 */
class EFHearersSearch extends EFHearers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'ievent_id'], 'integer'],
            [['cname', 'cphone'], 'safe'],
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
        $query = EFHearers::find();

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
            'ievent_id' => $this->ievent_id,
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname])
            ->andFilterWhere(['like', 'cphone', $this->cphone]);

        return $dataProvider;
    }
}
