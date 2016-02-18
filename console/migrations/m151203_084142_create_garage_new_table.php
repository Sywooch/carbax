<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_084142_create_garage_new_table extends Migration
{
    public function up()
    {
        //$this->dropTable('garage');

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('garage', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'man_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'model_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(20) NOT NULL',
            'comments' => Schema::TYPE_STRING,
            'title' => Schema::TYPE_STRING,

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('garage');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
