<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091312_learning_result extends Migration
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
            '{{%learning_result}}',
            [
                'id'=> $this->primaryKey(11),
                'competencies_id'=> $this->integer(11)->notNull(),
                'name'=> $this->string(150)->notNull(),
                'status'=> $this->integer(11)->notNull(),
                'autor'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%learning_result}}');
    }
}
