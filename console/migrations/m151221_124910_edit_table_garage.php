<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_124910_edit_table_garage extends Migration
{
    public function up()
    {
        /*$this->dropColumn('garage', 'man_id');
        $this->dropColumn('garage', 'model_id');
        $this->dropColumn('garage', 'type_id');*/
        $this->addColumn('garage', 'id_auto_widget', 'integer   AFTER title ');
    }

    public function down()
    {
        $this->dropColumn('garage', 'id_auto_widget');
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
