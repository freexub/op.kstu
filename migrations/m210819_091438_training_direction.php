<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091438_training_direction extends Migration
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
            '{{%training_direction}}',
            [
                'id'=> $this->primaryKey(11),
                'ea_id'=> $this->integer(11)->null()->defaultValue(null),
                'name'=> $this->string(100)->null()->defaultValue(null),
                'code'=> $this->string(100)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%training_direction}}');
    }
}
