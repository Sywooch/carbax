<?php

use yii\db\Schema;
use yii\db\Migration;

class m151222_092745_add_column_request_table extends Migration
{
    public function up()
    {
        $this->addColumn('request', 'id_auto_widget', 'integer   AFTER user_id ');
    }

    public function down()
    {
        $this->dropColumn('request', 'id_auto_widget');
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
