<?php

use yii\db\Schema;
use yii\db\Migration;

class m151202_080926_add_columns_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'telephon', 'string NOT NULL  AFTER flags ');
        $this->addColumn('user', 'skype', 'string NOT NULL  AFTER telephon ');
        $this->addColumn('user', 'icq', 'string NOT NULL  AFTER skype ');
        $this->addColumn('user', 'link_vk', 'string NOT NULL  AFTER icq ');
        $this->addColumn('user', 'name', 'string NOT NULL  AFTER link_vk ');
        $this->addColumn('user', 'last_name', 'string NOT NULL  AFTER name ');
        $this->addColumn('user', 'avatar', 'string NOT NULL  AFTER last_name ');
    }

    public function down()
    {
        $this->dropColumn('user', 'telephon');
        $this->dropColumn('user', 'skype');
        $this->dropColumn('user', 'icq');
        $this->dropColumn('user', 'link_vk');
        $this->dropColumn('user', 'name');
        $this->dropColumn('user', 'last_name');
        $this->dropColumn('user', 'avatar');

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
