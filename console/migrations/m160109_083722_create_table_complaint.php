<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_083722_create_table_complaint extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('complaint', [
            'id'            => Schema::TYPE_PK,
            'from_user'     => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'to_object'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'subject'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'dt_add'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'read_complaint'     => Schema::TYPE_INTEGER. '(2) NOT NULL',
            'text'     => Schema::TYPE_TEXT. ' NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('complaint');
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
