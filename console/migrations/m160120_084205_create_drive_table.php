<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_084205_create_drive_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('drive', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_INTEGER. '(11) NOT NULL',

        ], $tableOptions);

        $this->insert('transmission', [
            'name' => 'Передний'
        ]);

        $this->insert('transmission', [
            'name' => 'Задний'
        ]);

        $this->insert('transmission', [
            'name' => 'Полный'
        ]);
    }

    public function down()
    {
        $this->dropTable('drive');
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
