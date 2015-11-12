<?php
use common\models\db\AddFieldsGroup;
?>
<div class="singleContent__desc--carbrands">
<?php
    foreach($group as $gr){
        $nameTypeJob = AddFieldsGroup::find()->where(['id'=>$gr])->one();
        ?>
        <div class="nameTypeJob"><h3><?=$nameTypeJob->name;?></h3></div>
<?php
        foreach($type as $t){
            ?>
            <div class="typeJob"><?=$t->name;?></div>
        <?php
        }
    }
?>
</div>