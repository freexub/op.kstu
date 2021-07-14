<?php

namespace app\modules\expert\models;
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
class Programs extends \app\models\Rop
{
    /**
     * {@inheritdoc}
     */

}