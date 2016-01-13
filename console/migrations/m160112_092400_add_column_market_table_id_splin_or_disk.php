<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_092400_add_column_market_table_id_splin_or_disk extends Migration
{
    public function up()
    {
        $this->addColumn('market', 'id_info_disk', 'integer  default 0 AFTER id_auto_widget ');
        $this->addColumn('market', 'id_info_splint', 'integer default 0 AFTER id_info_disk  ');
    }

    public function down()
    {
        $this->dropColumn('market', 'id_info_disk');
        $this->dropColumn('market', 'id_info_splint');
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
