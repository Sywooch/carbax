<?php

use yii\db\Schema;
use yii\db\Migration;

class m151111_105623_add_offers_fields extends Migration
{
    public function up()
    {
        $this->addColumn('offers', 'title', 'varchar(255) AFTER id');
        $this->addColumn('offers', 'new_price', 'integer(10) AFTER short_description ');
        $this->addColumn('offers', 'old_price', 'integer(10) AFTER new_price ');
        $this->addColumn('offers', 'discount', 'varchar(255) AFTER old_price');
        $this->addColumn('offers', 'region_id', 'integer(10) AFTER discount');
    }

    public function down()
    {
        $this->dropColumn('offers', 'title');
        $this->dropColumn('offers', 'new_price');
        $this->dropColumn('offers', 'old_price');
        $this->dropColumn('offers', 'discount');
        $this->dropColumn('offers', 'region_id');
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
