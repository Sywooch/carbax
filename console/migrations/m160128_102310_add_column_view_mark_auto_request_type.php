<?php

use yii\db\Schema;
use yii\db\Migration;

class m160128_102310_add_column_view_mark_auto_request_type extends Migration
{
    public function up()
    {
        $this->addColumn('request_type', 'view_mark_auto', 'integer AFTER `view_widget_auto` ');
    }

    public function down()
    {
        $this->dropColumn('request_type', 'view_mark_auto');
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
