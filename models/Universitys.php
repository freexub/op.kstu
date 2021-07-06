<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "universitys".
 *
 * @property int $id
 * @property string $name
 * @property string $shortName
 * @property int $active
 *
 * @property Rop[] $rops
 */
class Universitys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'universitys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'shortName'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['shortName'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название университета',
            'shortName' => 'Аббревиатура',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Rops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRops()
    {
        return $this->hasMany(Rop::className(), ['universityId' => 'id']);
    }
}
