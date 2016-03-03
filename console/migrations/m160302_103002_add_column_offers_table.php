<?php

use yii\db\Schema;
use yii\db\Migration;

class m160302_103002_add_column_offers_table extends Migration
{
    public function up()
    {
        $this->addColumn('offers', 'address_selected', Schema::TYPE_TEXT);
        $this->addColumn('offers', 'dt_start', Schema::TYPE_DATE);
        $this->addColumn('offers', 'dt_end', Schema::TYPE_DATE);
        $this->addColumn('offers', 'status', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('offers', 'address_selected');
        $this->dropColumn('offers', 'dt_start');
        $this->dropColumn('offers', 'dt_end');
        $this->dropColumn('offers', 'status');
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
