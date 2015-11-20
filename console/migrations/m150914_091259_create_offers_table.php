<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091259_create_offers_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('offers', [
            'id' => Schema::TYPE_PK,
            'service_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'img_url' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'short_description' => Schema::TYPE_TEXT . ' NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('offers_service_id_fk', 'offers', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('offers_service_id_fk', 'offers');

        $this->dropTable('offers');
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
