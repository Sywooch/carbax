<?php

use yii\db\Schema;
use yii\db\Migration;

class m151204_095553_remove_association_service_brand_cars_brand_cars_id_fk extends Migration
{
    public function up()
    {
        //$this->dropForeignKey('service_brand_cars_brand_cars_id_fk', 'service_brand_cars');
    }

    public function down()
    {

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
