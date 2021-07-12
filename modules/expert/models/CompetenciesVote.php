<?php

namespace app\modules\expert\models;

use Yii;

/**
 * This is the model class for table "competencies_vote".
 *
 * @property int $id
 * @property int $competencies_id
 * @property int $autor
 * @property int $result
 * @property string $date_create
 */
class CompetenciesVote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competencies_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['competencies_id', 'result'], 'required'],
            [['competencies_id', 'autor', 'result'], 'integer'],
            [['date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'competencies_id' => 'Competencies ID',
            'autor' => 'Autor',
            'result' => 'Result',
            'date_create' => 'Date Create',
        ];
    }
}
