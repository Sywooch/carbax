<div class="singleContent__desc--works">
    <h3>Виды работ</h3>
<?php
foreach($groups as $group){
    $gr = \common\models\db\AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
    echo "<h3>$gr->name</h3>";
}
?>
</div>
