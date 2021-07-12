<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%learning_result}}".
 *
 * @property int $id
 * @property int $competencies_id
 * @property string $name
 * @property int $status
 * @property int $autor
 *
 * @property Competencies $competencies
 */
class LearningResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%learning_result}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['competencies_id', 'name'], 'required'],
            [['competencies_id', 'status', 'autor'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['competencies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competencies::className(), 'targetAttribute' => ['competencies_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'competencies_id' => Yii::t('app', 'Competencies ID'),
            'name' => Yii::t('app', 'Результат обучения'),
            'status' => Yii::t('app', 'Status'),
            'autor' => Yii::t('app', 'Autor'),
        ];
    }

    /**
     * Gets query for [[Competencies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencies()
    {
        return $this->hasOne(Competencies::className(), ['id' => 'competencies_id']);
    }

}
