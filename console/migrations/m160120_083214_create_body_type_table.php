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

        $this->createTable('body_type', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_INTEGER. '(11) NOT NULL',

        ], $tableOptions);

        $this->insert('comfort_zone', [
            'name' => 'Седан'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Хетчбэк'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Универсал'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Внедорожник'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Кабриолет'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Кроссовер'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Купе'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Лимузин'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Минивэн'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Пикап'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Фургон'
        ]);

        $this->insert('comfort_zone', [
            'name' => 'Микроавтобус'
        ]);
    }

    public function down()
    {
        $this->dropTable('body_type');
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
