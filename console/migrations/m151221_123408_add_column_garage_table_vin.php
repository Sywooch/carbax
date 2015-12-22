<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_123408_add_column_garage_table_vin extends Migration
{
    public function up()
    {
        $this->addColumn('garage', 'vin', 'string   AFTER title ');
    }

    public function down()
    {
        $this->dropColumn('garage', 'vin');
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
