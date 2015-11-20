<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091355_create_service_comfort_zone_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_comfort_zone', [
            'id'              => Schema::TYPE_PK,
            'service_id'      => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'comfort_zone_id' => Schema::TYPE_INTEGER . '(10) NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('service_comfort_zone_service_id_fk', 'service_comfort_zone', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('service_comfort_zone_comfort_zone_id_fk', 'service_comfort_zone', 'comfort_zone_id', 'comfort_zone', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('service_comfort_zone_service_id_fk', 'service_comfort_zone');
        $this->dropForeignKey('service_comfort_zone_comfort_zone_id_fk', 'service_comfort_zone');

        $this->dropTable('service_comfort_zone');
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
