<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_064919_add_column_moto_type_auto_widget_table extends Migration
{
    public function up()
    {
        $this->addColumn('auto_widget', 'moto_type', 'integer  default 0 AFTER submodel_name ');
    }

    public function down()
    {
        $this->dropColumn('auto_widget', 'moto_type');
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
