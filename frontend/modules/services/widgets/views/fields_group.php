<?php
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\AdditionalFields;
?>
    <?php
    foreach($groups as $group):
    $gr = AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
    ?>
    <div class="singleContent__desc--works">
    <h3><?= $gr->name ?></h3>
    <?php
        $services = AdditionalFields::find()->where(['group_id' => $gr->id])->all();
        foreach($services as $s):
    ?>
        <input type="checkbox" id="<?=$gr->id."_".$s->id?>" <?php if($s->id == $select[$s->id]->add_fields_id){echo 'checked';}?> name="<?= $gr->label ?>[]" value="<?= $s->id ?>"/>
        <label for="<?=$gr->id."_".$s->id?>"><span></span><?= $s->name ?></label>
        <?php
        endforeach;
        ?>
    </div>
    <?php
    endforeach;
    ?>