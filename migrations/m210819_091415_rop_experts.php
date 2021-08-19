<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091415_rop_experts extends Migration
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
            '{{%rop_experts}}',
            [
                'id'=> $this->primaryKey(11),
                'rop_id'=> $this->integer(11)->notNull(),
                'user_id'=> $this->integer(11)->notNull(),
                'active'=> $this->integer(11)->notNull(),
                'turn'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%rop_experts}}');
    }
}
