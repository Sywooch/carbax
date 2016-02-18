<?php

use yii\db\Schema;
use yii\db\Migration;

class m160130_111527_create_changing_table_info_disk extends Migration
{
    public function up()
    {
        $this->alterColumn('info_disk', 'type_disk', 'integer(4) default NULL');
        $this->alterColumn('info_disk', 'type_disk_name', 'string(255) default NULL');
        $this->alterColumn('info_disk', 'diameter', 'integer(4) default NULL');
        $this->alterColumn('info_disk', 'rim_width', 'float default NULL');
        $this->alterColumn('info_disk', 'number_holes', 'integer(5) default NULL');
        $this->alterColumn('info_disk', 'diameter_holest', 'float default NULL');
        $this->alterColumn('info_disk', 'sortie', 'float default NULL');
    }

    public function down()
    {
        echo "m160130_111527_create_changing_table_info_disk cannot be reverted.\n";

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
