<?php

use yii\db\Schema;
use yii\db\Migration;

class m151208_111354_create_table_request_additional_fields extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_additional_fields', [
            'id' => Schema::TYPE_PK,
            'request_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_field_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('request_additional_fields');
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
