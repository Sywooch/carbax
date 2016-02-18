<?php

use yii\db\Schema;
use yii\db\Migration;

class m151110_104852_insert_auto_type_table extends Migration
{
    public function up()
    {
        $this->insert('auto_type', [
            'name' => 'С грузовыми авто',
            'img_url' => '/media/img/gruz.png',
        ]);
        $this->insert('auto_type', [
            'name' => 'С легковыми авто',
            'img_url' => '/media/img/sedan.png',
        ]);
        $this->insert('auto_type', [
            'name' => 'С мототехникой',
            'img_url' => '/media/img/velo.png',
        ]);
    }

    public function down()
    {
        $this->delete('auto_type');
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
