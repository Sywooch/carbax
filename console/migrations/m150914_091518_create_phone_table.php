<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091518_create_phone_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('phone', [
            'id' => Schema::TYPE_PK,
            'service_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'number' => Schema::TYPE_STRING . '(255) ',

        ], $tableOptions);

        $this->addForeignKey('phone_service_id_fk', 'phone', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('phone_service_id_fk', 'phone');

        $this->dropTable('phone');
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
