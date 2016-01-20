<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_083247_create_transmission_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('awp_transmission', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);

        $this->insert('awp_transmission', [
            'name' => 'Механика'
        ]);

        $this->insert('awp_transmission', [
            'name' => 'Автомат'
        ]);

        $this->insert('awp_transmission', [
            'name' => 'Робот'
        ]);

        $this->insert('awp_transmission', [
            'name' => 'Вариатор'
        ]);
    }

    public function down()
    {
        $this->dropTable('awp_transmission');
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
