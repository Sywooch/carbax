<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091453_create_service_auto_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_auto_type', [
            'id'           => Schema::TYPE_PK,
            'service_id'   => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'auto_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('auto_type_service_id_fk', 'service_auto_type', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('auto_type_auto_type_id_fk', 'service_auto_type', 'auto_type_id', 'auto_type', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('auto_type_service_id_fk', 'service_auto_type');
        $this->dropForeignKey('auto_type_auto_type_id_fk', 'service_auto_type');

        $this->dropTable('service_auto_type');
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
