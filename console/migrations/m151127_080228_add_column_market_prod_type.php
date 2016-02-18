<?php

use yii\db\Schema;
use yii\db\Migration;

class m151127_080228_add_column_market_prod_type extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'prod_type', 'integer(2) AFTER category_id');
    }

    public function down()
    {
        $this->dropColumn('market', 'prod_type');
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
