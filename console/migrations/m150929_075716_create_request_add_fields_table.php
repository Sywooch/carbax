<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_075716_create_request_add_fields_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_add_fields', [
            'id' => Schema::TYPE_PK,
            'request_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_fields_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('request_add_fields_request_fk', 'request_add_fields', 'request_id', 'request', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('request_add_fields_add_fields_fk', 'request_add_fields', 'add_fields_id', 'additional_fields', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('request_add_fields_request_fk', 'request_add_add_fields');
        $this->dropForeignKey('request_add_fields_add_fields_fk', 'request_add_add_fields');

        $this->dropTable('request_add_fields');
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
