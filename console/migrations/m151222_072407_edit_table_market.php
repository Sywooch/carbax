<?php

use yii\db\Schema;
use yii\db\Migration;

class m151222_072407_edit_table_market extends Migration
{
    public function up()
    {
         /*$this->dropColumn('market', 'man_id');
         $this->dropColumn('market', 'model_id');
         $this->dropColumn('market', 'type_id');*/
         $this->addColumn('market', 'id_auto_widget', 'integer   AFTER service_id ');
    }

    public function down()
    {
        $this->dropColumn('market', 'id_auto_widget');
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
