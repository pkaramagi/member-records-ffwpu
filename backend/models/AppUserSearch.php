<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AppUser;

/**
 * AppUserSearch represents the model behind the search form about `common\models\AppUser`.
 */
class AppUserSearch extends AppUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'blessing_group_id', 'religion_id', 'generation_id'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'username', 'nationality', 'date_of_birth', 'spiritual_date_of_birth', 'spiritual_parent', 'passport', 'picture', 'joined_at', 'sex'], 'safe'],
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
        $query = AppUser::find();

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
            'blessing_group_id' => $this->blessing_group_id,
            'date_of_birth' => $this->date_of_birth,
            'spiritual_date_of_birth' => $this->spiritual_date_of_birth,
            'religion_id' => $this->religion_id,
            'generation_id' => $this->generation_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'spiritual_parent', $this->spiritual_parent])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'joined_at', $this->joined_at])
            ->andFilterWhere(['like', 'sex', $this->sex]);

        return $dataProvider;
    }
}
