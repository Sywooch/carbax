<?php

use yii\db\Schema;
use yii\db\Migration;

class m160215_110155_create_table_request_by_service_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_by_service_type', [
            'id' => Schema::TYPE_PK,
            'request_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'service_type_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',

        ], $tableOptions);

    }

    public function down()
    {


        $this->dropTable('request_by_service_type');
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
