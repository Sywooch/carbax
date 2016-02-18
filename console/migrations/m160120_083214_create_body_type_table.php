<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_083214_create_body_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('awp_body_type', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);

        $this->insert('awp_body_type', [
            'name' => 'Седан'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Хетчбэк'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Универсал'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Внедорожник'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Кабриолет'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Кроссовер'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Купе'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Лимузин'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Минивэн'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Пикап'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Фургон'
        ]);

        $this->insert('awp_body_type', [
            'name' => 'Микроавтобус'
        ]);
    }

    public function down()
    {
        $this->dropTable('awp_body_type');
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
