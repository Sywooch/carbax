<?php

use yii\db\Schema;
use yii\db\Migration;

class m151118_083042_create_table_category_auto extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('categories_auto', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL'
        ], $tableOptions);

        $this->insert('categories_auto', [
            'name' => 'Легковой автомобиль'
        ]);

        $this->insert('categories_auto', [
            'name' => 'Грузовой автомобиль'
        ]);

        $this->insert('categories_auto', [
            'name' => 'Мототехника'
        ]);
    }

    public function down()
    {
        $this->dropTable('categories_auto');
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
