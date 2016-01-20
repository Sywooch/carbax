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

        $this->createTable('transmission', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_INTEGER. '(11) NOT NULL',

        ], $tableOptions);

        $this->insert('comfort_zone', [
            'name' => 'Механика'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Автомат'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Робот'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Вариатор'
        ]);
    }

    public function down()
    {
        $this->dropTable('transmission');
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
