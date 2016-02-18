<?php

use yii\db\Schema;
use yii\db\Migration;

class m160118_071039_add_column_user_id_product_img_table extends Migration
{
    public function up()
    {
        $this->addColumn('product_img', 'user_id', 'integer  default 0 ');
    }

    public function down()
    {
        $this->dropColumn('product_img', 'user_id');
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
