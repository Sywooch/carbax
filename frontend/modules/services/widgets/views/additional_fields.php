<?php
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
?>
<div class="singleContent__desc--carbrands">
    <?php
    //Debug::prn($type);
        foreach($group as $gr){
            $nameTypeJob = AddFieldsGroup::find()->where(['id'=>$gr])->one();
            ?>
            <div class="nameTypeJob"><h3><?=$nameTypeJob->name;?></h3></div>
    <?php
           // Debug::prn($type);
            foreach($type as $t){
                ?>
                <?php if($t->group_id == $gr):?>
                    <?php if(!empty($t->template)):?>
                        <?= $t->template; ?>
                    <?php else: ?>
                        <div class="typeJob"><?=$t->name;?></div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php
            }
        }
    ?>
</div>