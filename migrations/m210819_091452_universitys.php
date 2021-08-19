<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091452_universitys extends Migration
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
            '{{%universitys}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->integer(250)->notNull(),
                'shortName'=> $this->integer(15)->notNull(),
                'active'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%universitys}}');
    }
}
