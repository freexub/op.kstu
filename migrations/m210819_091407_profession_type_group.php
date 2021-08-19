<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091407_profession_type_group extends Migration
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
            '{{%profession_type_group}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(500)->notNull(),
                'short_name'=> $this->string(50)->notNull(),
                'active'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%profession_type_group}}');
    }
}
