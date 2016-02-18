<?php

use yii\db\Schema;
use yii\db\Migration;

class m151201_092633_add_views_column_market_table extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'views', 'integer(10) NOT NULL DEFAULT 0 AFTER prod_type ');
    }

    public function down()
    {
        $this->dropColumn('market', 'views');
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
