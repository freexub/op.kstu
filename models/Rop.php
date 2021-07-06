<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rop".
 *
 * @property int $id
 * @property string $regNumber Регистрационный номер
 * @property int $universityId ВУЗ (Разработчик)
 * @property int $eduArea Область образования
 * @property int $trainingDirections Направление подготовки
 * @property int $groupEduProgram Группа образовательных программ
 * @property string $eduProgramName Образовательная программа
 * @property int $eduGoalName Цель ОП
 * @property int $eduType Вид ОП
 * @property int $levelNrk Уровень по НРК
 * @property int $levelOrk Уровень по ОРК
 * @property int $distinctType Отличительные особенности ОП
 * @property int $universityPartner ВУЗ-партнер
 * @property int $creditsCount Объем кредитов
 * @property int $academicDegree Присуждаемая академическая степень
 * @property int $trainingPeriod Срок обучения
 * @property int $licenseNumber Номер лицензии на направление подготовки
 * @property int $dateCreate Дата регистрации в Реестре
 * @property int $dateUpdate Дата обновления паспорта ОП
 * @property int $statusId Статус
 * @property int $active Удаление
 *
 * @property Universitys $university
 */
class Rop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['universityId', 'eduArea', 'trainingDirections', 'groupEduProgram', 'eduProgramName', 'eduGoalName', 'levelNrk', 'levelOrk', 'creditsCount', 'academicDegree', 'trainingPeriod'], 'required'],
            [['universityId', 'eduArea', 'trainingDirections', 'groupEduProgram','eduGoalName', 'eduType', 'levelNrk', 'levelOrk', 'distinctType', 'universityPartner', 'creditsCount', 'academicDegree', 'trainingPeriod', 'licenseNumber', 'dateCreate', 'dateUpdate', 'statusId', 'active'], 'integer'],
            [['regNumber'], 'string', 'max' => 10],
            [['eduProgramName'], 'string', 'max' => 200],
            [['universityId'], 'exist', 'skipOnError' => true, 'targetClass' => Universitys::className(), 'targetAttribute' => ['universityId' => 'id']],
            [['eduArea'], 'exist', 'skipOnError' => true, 'targetClass' => eduArea::className(), 'targetAttribute' => ['eduArea' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regNumber' => 'Регистрационный номер',
            'universityId' => 'ВУЗ (Разработчик)',
            'eduArea' => 'Область образования',
            'trainingDirections' => 'Направление подготовки',
            'groupEduProgram' => 'Группа образовательных программ',
            'eduProgramName' => 'Образовательная программа',
            'eduGoalName' => 'Цель ОП',
            'eduType' => 'Вид ОП',
            'levelNrk' => 'Уровень по НРК',
            'levelOrk' => 'Уровень по ОРК',
            'distinctType' => 'Отличительные особенности ОП',
            'universityPartner' => 'ВУЗ-партнер',
            'creditsCount' => 'Объем кредитов',
            'academicDegree' => 'Присуждаемая академическая степень',
            'trainingPeriod' => 'Срок обучения',
            'licenseNumber' => 'Номер лицензии на направление подготовки',
            'dateCreate' => 'Дата регистрации в Реестре',
            'dateUpdate' => 'Дата обновления паспорта ОП',
            'statusId' => 'Статус',
            'active' => 'Удаление',
        ];
    }

    /**
     * Gets query for [[University]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(Universitys::className(), ['id' => 'universityId']);
    }

    public function getEduAreas()
    {
        return $this->hasOne(EduArea::className(), ['id' => 'eduArea']);
    }

    public function getTrainingDirection()
    {
        return $this->hasOne(TrainingDirection::className(), ['id' => 'trainingDirections']);
    }

    public function getGroupEduPrograms()
    {
        return $this->hasOne(TrainingDirection::className(), ['id' => 'groupEduProgram']);
    }
}
