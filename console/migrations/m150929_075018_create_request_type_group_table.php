<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_075018_create_request_type_group_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_type_group', [
            'id' => Schema::TYPE_PK,
            'request_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_fields_group_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('request_type_group_id_fk', 'request_type_group', 'request_type_id', 'request_type', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('request_add_fields_group_id_fk', 'request_type_group', 'add_fields_group_id', 'add_fields_group', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('request_type_group_id_fk', 'request_type_group');
        $this->dropForeignKey('request_add_fields_group_id_fk', 'request_type_group');

        $this->dropTable('request_type_group');
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
