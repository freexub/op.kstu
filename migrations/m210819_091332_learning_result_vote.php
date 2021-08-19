<?php

use yii\db\Schema;
use yii\db\Migration;

class m210819_091332_learning_result_vote extends Migration
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
            '{{%learning_result_vote}}',
            [
                'id'=> $this->primaryKey(11),
                'lr_id'=> $this->integer(11)->notNull(),
                'autor'=> $this->integer(11)->notNull(),
                'result'=> $this->integer(11)->notNull(),
                'date_create'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%learning_result_vote}}');
    }
}
