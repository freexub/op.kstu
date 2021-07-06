<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profession_type".
 *
 * @property int $id
 * @property string|null $name
 * @property int $group_id
 *
 * @property ProfessionTypeGroup $group
 * @property TrainingDirection[] $trainingDirections
 */
class ProfessionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['group_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfessionTypeGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'group_id' => 'Group ID',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ProfessionTypeGroup::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[TrainingDirections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingDirections()
    {
        return $this->hasMany(TrainingDirection::className(), ['pt_id' => 'id']);
    }
}
