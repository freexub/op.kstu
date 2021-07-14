<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "learning_result_vote".
 *
 * @property int $id
 * @property int $lr_id
 * @property int $autor
 * @property int $result
 * @property string $date_create
 */
class LearningResultVote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learning_result_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lr_id', 'autor', 'result'], 'required'],
            [['lr_id', 'autor', 'result'], 'integer'],
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
            'lr_id' => 'Lr ID',
            'autor' => 'Autor',
            'result' => 'Result',
            'date_create' => 'Date Create',
        ];
    }
}
