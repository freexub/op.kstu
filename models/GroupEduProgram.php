<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%group_edu_program}}".
 *
 * @property int $id
 * @property int $td_id
 * @property string $name
 * @property string $code
 * @property int $active
 *
 * @property TrainingDirection $td
 */
class GroupEduProgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%group_edu_program}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['td_id', 'name', 'code'], 'required'],
            [['td_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['code'], 'string', 'max' => 15],
            [['td_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingDirection::className(), 'targetAttribute' => ['td_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'td_id' => Yii::t('app', 'Td ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[Td]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTd()
    {
        return $this->hasOne(TrainingDirection::className(), ['id' => 'td_id']);
    }

    public function getCodeName(){
        return $this->code . " " . $this->name;
    }
}
