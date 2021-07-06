<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profession_type_group".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $active
 */
class ProfessionTypeGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession_type_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['short_name'], 'string', 'max' => 50],
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
            'short_name' => 'Short Name',
            'active' => 'Active',
        ];
    }
}
