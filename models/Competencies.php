<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Competencies}}".
 *
 * @property int $id
 * @property int $rop_id
 * @property string $name
 * @property int $status
 */
class Competencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Competencies}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rop_id', 'name'], 'required'],
            [['rop_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rop_id' => Yii::t('app', 'Rop ID'),
            'name' => Yii::t('app', 'Компетенция'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
