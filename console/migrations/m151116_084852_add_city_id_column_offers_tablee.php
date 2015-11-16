<?php

use yii\db\Schema;
use yii\db\Migration;

class m151116_084852_add_city_id_column_offers_tablee extends Migration
{
    public function up()
    {
        $this->addColumn('offers', 'city_id', 'integer(10) AFTER region_id');
    }

    public function down()
    {
        $this->dropColumn('offers', 'city_id');
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
