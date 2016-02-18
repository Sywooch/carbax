<?php

use yii\db\Schema;
use yii\db\Migration;

class m160203_083954_add_column_service_type_id_offers_table extends Migration
{
    public function up()
    {
        $this->addColumn('offers', 'service_type_id', Schema::TYPE_INTEGER . '(11) ');
    }

    public function down()
    {
        $this->dropColumn('offers', 'service_type_id');
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
