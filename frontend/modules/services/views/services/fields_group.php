<?php
foreach($groups as $group){
    $gr = \common\models\db\AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
    echo '<div class="singleContent__desc--works">';
    echo "<h3>$gr->name</h3>";

    echo '</div>';
}