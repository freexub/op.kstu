<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MobilityIn;

/**
 * MobilitySearch represents the model behind the search form of `app\models\MobilityIn`.
 */
class MobilitySearch extends MobilityIn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'specialityId', 'course', 'reason'], 'integer'],
            [['firstName', 'lastName', 'sex', 'homeUniver', 'department', 'major', 'email', 'phone'], 'safe'],
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
        $query = MobilityIn::find();

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
            'specialityId' => $this->specialityId,
            'course' => $this->course,
            'reason' => $this->reason,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'homeUniver', $this->homeUniver])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'major', $this->major])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
