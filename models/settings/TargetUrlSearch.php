<?php

namespace app\modules\forms\models\settings;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\settings\TargetUrl;

/**
 * TargetUrlSearch represents the model behind the search form of `app\modules\forms\models\b24\TargetUrl`.
 */
class TargetUrlSearch extends TargetUrl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid'], 'integer'],
            [['cname', 'ctitle', 'ctarget_url', 'csource_id',], 'safe'],
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
        $query = TargetUrl::find();

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
            'csource_id' => $this->csource_id,
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname])
            ->andFilterWhere(['like', 'ctitle', $this->ctitle])
            ->andFilterWhere(['like', 'ctarget_url', $this->ctarget_url]);

        return $dataProvider;
    }
}
