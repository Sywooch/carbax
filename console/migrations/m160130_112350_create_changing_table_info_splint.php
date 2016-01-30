<?php

use yii\db\Schema;
use yii\db\Migration;

class m160130_112350_create_changing_table_info_splint extends Migration
{
    public function up()
    {
        $this->alterColumn('info_splint', 'diameter', 'integer(4) default NULL');
        $this->alterColumn('info_splint', 'seasonality', 'integer(4) default NULL');
        $this->alterColumn('info_splint', 'seasonality_name', 'string(255) default NULL');
        $this->alterColumn('info_splint', 'section_width', 'integer(5) default NULL');
        $this->alterColumn('info_splint', 'section_height', 'integer(5) default NULL');
    }

    public function down()
    {
        echo "m160130_112350_create_changing_table_info_splint cannot be reverted.\n";

        return false;
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
