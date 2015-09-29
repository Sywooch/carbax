<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_073521_add_fields_services extends Migration
{
    public function up()
    {
        //��������� 2 �������
        $this->addColumn('services', 'website', Schema::TYPE_STRING.'(255) AFTER  description');
        $this->addColumn('services', 'photo', Schema::TYPE_STRING.'(255) AFTER  website');
    }

    public function down()
    {
        //������� 2 �������
        $this->dropColumn('services','photo');
        $this->dropColumn('services','website');
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
