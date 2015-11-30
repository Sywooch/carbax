<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_085056_add_column_address extends Migration
{
    public function up()
    {
        $this->addColumn('address', 'region_id', 'integer(10) AFTER geo');
        $this->addColumn('address', 'city_id', 'integer(10) AFTER region_id');
    }

    public function down()
    {
        $this->dropColumn('address', 'region_id');
        $this->dropColumn('address', 'city_id');
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
