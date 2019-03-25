<?php

namespace app\modules\forms\models\settings;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\settings\CrmFields;

/**
 * CrmFieldsSearch represents the model behind the search form of `app\modules\forms\models\settings\CrmFields`.
 */
class CrmFieldsSearch extends CrmFields
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid'], 'integer'],
            [['ctype', 'cfield', 'iforms_id', 'ctext'], 'safe'],
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
        $query = CrmFields::find();

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
            'iforms_id' => $this->iforms_id, 
        ]);

        $query->andFilterWhere(['like', 'ctype', $this->ctype])
            ->andFilterWhere(['like', 'cfield', $this->cfield])            
            ->andFilterWhere(['like', 'ctext', $this->ctext]);

        return $dataProvider;
    }
}
