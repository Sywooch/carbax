<?php

use yii\db\Schema;
use yii\db\Migration;

class m160215_070912_add_column_photo_auto_widget extends Migration
{
    public function up()
    {
        $this->addColumn('auto_widget', 'photo', Schema::TYPE_STRING . '(255) ');
    }

    public function down()
    {
        $this->dropColumn('auto_widget', 'photo');
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
