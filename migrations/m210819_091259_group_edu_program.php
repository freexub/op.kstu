<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091259_group_edu_program extends Migration
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
            '{{%group_edu_program}}',
            [
                'id'=> $this->primaryKey(11),
                'td_id'=> $this->integer(11)->notNull(),
                'name'=> $this->string(150)->notNull(),
                'code'=> $this->string(15)->notNull(),
                'active'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%group_edu_program}}');
    }
}
