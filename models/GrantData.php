<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grant_data".
 *
 * @property int $id
 * @property string|null $school
 * @property string|null $phone
 * @property string|null $email
 */
class GrantData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grant_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['school'], 'string', 'max' => 287],
            [['phone'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 33],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school' => 'School',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }
}
