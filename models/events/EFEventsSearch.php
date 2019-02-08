<?php

namespace app\modules\forms\models\events;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\events\EFEvents;

/**
 * EFEventsSearch represents the model behind the search form of `app\modules\forms\models\events\EFEvents`.
 */
class EFEventsSearch extends EFEvents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'itype_id', 'bopened', 'imin', 'imax', 'icity_id'], 'integer'],
            [['cname', 'ddate_event', 'cadress', 'dprice1_date', 'dprice2_date', 'cbase_text', 'ctext_condition1', 'ctext_condition2'], 'safe'],
            [['fbase_price',], 'number'],
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
        $query = EFEvents::find();

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
            'itype_id' => $this->itype_id,
            'bopened' => $this->bopened,
            'imin' => $this->imin,
            'imax' => $this->imax,
            'ddate_event' => $this->ddate_event,
            'icity_id' => $this->icity_id,
            'fbase_price' => $this->fbase_price,
            'dprice1_date' => $this->dprice1_date,
            'dprice2_date' => $this->dprice2_date,
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname])
            ->andFilterWhere(['like', 'cadress', $this->cadress]);

        return $dataProvider;
    }
}
