<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_094143_create_service_type_group_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_type_group', [
            'id' => Schema::TYPE_PK,
            'service_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_fields_group_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('service_t_g_add_fields_g_fk', 'service_type_group', 'service_type_id', 'service_type', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('service_t_g_service_type_fk', 'service_type_group', 'add_fields_group_id', 'add_fields_group', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('service_t_g_add_fields_g_fk', 'service_type_group');
        $this->dropForeignKey('service_t_g_service_type_fk', 'service_type_group');

        $this->dropTable('service_type_group');
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
