<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UnificationCareerRecord;

/**
 * UnificationCareerRecordSearch represents the model behind the search form about `common\models\UnificationCareerRecord`.
 */
class UnificationCareerRecordSearch extends UnificationCareerRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'organisation_id', 'current', 'user_id'], 'integer'],
            [['position', 'department', 'description', 'start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = UnificationCareerRecord::find();

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
            'id' => $this->id,
            'organisation_id' => $this->organisation_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'current' => $this->current,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
