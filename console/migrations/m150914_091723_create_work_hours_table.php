<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091723_create_work_hours_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('work_hours', [
            'id' => Schema::TYPE_PK,
            'service_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'day' => Schema::TYPE_STRING . '(255) ',
            'hours_from' => Schema::TYPE_INTEGER. '(2) ',
            'hours_to' => Schema::TYPE_INTEGER. '(2) ',
            '24h' =>  Schema::TYPE_INTEGER. '(1) ',

        ], $tableOptions);

        $this->addForeignKey('work_hours_service_id_fk', 'work_hours', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('work_hours_service_id_fk', 'work_hours');

        $this->dropTable('work_hours');
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
