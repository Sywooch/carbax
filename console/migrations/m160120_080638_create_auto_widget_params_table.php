<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_080638_create_auto_widget_params_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('auto_widget_params', [
            'id'                    => Schema::TYPE_PK,
            'id_auto_widget'        => Schema::TYPE_INTEGER. '(11) NOT NULL',
            'body_type'             => Schema::TYPE_INTEGER. '(11) default NULL',
            'run'                   => Schema::TYPE_INTEGER. '(11) default NULL',
            'transmission'          => Schema::TYPE_INTEGER. '(11) default NULL',
            'type_motor'            => Schema::TYPE_INTEGER. '(11) default NULL',
            'size_motor'            => Schema::TYPE_FLOAT.   ' default NULL',
            'drive'                 => Schema::TYPE_INTEGER. '(11) default NULL'
        ], $tableOptions);

        $this->addForeignKey('auto_widget_params_by_auto_widget_fk', 'auto_widget_params', 'id_auto_widget', 'auto_widget', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('auto_widget_params_by_auto_widget_fk', 'auto_widget_params');
        $this->dropTable('auto_widget_params');
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
