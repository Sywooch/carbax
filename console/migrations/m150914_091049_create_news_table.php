<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_091049_create_news_table extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'img_url' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'short_description' => Schema::TYPE_TEXT . ' NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('news');
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
