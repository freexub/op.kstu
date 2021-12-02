<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobility".
 *
 * @property int $id
 * @property int $user_id
 * @property int $kind
 * @property int $type
 * @property int $financing
 * @property string $date_create
 * @property string $date_update
 * @property int $status
 */
class Mobility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kind', 'type'], 'required'],
            [['user_id', 'kind', 'type', 'financing', 'status'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
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
            'kind' => 'Kind',
            'type' => 'Type',
            'financing' => 'Financing',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'status' => 'Status',
        ];
    }
}
