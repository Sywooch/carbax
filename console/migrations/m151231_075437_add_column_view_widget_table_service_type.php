<?php

use yii\db\Schema;
use yii\db\Migration;

class m151231_075437_add_column_view_widget_table_service_type extends Migration
{
    public function up()
    {
        $this->addColumn('service_type', 'view_widget_auto_type', 'integer   AFTER icon ');
    }

    public function down()
    {
        $this->dropColumn('service_type', 'view_widget_auto_type');
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
