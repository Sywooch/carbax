<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_092257_create_table_info_disk extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('info_disk', [
            'id'                  => Schema::TYPE_PK,
            'type_disk'            => Schema::TYPE_INTEGER. '(4) NOT NULL',
            'type_disk_name'    => Schema::TYPE_STRING. '(255) NOT NULL',
            'diameter'         => Schema::TYPE_INTEGER. '(4) NOT NULL',
            'rim_width'         => Schema::TYPE_FLOAT. ' NOT NULL',
            'number_holes'       => Schema::TYPE_INTEGER. '(5) NOT NULL',
            'diameter_holest'     => Schema::TYPE_FLOAT. ' NOT NULL',
            'sortie'     => Schema::TYPE_FLOAT. '(5) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('info_disk');
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
