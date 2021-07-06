<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edu_area}}".
 *
 * @property int $id
 * @property int|null $pt_id
 * @property string|null $code
 * @property string|null $name
 * @property int|null $classifier
 *
 * @property TrainingDirection[] $trainingDirections
 */
class EduArea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pt_id', 'classifier'], 'integer'],
            [['code'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 49],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pt_id' => Yii::t('app', 'Pt ID'),
            'code' => 'Code',
            'name' => Yii::t('app', 'Область образования'),
            'classifier' => Yii::t('app', 'Classifier'),
        ];
//        return [
//            'id' => Yii::t('app', 'ID'),
//            'pt_id' => Yii::t('app', 'Pt ID'),
//            'code' => Yii::t('app', 'Code'),
//            'name' => Yii::t('app', 'Name'),
//            'classifier' => Yii::t('app', 'Classifier'),
//        ];
    }

    /**
     * Gets query for [[TrainingDirections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingDirections()
    {
        return $this->hasMany(TrainingDirection::className(), ['ea_id' => 'id']);
    }

    public function getCodeName(){
        return $this->code . " " . $this->name;
    }

}
