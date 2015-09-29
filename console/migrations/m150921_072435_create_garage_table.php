<?php

use yii\db\Schema;
use yii\db\Migration;

class m150921_072435_create_garage_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('garage', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'type_car' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'brand' => Schema::TYPE_STRING . '(255) NOT NULL',
            'models' => Schema::TYPE_STRING . '(255) NOT NULL',
            'year' => Schema::TYPE_STRING . '(255) NOT NULL',
            'dvs' => Schema::TYPE_STRING . '(100) NOT NULL',
            'kpp' => Schema::TYPE_STRING . '(100) NOT NULL',
            'dt_add' => Schema::TYPE_STRING . '(100) NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('garage');
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
