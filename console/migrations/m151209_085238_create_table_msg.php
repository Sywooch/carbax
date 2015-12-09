<?php

use yii\db\Schema;
use yii\db\Migration;

class m151209_085238_create_table_msg extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('msg', [
            'id'            => Schema::TYPE_PK,
            'subject'       => Schema::TYPE_STRING. '(255) NOT NULL',
            'from_type'     => Schema::TYPE_STRING. '(255) NOT NULL',
            'to_type'       => Schema::TYPE_STRING. '(255) NOT NULL',
            'from'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'to'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'content'       => Schema::TYPE_TEXT. ' NOT NULL',
            'dt_send'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'readed'        => Schema::TYPE_INTEGER. '(10) NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('msg');
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
