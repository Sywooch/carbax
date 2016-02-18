<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_084814_create_table_brend_year extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('brend_year', [
            'id'            => Schema::TYPE_PK,
            'id_brand'      => Schema::TYPE_INTEGER. ' NOT NULL',
            'name'          => Schema::TYPE_STRING. '(255) NOT NULL',
            'min_y'         => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'max_y'         => Schema::TYPE_INTEGER. '(10) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('brend_year');
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
