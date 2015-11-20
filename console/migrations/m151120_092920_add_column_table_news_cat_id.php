<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_092920_add_column_table_news_cat_id extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'cat_id', 'integer(10) AFTER user_id');
    }

    public function down()
    {
        $this->dropColumn('news', 'cat_id');
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
