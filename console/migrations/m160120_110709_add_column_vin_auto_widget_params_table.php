<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_110709_add_column_vin_auto_widget_params_table extends Migration
{
    public function up()
    {
        $this->addColumn('auto_widget_params', 'vin', 'string  default 0 AFTER `drive` ');
    }

    public function down()
    {
        $this->dropColumn('auto_widget_params', 'vin');
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
