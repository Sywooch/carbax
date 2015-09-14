<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_093856_create_service_add_fields_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_add_fields', [
            'id' => Schema::TYPE_PK,
            'service_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_fields_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('service_add_fields_services_fk', 'service_add_fields', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('service_add_fields_add_fields_fk', 'service_add_fields', 'add_fields_id', 'additional_fields', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('service_add_fields_services_fk', 'service_add_fields');
        $this->dropForeignKey('service_add_fields_add_fields_fk', 'service_add_fields');

        $this->dropTable('service_add_fields');
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
