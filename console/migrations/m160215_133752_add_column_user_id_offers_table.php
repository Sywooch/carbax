<?php

use yii\db\Schema;
use yii\db\Migration;

class m160215_133752_add_column_user_id_offers_table extends Migration
{
    public function up()
    {
        $this->addColumn('offers', 'user_id', Schema::TYPE_INTEGER . '(11) ');
    }

    public function down()
    {
        $this->dropColumn('offers', 'user_id');
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
