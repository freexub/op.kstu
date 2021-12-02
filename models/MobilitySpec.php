<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobility_spec".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $degree
 * @property string|null $contry
 * @property string|null $university
 * @property int|null $type
 */
class MobilitySpec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobility_spec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['degree'], 'string', 'max' => 8],
            [['contry'], 'string', 'max' => 10],
            [['university'], 'string', 'max' => 46],
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
            'degree' => 'Degree',
            'contry' => 'Contry',
            'university' => 'University',
            'type' => 'Type',
        ];
    }

    public function getCountry(){
        $model = MobilitySpec::find()->select('contry')->groupBy('contry')->orderBy('contry ASC')->all();
        return $model;
    }

    public function getUniversity($country){
        $model = MobilitySpec::find()->select('university')->where(['contry'=>$country])->groupBy('university')->orderBy('university ASC')->all();
        return $model;
    }

    public function getSpeciality($university){
        $model = MobilitySpec::find()->where(['university'=>$university])->orderBy('name ASC')->all();
        return $model;
    }
}
