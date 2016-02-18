<?php

use yii\db\Schema;
use yii\db\Migration;

class m151102_085203_news_image_url_null extends Migration
{
    public function up()
    {
        $this->dropColumn('news', 'img_url');
        $this->addColumn('news', 'img_url', 'varchar(255) AFTER title');
    }

    public function down()
    {
        $this->dropColumn('news', 'img_url');
        $this->addColumn('news', 'img_url', 'varchar(255) NOT NULL AFTER title');
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
