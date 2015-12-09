<?php

use yii\db\Schema;
use yii\db\Migration;

class m151204_071353_add_column_view_widget_auto_request_type extends Migration
{
    public function up()
    {
        $this->addColumn('request_type', 'view_widget_auto', 'string NOT NULL  AFTER name ');
    }

    public function down()
    {
        $this->dropColumn('request_type', 'view_widget_auto');
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
