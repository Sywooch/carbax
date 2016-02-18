<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_092246_create_table_category_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('category_news', [
            'id' => Schema::TYPE_PK,
            'parent_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'key' => Schema::TYPE_STRING. ' NOT NULL',
            'descr' => Schema::TYPE_TEXT. ' NOT NULL'

        ], $tableOptions);
        $this->insert('category_news', [
            'id' => 1,
            'parent_id' => 0,
            'name' => 'Новости партнеров',
            'key' => 'parentnews',
            'descr' => 'Описание'
        ]);

    }

    public function down()
    {
        $this->dropTable('category_news');
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
