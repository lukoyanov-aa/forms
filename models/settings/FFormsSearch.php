<?php

namespace app\modules\forms\models\settings;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\settings\FForms;

/**
 * FFormsSearch represents the model behind the search form of `app\modules\forms\models\forms\FForms`.
 */
class FFormsSearch extends FForms {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['iid', 'igroup_id', 'iya_counter_id', 'bemail'], 'integer'],
            [['cname', 'cya_metrika_target', 'ccrm'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = FForms::find();

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
            'igroup_id' => $this->igroup_id,
            'iya_counter_id' => $this->iya_counter_id,
            'bemail' => $this->bemail
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname])
                ->andFilterWhere(['like', 'ccrm', $this->ccrm])
                ->andFilterWhere(['like', 'cya_metrika_target', $this->cya_metrika_target]);

        return $dataProvider;
    }

}
