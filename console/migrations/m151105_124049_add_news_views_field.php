<?php

use yii\db\Schema;
use yii\db\Migration;

class m151105_124049_add_news_views_field extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'views', 'integer(10) DEFAULT 0 AFTER short_description ');
    }

    public function down()
    {
        $this->dropColumn('news', 'views');
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
