<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091245_edu_area extends Migration
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
            '{{%edu_area}}',
            [
                'id'=> $this->primaryKey(11),
                'pt_id'=> $this->integer(11)->null()->defaultValue(null),
                'code'=> $this->string(4)->null()->defaultValue(null),
                'name'=> $this->string(50)->null()->defaultValue(null),
                'classifier'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%edu_area}}');
    }
}
