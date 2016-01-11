<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_133124_create_table_favorites extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('favorites', [
            'id'            => Schema::TYPE_PK,
            'market_id'     => Schema::TYPE_INTEGER. '(10) default NULL',
            'service_id'    => Schema::TYPE_INTEGER. '(10) default NULL',
            'user_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('favorites');
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
