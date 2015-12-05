<?php

use common\classes\Custom_function;
use common\models\db\AddFieldsGroup;
use common\models\db\TofManufacturers;
use frontend\modules\services\widgets\PrintAdditionalFieldsByServisId;

$this->title = $serviceName;
$this->registerCssFile('/css/bootstrap_btn.min.css');

    $this->params['breadcrumbs'][] = ['label' => 'Мои сервисы', 'url' => ['select_service']];
    $this->params['breadcrumbs'][] = $this->title;

?>

<section class="main-container">
            <h3>Название автосервиса:</h3><?=$serviceName;?>

            <div class="singleContent__desc">
                <h3>Описание</h3>
                    <div>
                        <?=$description;?>
                    </div>
                <h3>Адрес</h3>
                <div class="serviceAddress">
                    <?php
                        foreach($address as $ad){
                            ?>
                            <div class="address"><?=$ad->address;?></div>
                        <?php
                        }
                    ?>
                </div>
                <h3>Время работы</h3>
                <div>
                    <?php
                        $custFunc = new Custom_function();
                        foreach($workHours as $wh):

                    ?>
                        <div>
                            <span><?=$custFunc->get_week_day($wh->day)?></span> - <?php
                            if($wh->{'24h'} == 1){ ?>
                                Круглосуточно
                            <?php
                            }
                            else{
                                ?>
                                С <?=$wh->hours_from?> ДО <?=$wh->hours_to?>
                            <?php
                            }?>
                        </div>
                    <?php
                        endforeach;
                    ?>
                </div>
                <div class="singleContent__desc--contacts">
                    <h3>Контакты</h3>
                    <div class="singleContent__desc--line">
                        <label for="website">Web-сайт</label>
                        <?=$website?>
                    </div>
                    <div class="singleContent__desc--line">
                        <label for="phonenumber">Телефоны</label>
                        <?php
                            foreach($phone as $phon):
                        ?>
                                <div><?=$phon->number;?></div>
                        <?php
                            endforeach;
                        ?>

                    </div>
                    <div class="singleContent__desc--line">
                        <label for="mailadress">Почта</label>
                       <span><?=$email;?></span>

                    </div>
                </div>


                 <?php
                   echo PrintAdditionalFieldsByServisId::widget(['servicId'=>$serviceID])
                 ?>
                <div class="singleContent__desc--carbrands">
                    <h3>Марки автомобилей</h3>
                    <?php foreach($carBrands as $cb):?>
                        <div class="carBrands"><?= TofManufacturers::find()->where(['mfa_id'=>$cb->brand_cars_id])->one()->mfa_brand; ?></div>
                    <?php endforeach;?>
                </div>

                <div class="singleContent__services">
                    <div class="singleContent__services-comfort">
                        <h3>Зоны комфорта</h3>
                        <?php foreach($comfortZone as $cz):?>
                            <div class="comfortZone">
                                <img src="<?=$cz->img_ulr;?>"/><span><?=$cz->name;?></span>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>
                <div class="singleContent__worksWith">
                    <h3>Работаем</h3>
                    <?php foreach($autoType as $at):?>
                        <div class="singleContent__worksWith-block">

                            <h4><?=$at->name?></h4>
                            <img src="<?=$at->img_url;?>" alt="">
                        </div>
                    <?php endforeach;?>
                    </div>
            </div>


</section>