<?php

use yii\db\Schema;
use yii\db\Migration;

class m160113_084606_add_column_region_and_city_ids_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'region_id', 'integer  default 0 ');
        $this->addColumn('user', 'city_id', 'integer  default 0 ');
    }

    public function down()
    {
        $this->dropColumn('user', 'region_id');
        $this->dropColumn('user', 'city_id');
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
