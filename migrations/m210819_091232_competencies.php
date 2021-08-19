<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091232_competencies extends Migration
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
            '{{%competencies}}',
            [
                'id'=> $this->primaryKey(11),
                'rop_id'=> $this->integer(11)->notNull(),
                'name'=> $this->string(200)->notNull(),
                'status'=> $this->integer(11)->notNull(),
                'autor'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%competencies}}');
    }
}
