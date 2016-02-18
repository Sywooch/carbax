<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091227_create_services_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('services', [
            'id' => Schema::TYPE_PK,
            'service_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'name' => Schema::TYPE_STRING. '(255) NOT NULL',
            'email' => Schema::TYPE_STRING. '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT. ' NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('service_user_id_fk', 'services', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('service_type_id_fk', 'services', 'service_type_id', 'service_type', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('service_user_id_fk', 'services');
        $this->dropForeignKey('service_type_id_fk', 'services');

        $this->dropTable('services');
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
