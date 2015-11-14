<?php
use common\classes\Custom_function;
use frontend\modules\services\widgets\GetAllGroupById;
use frontend\widgets\AutoType;
use frontend\widgets\ComfortZone;

$this->title = "Редактирование";
?>

<div class="addContent">

    <form id="addForm" action="update_to_sql" method="post">
        <input type="hidden" name="service_type" value="<?= $_GET['service_type'] ?>">
        <input type="hidden" name="service_id" value="<?= $_GET['service_id'] ?>">

        <input type="text" name="title" class="addContent__title" value="<?=$name?>">
        <?php
        $count = count($address);
        $i = 1;
            foreach($address as $ad){
                if($i == $count){ ?>
                    <input type="text" name="address[]" class="addContent__adress" value="<?=$ad->address?>">
                    <span id="firstAddress"></span>
                    <a href="#nowhere" id="addAddress" class="addContent__adress-add">+</a>
                <?php
                }
                else{
                    ?>
                    <input type="text" name="address[]" class="addContent__adress" value="<?=$ad->address?>">
                    <a href="#nowhere" id="delAddress" class="addContent__adress-add">-</a>
                <?php
                }
                ?>

        <?php
                $i++;
            }
        ?>
        <div class="singleContent__map">
            <div id="map" style="width: 100%; height: 100%"></div>
        </div>
        <div class="singleContent__desc">
            <h3>Описание</h3>
            <textarea name="text" id="addContent__description"  class="addContent__description"><?=$description;?></textarea>

           <h3>Время работы</h3>

            <?php
            $custFunc = new Custom_function();
            $arrayDay = ['mo','tu','we','th','fr','sa','su'];
           // $i = 0;
            foreach ($arrayDay as $day) {
                if($day == $workHours[$day]->day){
                    ?>
                    <div class="singleContent__desc--line">
                        <div class="weekday">
                            <input type="checkbox" checked id="checkbox-<?=$day?>" name="openTime[<?=$day?>][day]" />
                            <label for="checkbox-<?=$day?>"><span></span><?=$custFunc->get_week_day($day)?></label>
                        </div>

                        <input id="datetimepicker_from-<?=$day?>" type="text" class="addContent__time" name="openTime[<?=$day?>][from]" value="<?=$workHours[$day]->hours_from?>"> -
                        <input id="datetimepicker_to-<?=$day?>" type="text" class="addContent__time" name="openTime[<?=$day?>][to]" value="<?=$workHours[$day]->hours_to?>">

                        <input type="checkbox" <?php if($workHours[$day]->{'24h'} == 1){echo 'checked';}?> id="round-the-clock-<?=$day?>" name="openTime[<?=$day?>][round]"/>
                        <label for="round-the-clock-<?=$day?>"><span></span>Круглосуточно</label>
                        <input type="hidden" value="<?=$day?>" name="openTime[<?=$day?>][weekDay]">
                    </div>
                <?php
                }
                else{
                   ?>
                    <div class="singleContent__desc--line">
                        <div class="weekday">
                            <input type="checkbox" id="checkbox-<?=$day?>" name="openTime[<?=$day?>][day]" />
                            <label for="checkbox-<?=$day?>"><span></span><?=$custFunc->get_week_day($day)?></label>
                        </div>

                        <input id="datetimepicker_from-<?=$day?>" type="text" class="addContent__time" name="openTime[<?=$day?>][from]"> -
                        <input id="datetimepicker_to-<?=$day?>" type="text" class="addContent__time" name="openTime[<?=$day?>][to]" >

                        <input type="checkbox"  id="round-the-clock-<?=$day?>" name="openTime[<?=$day?>][round]"/>
                        <label for="round-the-clock-<?=$day?>"><span></span>Круглосуточно</label>
                        <input type="hidden" value="<?=$day?>" name="openTime[<?=$day?>][weekDay]">
                    </div>
                <?php
                }
           }

            ?>

            <div class="singleContent__desc--contacts">
                <h3>Контакты</h3>
                <div class="singleContent__desc--line">
                    <label for="website">Web-сайт</label>
                    <input type="text" class="addContent__cont" name="website" value="<?=$email?>">
                </div>

                <?php
                $count = count($telephone);
                $k = 1;
                foreach ($telephone as $tel){
                    if($k == 1){
                        ?>
                        <div class="singleContent__desc--line">
                            <label for="phonenumber">Телефон</label>
                            <input type="text" class="addContent__cont" name="phoneNumber[]" value="<?=$tel->number?>">
                        </div>
                        <?php
                    }
                    if($k == $count){
                    ?>
                        <div class="singleContent__desc--line">
                            <label for="phonenumber_last"></label>
                            <input type="text" class="addContent__cont" name="phoneNumber[]" value="<?=$tel->number?>">
                            <span id="firstPhone"></span>
                            <a href="#nowhere" id="addContentPhone" class="addContent__cont-add">+</a>
                        </div>
                    <?php
                    }
                    if(($k>1) AND ($k != $count)){
                    ?>
                        <div class="singleContent__desc--line">
                            <label for="phonenumber_last"></label>
                            <input type="text" class="addContent__cont" name="phoneNumber[]" value="<?=$tel->number?>">
                            <a href="#nowhere" id="delPhone" class="addContent__cont-add">-</a>
                        </div>
                <?php
                    }
                    $k++;
                    }
                ?>
                <div class="singleContent__desc--line">
                    <label for="mailadress">Почта</label>
                    <input type="text" class="addContent__cont" name="mailadress" value="<?=$website?>">

                </div>
            </div>
            <div class="singleContent__desc--carbrands">
                <h3>Марки автомобилей</h3>
                <?php
                foreach ($brends as $br ) { ?>
                        <input type="checkbox" <?php if($br->id == $brendSelect[$br->id]->brand_cars_id){echo 'checked';}?> id="<?=$br->id?>" name="brands[]" value="<?=$br->id?>"/>
                        <label for="<?=$br->id?>"><span></span><?=$br->name?></label>
                <?php

                }
                ?>
            </div>

            <?= GetAllGroupById::widget(
                [
                    'groupId' => $_GET['service_type'],
                    'serviceId' => $serviceID,
                ]) ?>
            <?= ComfortZone::widget(['serviceId' => $serviceID])?>
            <?= AutoType::widget(['serviceId' => $serviceID])?>
            <div class="addContent--save">
                <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
            </div>
        </div>
    </form>
</div>