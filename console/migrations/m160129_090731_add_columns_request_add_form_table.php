<?php

use yii\db\Schema;
use yii\db\Migration;

class m160129_090731_add_columns_request_add_form_table extends Migration
{
    public function up()
    {
        $this->addColumn('request_add_form', 'template', Schema::TYPE_TEXT);
        $this->addColumn('request_add_form', 'class', Schema::TYPE_STRING . '(255) ');
        $this->addColumn('request_add_form', 'input_id', Schema::TYPE_STRING . '(255) ');
        $this->addColumn('request_add_form', 'placeholder', Schema::TYPE_STRING . '(255) ');
    }

    public function down()
    {
        $this->dropColumn('request_add_form', 'template');
        $this->dropColumn('request_add_form', 'class');
        $this->dropColumn('request_add_form', 'input_id');
        $this->dropColumn('request_add_form', 'placeholder');
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
