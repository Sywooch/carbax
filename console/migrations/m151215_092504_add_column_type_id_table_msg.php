<?php

use yii\db\Schema;
use yii\db\Migration;

class m151215_092504_add_column_type_id_table_msg extends Migration
{
    public function up()
    {
        $this->addColumn('msg', 'type_id', 'integer   AFTER readed ');
    }

    public function down()
    {
        $this->dropColumn('msg', 'type_id');
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
