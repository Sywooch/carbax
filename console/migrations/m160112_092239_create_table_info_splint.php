<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_092239_create_table_info_splint extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('info_splint', [
            'id'                  => Schema::TYPE_PK,
            'diameter'            => Schema::TYPE_INTEGER. '(4) NOT NULL',
            'seasonality'         => Schema::TYPE_INTEGER. '(4) NOT NULL',
            'seasonality_name'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'section_width'       => Schema::TYPE_INTEGER. '(5) NOT NULL',
            'section_height'     => Schema::TYPE_INTEGER. '(5) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('info_splint');
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
