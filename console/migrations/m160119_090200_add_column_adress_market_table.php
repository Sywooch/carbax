<?php

use yii\db\Schema;
use yii\db\Migration;

class m160119_090200_add_column_adress_market_table extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'address', 'string  default 0 AFTER `city_id` ');
    }

    public function down()
    {
        $this->dropColumn('market', 'address');
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
