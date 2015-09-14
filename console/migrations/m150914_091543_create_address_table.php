<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091543_create_address_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('address', [
            'id' => Schema::TYPE_PK,
            'service_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'address' => Schema::TYPE_STRING . '(255) NOT NULL',
            'geo' => Schema::TYPE_STRING . '(255) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('address_service_id_fk', 'address', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('address_service_id_fk', 'address');

        $this->dropTable('address');
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
