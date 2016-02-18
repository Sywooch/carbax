<?php

use yii\db\Schema;
use yii\db\Migration;

class m151121_100220_create_table_product_img extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('product_img', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'img' => Schema::TYPE_STRING. ' NOT NULL',

        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('product_img');
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
