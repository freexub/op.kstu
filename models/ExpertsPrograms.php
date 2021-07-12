<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experts_programs".
 *
 * @property int $id
 * @property int $user_id
 * @property int $rop_id
 * @property int $active
 * @property string $date_create
 * @property int $type
 */
class ExpertsPrograms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experts_programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rop_id', 'active', 'type'], 'required'],
            [['user_id', 'rop_id', 'active', 'type'], 'integer'],
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
            'user_id' => 'User ID',
            'rop_id' => 'Rop ID',
            'active' => 'Active',
            'date_create' => 'Date Create',
            'type' => 'Type',
        ];
    }
}
