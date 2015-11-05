<?php
use frontend\modules\services\widgets\GetAllGroupById;

$this->title = "Добавить сервис";
?>

<div class="addContent">
    <form id="addForm" action="add_to_sql" method="post">
        <input type="text" name="title" class="addContent__title" placeholder="Название автосервиса">
        <input type="text" name="address[]" class="addContent__adress" placeholder="Адрес автосервиса">

        <span id="firstAddress"></span>
        <a href="#nowhere" id="addAddress" class="addContent__adress-add">+</a>
        <!--<div class="singleContent__map">
            <div id="map_canvas" style="width:100%; height:100%"></div>
        </div>-->
        <div class="singleContent__map">
            <div id="map" style="width: 100%; height: 100%"></div>
        </div>
        <div class="singleContent__desc">
            <h3>Описание</h3>
            <textarea name="text" id="addContent__description"  class="addContent__description"></textarea>

            <h3>Время работы</h3>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-mo" name="openTime[mo][day]" />
                    <label for="checkbox-mo"><span></span>Пн</label>
                </div>
                <input id="datetimepicker_from-mo" type="text" class="addContent__time" name="openTime[mo][from]"> -
                <input id="datetimepicker_to-mo" type="text" class="addContent__time" name="openTime[mo][to]">
                <input type="checkbox" id="round-the-clock-mo" name="openTime[mo][round]"/>
                <label for="round-the-clock-mo"><span></span>Круглосуточно</label>
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-tu" name="openTime[tu][day]" />
                    <label for="checkbox-tu"><span></span>Вт</label>
                </div>
                <input id="datetimepicker_from-tu" type="text" class="addContent__time" name="openTime[tu][from]"> -
                <input id="datetimepicker_to-tu" type="text" class="addContent__time" name="openTime[tu][to]">
                <input type="checkbox" id="round-the-clock-tu" name="openTime[tu][round]"/>
                <label for="round-the-clock-tu"><span></span>Круглосуточно</label>
            </div>

            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-we" name="openTime[we][day]" />
                    <label for="checkbox-we"><span></span>Ср</label>
                </div>
                <input id="datetimepicker_from-we" type="text" class="addContent__time" name="openTime[we][from]"> -
                <input id="datetimepicker_to-we" type="text" class="addContent__time" name="openTime[we][to]">
                <input type="checkbox" id="round-the-clock-we" name="openTime[we][round]"/>
                <label for="round-the-clock-we"><span></span>Круглосуточно</label>
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-th" name="openTime[th][day]" />
                    <label for="checkbox-th"><span></span>Чт</label>
                </div>
                <input id="datetimepicker_from-th" type="text" class="addContent__time" name="openTime[th][from]"> -
                <input id="datetimepicker_to-th" type="text" class="addContent__time" name="openTime[th][to]">
                <input type="checkbox" id="round-the-clock-th" name="openTime[th][round]"/>
                <label for="round-the-clock-th"><span></span>Круглосуточно</label>
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-fr" name="openTime[fr][day]" />
                    <label for="checkbox-fr"><span></span>Пт</label>
                </div>
                <input id="datetimepicker_from-fr" type="text" class="addContent__time" name="openTime[fr][from]"> -
                <input id="datetimepicker_to-fr" type="text" class="addContent__time" name="openTime[fr][to]">
                <input type="checkbox" id="round-the-clock-fr" name="openTime[fr][round]"/>
                <label for="round-the-clock-fr"><span></span>Круглосуточно</label>
            </div>
            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-sa" name="openTime[sa][day]" />
                    <label for="checkbox-sa"><span></span>Сб</label>
                </div>
                <input id="datetimepicker_from-sa" type="text" class="addContent__time" name="openTime[sa][from]"> -
                <input id="datetimepicker_to-sa" type="text" class="addContent__time" name="openTime[sa][to]">
                <input type="checkbox" id="round-the-clock-sa" name="openTime[sa][round]"/>
                <label for="round-the-clock-sa"><span></span>Круглосуточно</label>
            </div>

            <div class="singleContent__desc--line">
                <div class="weekday">
                    <input type="checkbox" id="checkbox-su" name="openTime[su][day]" />
                    <label for="checkbox-su"><span></span>Вс</label>
                </div>
                <input id="datetimepicker_from-su" type="text" class="addContent__time" name="openTime[su][from]"> -
                <input id="datetimepicker_to-su" type="text" class="addContent__time" name="openTime[su][to]">
                <input type="checkbox" id="round-the-clock-su" name="openTime[su][round]"/>
                <label for="round-the-clock-su"><span></span>Круглосуточно</label>
            </div>
            <div class="singleContent__desc--contacts">
                <h3>Контакты</h3>
                <div class="singleContent__desc--line">
                    <label for="website">Web-сайт</label>
                    <input type="text" class="addContent__cont" name="website">
                </div>
                <div class="singleContent__desc--line">
                    <label for="phonenumber">Телефон</label>
                    <input type="text" class="addContent__cont" name="phoneNumber[]">
                </div>
                <div class="singleContent__desc--line">
                    <label for="phonenumber_last"></label>
                    <input type="text" class="addContent__cont" name="phoneNumber[]">
                    <!--<a href="#nowhere" class="addContent__cont-add">+</a>-->
                </div>
                <div class="singleContent__desc--line">
                    <label for="mailadress">Почта</label>
                    <input type="text" class="addContent__cont" name="mailadress">

                </div>
            </div>
            <div class="singleContent__desc--carbrands">
                <h3>Марки автомобилей</h3>
                <?php foreach($brands as $b): ?>
                <input type="checkbox" id="<?=$b->id?>" name="brands[]" value="<?=$b->name?>"/>
                <label for="<?=$b->id?>"><span></span><?=$b->name?></label>
                <?php endforeach ?>
            </div>
            <?= GetAllGroupById::widget(['groupId' => $_GET['service_type']]) ?>
            <div class="singleContent__services">
                <div class="singleContent__services-comfort">
                    <h3>Зона комфорта</h3>
                    <div class="singleContent__services-comfort-block">
                        <input type="checkbox" value="None" id="wc" name="check"/>
                        <label for="wc"><i class="icon icon__wc"></i>Туалет<span></span></label>

                        <input type="checkbox" value="None" id="bankomat" name="check"/>
                        <label for="bankomat"><i class="icon icon__bankomat"></i>Банкомат<span></span></label>

                        <input type="checkbox" value="None" id="wifi" name="check" />
                        <label for="wifi"><i class="icon icon__wifi"></i>Wi-Fi <span></span></label>

                        <input type="checkbox" value="None" id="cafe" name="check" />
                        <label for="cafe"><i class="icon icon__cafe"></i>Кафе <span></span></label>

                        <input type="checkbox" value="None" id="shiny" name="check" />
                        <label for="shiny"><i class="icon icon__shiny"></i>Подкачка шин<span></span></label>

                        <input type="checkbox" value="None" id="postpay" name="check" />
                        <label for="postpay"><i class="icon icon__postpay"></i>Постоплата<span></span></label>
                    </div>

                    <div class="singleContent__services-comfort-block">
                        <input type="checkbox" value="None" id="coffemachine" name="check"/>
                        <label for="coffemachine"><i class="icon icon__coffemachine"></i>Кофе-автомат<span></span></label>

                        <input type="checkbox" value="None" id="store" name="check"/>
                        <label for="store"><i class="icon icon__store"></i>Магазин<span></span></label>

                        <input type="checkbox" value="None" id="payment" name="check" />
                        <label for="payment"><i class="icon icon__payment"></i>Оплата картой<span></span></label>

                        <input type="checkbox" value="None" id="parking" name="check" />
                        <label for="parking"><i class="icon icon__parking"></i>Парковка для клиентов<span></span></label>

                        <input type="checkbox" value="None" id="terminal" name="check" />
                        <label for="terminal"><i class="icon icon__terminal"></i>Терминал оплаты<span></span></label>

                        <input type="checkbox" value="None" id="restzone" name="check" />
                        <label for="restzone"><i class="icon icon__restzone"></i>Зона отдыха<span></span></label>
                    </div>

                </div>
            </div>
            <div class="addContent--save">
                <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
            </div>
        </div>
    </form>
</div>