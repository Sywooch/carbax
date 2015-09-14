<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091328_create_comfort_zone_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('comfort_zone', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'img_ulr' => Schema::TYPE_STRING . '(255) ',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('comfort_zone');
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
