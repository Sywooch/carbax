<?php

use yii\db\Schema;
use yii\db\Migration;

class m151027_081313_add_field_add_fields_group extends Migration
{
    public function up()
    {
        $this->addColumn('add_fields_group', 'label', Schema::TYPE_STRING.'(255) AFTER  name');
    }

    public function down()
    {
        $this->dropColumn('add_fields_group', 'label');
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
