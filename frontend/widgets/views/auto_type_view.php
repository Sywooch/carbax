<?php

use common\models\db\AutoComBrands;
use common\models\db\BcbBrands;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\ServiceBrandCars;

foreach($autoType as $at):?>
    <div class="singleContent__worksWith-block">

        <h4><?=$at->name?></h4>
        <img src="<?=$at->img_url;?>" alt="">
    </div>
<?php endforeach;?>

<div class="selectBrand">
<?php foreach($autoType as $at):?>

        <?php
        $brandsId = ServiceBrandCars::find()->where(['service_id'=>$_GET['service_id'],'type'=>$at->id])->all();
            if($at->id == 1){

                ?>

                    <div class="selectCar">
                    <h3>Марки легковых машин с которыми вы работаете</h3>
                        <?php foreach($brandsId as $brand):?>
                        <?= BcbBrands::find()->where(['id'=>$brand->brand_cars_id])->one()->name;?>
                        <?php endforeach; ?>
                    </div>


                <?php
            }
        ?>
        <?php
            if($at->id == 2){
                ?>
                 <div class="selectCargoCar">
                 <h3>Марки грузовых машин с которыми вы работаете</h3>
                        <?php foreach($brandsId as $brand):?>

                        <span><?= AutoComBrands::find()->where(['id'=>$brand->brand_cars_id])->one()->name;?></span>
                        <?php endforeach; ?>
                 </div>

                <?php
            }
        ?>
        <?php
            if($at->id == 3){
                ?>
                 <div class="selectMoto">
                 <h3>Марки мототехники с которыми вы работаете</h3>
                        <?php foreach($brandsId as $brand):?>

                        <?= CarMark::find()->where(['id_car_mark'=>$brand->brand_cars_id])->one()->name;?>
                        <?php endforeach; ?>
                </div>
                <?php
            }
        ?>

<?php endforeach;?>
</div>

