<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_074950_create_request_add_field_value_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_add_field_value', [
            'id' => Schema::TYPE_PK,
            'request_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'key' => Schema::TYPE_STRING . '(255) NOT NULL',
            'value' => Schema::TYPE_STRING . '(255) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('request_add_field_value');
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
