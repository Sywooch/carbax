<?php

use yii\db\Schema;
use yii\db\Migration;

class m151229_122531_add_column_news_table_market extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'new', 'integer   AFTER views ');
    }

    public function down()
    {
        $this->dropColumn('market', 'news');
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
