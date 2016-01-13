<?php
use frontend\widgets\SelectMultiplayAuto;
use frontend\widgets\SelectMultiplayCargoAuto;
use frontend\widgets\SelectMultiplayMoto;

?>
<div class="singleContent__worksWith">
    <h3>Работаем</h3>
    <?php


    foreach($auto as $a):
    ?>
    <div class="singleContent__worksWith-block">

        <h4><?=$a->name;?></h4>
        <img src="<?=$a->img_url;?>" alt="">
        <input type="checkbox" class="typeAuto" <?php if($a->id == $autoSelect[$a->id]->auto_type_id){echo 'checked';};?> id="gruz_<?=$a->id;?>" value="<?=$a->id;?>" name="workWith[]" />
        <label for="gruz_<?=$a->id;?>"><span></span></label>
    </div>
        <?php endforeach; ?>

    <?php

    foreach ($autoSelect as $at) {
        switch($at->auto_type_id){
            case 1: $brands = SelectMultiplayAuto::widget(['serviceId' =>$serviceId]); break;
            case 2: $cargoBrands = SelectMultiplayCargoAuto::widget(['serviceId' =>$serviceId]); break;
            case 3: $moto = SelectMultiplayMoto::widget(['serviceId' =>$serviceId]); break;
        }
    }



    ?>
    <div class="selectBrand">
        <div class="selectCar"><?= $brands; ?></div>
        <div class="selectCargoCar"><?= $cargoBrands; ?></div>
        <div class="selectMoto"><?= $moto; ?></div>
    </div>
</div>
