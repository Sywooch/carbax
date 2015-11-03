<?php

use yii\db\Schema;
use yii\db\Migration;

class m151102_064139_make_news_title_unique extends Migration
{
    public function up()
    {
        $this->dropColumn('news', 'title');
        $this->addColumn('news', 'title', 'varchar(255) UNIQUE AFTER user_id');
    }

    public function down()
    {
        $this->dropColumn('news', 'title');
        $this->addColumn('news', 'title', 'varchar(255) AFTER user_id');
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
