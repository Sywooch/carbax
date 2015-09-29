<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_074749_create_request_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request', [
            'id' => Schema::TYPE_PK,
            'request_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('request_type_id_fk', 'request', 'request_type_id', 'request_type', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('request_type_id_fk', 'request');

        $this->dropTable('request');
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
