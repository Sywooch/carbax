<?php

use yii\db\Schema;
use yii\db\Migration;

class m160127_064607_add_column_published_market_table extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'published', 'integer  default 0 AFTER `run` ');
    }

    public function down()
    {
        $this->dropColumn('market', 'published');
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
