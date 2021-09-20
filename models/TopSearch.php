<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RopSearch represents the model behind the search form of `app\models\Rop`.
 */
class TopSearch extends Rop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'universityId', 'eduArea', 'trainingDirections', 'groupEduProgram', 'eduGoalName', 'eduType', 'levelNrk', 'levelOrk', 'distinctType', 'universityPartner', 'creditsCount', 'academicDegree', 'trainingPeriod', 'licenseNumber', 'dateCreate', 'dateUpdate', 'statusId', 'active'], 'integer'],
            [['eduProgramName'], 'string'],
            [['regNumber'], 'safe'],
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
        $query = Rop::find()->where(['top'=>1]);

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
            'universityId' => $this->universityId,
            'eduArea' => $this->eduArea,
            'trainingDirections' => $this->trainingDirections,
            'groupEduProgram' => $this->groupEduProgram,
            'eduGoalName' => $this->eduGoalName,
            'eduType' => $this->eduType,
            'levelNrk' => $this->levelNrk,
            'levelOrk' => $this->levelOrk,
            'distinctType' => $this->distinctType,
            'universityPartner' => $this->universityPartner,
            'creditsCount' => $this->creditsCount,
            'academicDegree' => $this->academicDegree,
            'trainingPeriod' => $this->trainingPeriod,
            'licenseNumber' => $this->licenseNumber,
            'dateCreate' => $this->dateCreate,
            'dateUpdate' => $this->dateUpdate,
            'statusId' => $this->statusId,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'regNumber', $this->regNumber]);
        $query->andFilterWhere(['like', 'eduProgramName', $this->eduProgramName]);

        return $dataProvider;
    }
}
