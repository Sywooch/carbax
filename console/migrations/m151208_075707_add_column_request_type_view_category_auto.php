<?php

use yii\db\Schema;
use yii\db\Migration;

class m151208_075707_add_column_request_type_view_category_auto extends Migration
{
    public function up()
    {
        $this->addColumn('request_type', 'view_category_auto', 'string NOT NULL  AFTER name ');
    }

    public function down()
    {
        $this->dropColumn('request_type', 'view_category_auto');
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
