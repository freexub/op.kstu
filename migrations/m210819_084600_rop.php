<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_084600_rop extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%rop}}',
            [
                'id'=> $this->primaryKey(11),
                'regNumber'=> $this->string(10)->notNull(),
                'universityId'=> $this->integer(11)->notNull(),
                'eduArea'=> $this->integer(11)->notNull(),
                'trainingDirections'=> $this->integer(11)->notNull(),
                'groupEduProgram'=> $this->integer(11)->notNull(),
                'eduProgramName'=> $this->string(200)->notNull(),
                'eduGoalName'=> $this->string(500)->notNull(),
                'eduType'=> $this->integer(11)->notNull(),
                'levelNrk'=> $this->integer(11)->notNull(),
                'levelOrk'=> $this->integer(11)->notNull(),
                'distinctType'=> $this->integer(11)->notNull(),
                'universityPartner'=> $this->integer(11)->notNull(),
                'creditsCount'=> $this->integer(11)->notNull(),
                'academicDegree'=> $this->string(500)->notNull(),
                'trainingPeriod'=> $this->integer(11)->notNull(),
                'licenseNumber'=> $this->integer(11)->notNull(),
                'dateCreate'=> $this->integer(11)->notNull(),
                'dateUpdate'=> $this->integer(11)->notNull(),
                'statusId'=> $this->integer(11)->notNull(),
                'active'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%rop}}');
    }
}
