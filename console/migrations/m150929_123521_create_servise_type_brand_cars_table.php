<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_123521_create_servise_type_brand_cars_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('service_brand_cars', [
            'id'           => Schema::TYPE_PK,
            'service_id'   => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'brand_cars_id' => Schema::TYPE_INTEGER . '(10) NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('brand_cars_service_id_fk', 'service_brand_cars', 'service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('service_brand_cars_brand_cars_id_fk', 'service_brand_cars', 'brand_cars_id', 'brand_cars', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {

        $this->dropForeignKey('brand_cars_service_id_fk', 'service_brand_cars');
        $this->dropForeignKey('service_brand_cars_brand_cars_id_fk', 'service_brand_cars');

        $this->dropTable('service_brand_cars');
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
