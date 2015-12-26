<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_084927_add_column_type_table_service_brand_cars extends Migration
{
    public function up()
    {
        $this->addColumn('service_brand_cars', 'type', 'integer   AFTER service_id ');
    }

    public function down()
    {
        $this->dropColumn('service_brand_cars', 'type');
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
