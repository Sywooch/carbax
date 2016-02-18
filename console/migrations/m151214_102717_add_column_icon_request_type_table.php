<?php

use yii\db\Schema;
use yii\db\Migration;

class m151214_102717_add_column_icon_request_type_table extends Migration
{
    public function up()
    {
        $this->addColumn('request_type', 'icon', 'string NOT NULL  AFTER name ');
    }

    public function down()
    {
        $this->dropColumn('request_type', 'icon');
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
