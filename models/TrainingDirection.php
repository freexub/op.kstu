<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_direction".
 *
 * @property int $id
 * @property int|null $ea_id
 * @property string|null $name
 * @property string|null $code
 *
 * @property ProfessionType $pt
 */
class TrainingDirection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ea_id', 'id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 100],
            [['ea_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfessionType::className(), 'targetAttribute' => ['pt_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ea_id' => 'Pt ID',
            'code' => 'Code',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Pt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPt()
    {
        return $this->hasOne(ProfessionType::className(), ['id' => 'ea_id']);
    }

    public function getCodeName(){
        return $this->code . " " . $this->name;
    }
}
