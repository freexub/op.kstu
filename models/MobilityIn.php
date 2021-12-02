<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobility_in".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int|null $specialityId
 * @property string|null $sex
 * @property string $homeUniver
 * @property string $department
 * @property string $major
 * @property int $course
 * @property int $reason
 * @property string $email
 * @property string $phone
 */
class MobilityIn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobility_in';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'homeUniver', 'department', 'major', 'course', 'reason', 'email', 'phone'], 'required'],
            [['specialityId', 'course', 'reason'], 'integer'],
            [['firstName', 'sex', 'lastName', 'homeUniver', 'department', 'major'], 'string', 'max' => 150],
            [['email', 'phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'specialityId' => 'Speciality',
            'sex' => 'Sex',
            'homeUniver' => 'Home Univer',
            'department' => 'Department',
            'major' => 'Major',
            'course' => 'Course',
            'reason' => 'Reason',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    public function getSpeciality(){
        return $this->hasOne(MobilitySpec::className(), ['id' => 'specialityId']);
    }
}
