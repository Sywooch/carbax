<?php

use yii\db\Schema;
use yii\db\Migration;

class m151215_085755_add_column_cover extends Migration
{
    public function up()
    {
        $this->addColumn('product_img', 'cover', 'integer(1) AFTER img');
    }

    public function down()
    {
        $this->dropColumn('product_img', 'cover');
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
