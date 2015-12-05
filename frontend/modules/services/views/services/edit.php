<?php
use common\classes\Custom_function;
use frontend\modules\services\widgets\GetAllGroupById;
use frontend\widgets\AutoType;
use frontend\widgets\ComfortZone;
use frontend\widgets\SelectAddress;
use frontend\widgets\SelectMultiplayAuto;

$this->title = "Редактирование";
$this->params['breadcrumbs'][] = ['label' => 'Мои сервисы', 'url' => ['select_service']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/bootstrap.min.css');
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
                    <input type="text" id="address_<?=$i?>" name="address[<?=$i?>][title]" class="addContent__adress addressEvent" value="<?=$ad->address?>">
                    <span id="firstAddress"></span>
                    <a href="#nowhere" id="addAddress" class="addContent__adress-add">+</a>
                <?php
                }
                else{
                    ?>
                    <input type="text" id="address_<?=$i?>" name="address[<?=$i?>][title]" class="addContent__adress addressEvent" value="<?=$ad->address?>">
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
                <?= SelectMultiplayAuto::widget(['serviceId'=>$serviceID]);?>
                <!--<h3>Марки автомобилей</h3>
                <?php
/*                foreach ($brends as $br ) { */?>
                        <input type="checkbox" <?php /*if($br->id == $brendSelect[$br->id]->brand_cars_id){echo 'checked';}*/?> id="<?/*=$br->id*/?>" name="brands[]" value="<?/*=$br->id*/?>"/>
                        <label for="<?/*=$br->id*/?>"><span></span><?/*=$br->name*/?></label>
                --><?php
/*
                }
                */?>
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
        <span id="addressCount" count="<?=$count?>" active-id="">
            <?php $i = 1; ?>
            <?php foreach($address as $ad): ?>
                <input type="hidden" id="address_<?=$i?>_region" name="address[<?=$i?>][regionId]" value="<?=$ad['region_id']?>">
                <input type="hidden" id="address_<?=$i?>_city" name="address[<?=$i?>][cityId]" value="<?=$ad['city_id']?>">
                <?php $i++; ?>
            <?php endforeach; ?>
        </span>
    </form>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавте адрес</h4>
            </div>
            <div class="modal-body">
                <?= SelectAddress::widget() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button id="addAddressTo" data-dismiss="modal" type="button" class="btn btn-primary">Добавить</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->