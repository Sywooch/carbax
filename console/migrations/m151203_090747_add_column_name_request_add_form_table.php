<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_090747_add_column_name_request_add_form_table extends Migration
{
    public function up()
    {
       // $this->dropColumn('request_add_form', 'request_type_id');
        $this->addColumn('request_add_form', 'name', 'string NOT NULL  AFTER id ');
    }

    public function down()
    {
        $this->dropColumn('request_add_form', 'name');
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
