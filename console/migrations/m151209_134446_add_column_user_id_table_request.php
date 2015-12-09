<?php

use yii\db\Schema;
use yii\db\Migration;

class m151209_134446_add_column_user_id_table_request extends Migration
{
    public function up()
    {
        $this->addColumn('request', 'user_id', 'integer NOT NULL  AFTER request_type_id ');
    }

    public function down()
    {
        $this->dropColumn('request', 'user_id');
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
