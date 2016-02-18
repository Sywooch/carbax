<?php

use yii\db\Schema;
use yii\db\Migration;

class m160128_091348_add_column_view_mark_auto_service_type extends Migration
{
    public function up()
    {
        $this->addColumn('service_type', 'view_mark_auto', 'integer AFTER `view_widget_auto_type` ');
    }

    public function down()
    {
        $this->dropColumn('service_type', 'view_mark_auto');
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
