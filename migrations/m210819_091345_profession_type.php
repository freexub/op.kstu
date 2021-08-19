<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091345_profession_type extends Migration
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
            '{{%profession_type}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(100)->null()->defaultValue(null),
                'group_id'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%profession_type}}');
    }
}
