<?php

use yii\db\Schema;
use yii\db\Migration;

class m151002_060432_add_fields_service_type extends Migration
{
    public function up()
    {
        $this->addColumn('service_type', 'icon', Schema::TYPE_STRING.'(255) AFTER  name');
    }

    public function down()
    {
        $this->dropColumn('service_type', 'icon');
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
