<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobility_mop".
 *
 * @property int $id
 * @property string $name
 * @property string $date_create
 * @property int $active
 */
class MobilityMop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobility_mop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['date_create'], 'safe'],
            [['active'], 'integer'],
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
            'date_create' => 'Date Create',
            'active' => 'Active',
        ];
    }
}
