<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091653_create_service_client_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_client_type', [
            'id'           => Schema::TYPE_PK,
            'service_id'   => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'client_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('client_type_service_id_fk', 'service_client_type', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('client_type_client_type_id_fk', 'service_client_type', 'client_type_id', 'client_type', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('client_type_service_id_fk', 'service_client_type');
        $this->dropForeignKey('client_type_client_type_id_fk', 'service_client_type');

        $this->dropTable('service_client_type');
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
