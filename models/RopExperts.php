<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rop_experts".
 *
 * @property int $id
 * @property int $rop_id
 * @property int $user_id
 * @property int $active
 * @property int|null $turn
 */
class RopExperts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rop_experts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rop_id', 'user_id'], 'required'],
            [['rop_id', 'user_id', 'active', 'turn'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rop_id' => 'Rop ID',
            'user_id' => 'User ID',
            'active' => 'Active',
            'turn' => 'Turn',
        ];
    }

    public function getExperts(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function User($id){
        return User::findOne(['id'=>$id]);
    }

    public function getExpertName($id){

        $names = $this->experts->username;
        $query = RopExperts::findOne(['turn'=>$id]);

//        var_dump($query);die();

        if (isset($query->id)){
//            $expert = RopExperts::findOne(['id'=>]);
            $names = $names . ', ' . $this->User($query->user_id)->username;
        }
        return $names;
    }

//    function getChild($id){
//        $turn = RopExperts::findOne(['turn'=>$id]);
//        if (count($turn) > 0){
//            $names = [
//                $this->User($id)->id => $this->User($id)->username
//            ];
//        }
//    }

}
