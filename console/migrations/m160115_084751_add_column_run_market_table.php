<?php

use yii\db\Schema;
use yii\db\Migration;

class m160115_084751_add_column_run_market_table extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'run', 'integer  default 0 ');
    }

    public function down()
    {
        $this->dropColumn('market', 'run');
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
