<?php

use yii\db\Schema;
use yii\db\Migration;

class m151117_062528_create_table_market extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('market', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'service_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'man_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'type_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'model_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'region_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'city_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'descr' => Schema::TYPE_TEXT. ' NOT NULL',
            'price' => Schema::TYPE_STRING. ' NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER. ' NOT NULL',
            'id_auto_type' => Schema::TYPE_INTEGER. ' NOT NULL'

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('market');
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
