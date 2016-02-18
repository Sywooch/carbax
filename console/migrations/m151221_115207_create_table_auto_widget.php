<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_115207_create_table_auto_widget extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('auto_widget', [
            'id'            => Schema::TYPE_PK,
            'auto_type'     => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'year'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'brand_id'      => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'brand_name'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'model_id'      => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'model_name'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'type_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'type_name'     => Schema::TYPE_STRING. '(255) NOT NULL',
            'submodel_id'   => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'submodel_name' => Schema::TYPE_STRING. '(255) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('auto_widget');
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
