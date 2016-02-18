<?php
/*use common\classes\Debug;
use common\models\db\Services;

$services = Services::find()
    ->joinWith('address')
    ->where(['service_type_id' => [1,2]])
    ->all();

Debug::prn($services);*/
?>

<!--<section class="filter">
    <div class="contain">
        <div class="filter__container">
            <h1 class="blockTitle">Фильтруйте поиск</h1>
            <aside class="filter__container--select">
                <div class="filter__container-select--check">
                    <!--<input type="checkbox" value="None" id="filter_category_select_2" name="category[]"/>
                    <label for="filter_category_select_2" class="main_category_to_map" service-type="10">
                         <span>
                            <img src="/media/img/2.png" alt="" />
                            <p>Мойка</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_1" name="category[]"/>
                    <label for="filter_category_select_1" class="main_category_to_map" service-type="2">
                         <span>
                            <img src="/media/img/1.png" alt="" />
                            <p>Шиномонтаж</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_3" name="category[]"/>
                    <label for="filter_category_select_3" class="main_category_to_map" service-type="13">
                         <span>
                            <img src="/media/img/3.png" alt="" />
                            <p>Авторынок</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_4" name="category[]"/>
                    <label for="filter_category_select_4" class="main_category_to_map">
                         <span>
                            <img src="/media/img/4.png" alt="" />
                            <p>Автокарусель</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_5" name="category[]"/>
                    <label for="filter_category_select_5" class="main_category_to_map" service-type="11">
                         <span>
                            <img src="/media/img/5.png" alt="" />
                            <p>Автосервис</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_6" name="category[]"/>
                    <label for="filter_category_select_6" class="main_category_to_map" service-type="12">
                         <span>
                            <img src="/media/img/6.png" alt="" />
                            <p>Автомагазин</p>
                         </span>
                    </label>

                    <input type="checkbox" value="None" id="filter_category_select_7" name="category[]"/>
                    <label for="filter_category_select_7" class="main_category_to_map" service-type="7">
                         <span>
                            <img src="/media/img/7.png" alt="" />
                            <p>Автошкола</p>
                         </span>
                    </label>
                    <input type="checkbox" value="None" id="filter_category_select_8" name="category[]"/>
                    <label for="filter_category_select_8" class="main_category_to_map" service-type="9">
                         <span>
                            <img src="/media/img/8.png" alt="" />
                            <p>Заправки</p>
                         </span>
                    </label>-->

                    <?php /*use common\classes\Debug;
                    //Debug::prn($serviceType);
                    foreach ($serviceType as $st): */?>
                        <!--<input type="checkbox" value="None" id="filter_category_select_<?/*= $st->id; */?>" name="category[]"/>
                        <label for="filter_category_select_<?/*/*= $st->id; */?>" class="main_category_to_map" service-type="<?/*/*= $st->id; */?>">
                         <span>
                            <img src="<?/*/*= $st->icon; */?>" alt="" />
                            <p><?/*/*= $st->name; */?></p>
                         </span>
                        </label>-->
                    <?php /*endforeach; */?>


<!--</div>
            </aside>
            <div class="filter__container--map">
                <span id="setAddress"></span>
                <span id="coordinates" lat="<?/*=$lat*/?>" lng="<?/*=$lng*/?>" cityId="<?/*=$city_id*/?>" regionId="<?/*=$region_id*/?>"></span>
                <!--<div class="filter__container--map--title">
                    <p>Результаты фильтра</p>
                </div>
                <div id="main_map" style="width:100%; height:100%"></div>
            </div>
        </div>
    </div>
</section>-->


<section class="filter">
    <div class="contain">
        <div class="filter--topline">
            <img src="/media/img/logo2.png" alt="">
            <h3 class="orange">Автосервисы</h3>
        </div>
        <div class="filter--selecter">
            <?php foreach ($serviceType as $st): ?>
                <div class="filter--item">
                    <input type="checkbox" value="None" id="filter_category_select_<?= $st->id; ?>" name="category[]"/>
                    <label for="filter_category_select_<?= $st->id; ?>" class="main_category_to_map" service-type="<?= $st->id; ?>">
                            <span>
                                <img src="<?= $st->icon; ?>" alt="" />
                                <p><?= $st->name; ?></p>
                            </span>
                    </label>
                </div>
            <?php endforeach; ?>
            <!--<div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_1" name="category[]"/>
                <label for="filter_category_select_1" class="main_category_to_map" service-type="1">
						<span>
							<img src="http://carbax.ru/secure/images/icon/autosalon.png" alt="" />
							<p>Автосалон</p>
						</span>
                </label>
            </div>-->

           <!-- <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_2" name="category[]">
                <label for="filter_category_select_2" class="main_category_to_map" service-type="2">
						<span>
							<img src="http://carbax.ru/secure/images/icon/shinomontag.png" alt="">
							<p>Шиномонтаж</p>
						</span>
                </label>
            </div>

            <div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_4" name="category[]">
                <label for="filter_category_select_4" class="main_category_to_map" service-type="4">
						<span>
							<img src="http://carbax.ru/secure/images/icon/shini_diski.png" alt="">
							<p>Шины / Диски</p>
						</span>
                </label>
            </div>

            <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_5" name="category[]">
                <label for="filter_category_select_5" class="main_category_to_map" service-type="5">
					    <span>
					        <img src="http://carbax.ru/secure/images/icon/evakuator.png" alt="">
					        <p>Эвакуатор</p>
					    </span>
                </label>
            </div>

            <div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_6" name="category[]">
                <label for="filter_category_select_6" class="main_category_to_map" service-type="6">
					    <span>
					        <img src="http://carbax.ru/secure/images/icon/tuning.png" alt="">
					        <p>Тюнинг </p>
					    </span>
                </label>
            </div>

            <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_7" name="category[]">
                <label for="filter_category_select_7" class="main_category_to_map" service-type="7">
						<span>
							<img src="http://carbax.ru/secure/images/icon/autoscool.png" alt="">
							<p>Автошкола</p>
						</span>
                </label>
            </div>

            <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_8" name="category[]">
                <label for="filter_category_select_8" class="main_category_to_map" service-type="8">
						<span>
							<img src="http://carbax.ru/secure/images/icon/strahovanie.png" alt="">
							<p>Страхование</p>
						</span>
                </label>
            </div>

            <div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_9" name="category[]">
                <label for="filter_category_select_9" class="main_category_to_map" service-type="9">
						<span>
							<img src="http://carbax.ru/secure/images/icon/zapravka.png" alt="">
							<p>Заправка</p>
						</span>
                </label>
            </div>

            <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_10" name="category[]">
                <label for="filter_category_select_10" class="main_category_to_map" service-type="10">
						<span>
							<img src="http://carbax.ru/secure/images/icon/automoika.png" alt="">
							<p>Автомойка</p>
						</span>
                </label>
            </div>

            <div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_11" name="category[]">
                <label for="filter_category_select_11" class="main_category_to_map" service-type="11">
						<span>
							<img src="http://carbax.ru/secure/images/icon/autoservice.png" alt="">
							<p>Автосервис</p>
						</span>
                </label>
            </div>

            <div class="filter--item">
                <input type="checkbox" value="None" id="filter_category_select_12" name="category[]">
                <label for="filter_category_select_12" class="main_category_to_map" service-type="12">
						<span>
							<img src="http://carbax.ru/secure/images/icon/automagazine.png" alt="">
							<p>Автомагазин</p>
						</span>
                </label>
            </div>

            <div class="filter--item filter--item--chess">
                <input type="checkbox" value="None" id="filter_category_select_13" name="category[]">
                <label for="filter_category_select_13" class="main_category_to_map" service-type="13">
						<span>
							<img src="http://carbax.ru/secure/images/icon/autorazbor.png" alt="">
							<p>Авторазбор</p>
						</span>
                </label>
            </div>-->
        </div>

        <div class="filter__map">
                <span id="setAddress"></span>
                <span id="coordinates" lat="<?=$lat?>" lng="<?=$lng?>" cityId="<?=$city_id?>" regionId="<?=$region_id?>"></span>

                <div id="main_map" style="width:100%; height:100%"></div>


            <div class="filter__map--checklist">
                <div class="hide_filter__map--checklist"></div>

                <?php foreach($comfortZone as $cf): ?>
                    <input type="checkbox" id="checkbox<?= $cf->id; ?>" name="comfortZone[]" />
                    <label for="checkbox<?= $cf->id; ?>" class="comfortZone" comfortZoneId="1"><span></span><?= $cf->name; ?></label>
                <?php endforeach; ?>

                <!--<input type="checkbox" id="checkbox01" name="comfortZone[]" />
                <label for="checkbox01" class="comfortZone" comfortZoneId="1"><span></span>Туалет</label>

                <input type="checkbox" id="checkbox02" name="comfortZone[]" />
                <label for="checkbox02" class="comfortZone" comfortZoneId="2"><span></span>Банкомат</label>

                <input type="checkbox" id="checkbox03" name="comfortZone[]" />
                <label for="checkbox03" class="comfortZone" comfortZoneId="3"><span></span>Wi-Fi</label>

                <input type="checkbox" id="checkbox04" name="comfortZone[]" />
                <label for="checkbox04" class="comfortZone" comfortZoneId="4"><span></span>Кафе</label>

                <input type="checkbox" id="checkbox05" name="comfortZone[]" />
                <label for="checkbox05" class="comfortZone" comfortZoneId="5"><span></span>Подкачка шин</label>

                <input type="checkbox" id="checkbox06" name="comfortZone[]" />
                <label for="checkbox06" class="comfortZone" comfortZoneId="6"><span></span>Постоплата</label>

                <input type="checkbox" id="checkbox07" name="comfortZone[]" />
                <label for="checkbox07" class="comfortZone" comfortZoneId="7"><span></span>Кофе-автомат</label>

                <input type="checkbox" id="checkbox08" name="comfortZone[]" />
                <label for="checkbox08" class="comfortZone" comfortZoneId="8"><span></span>Магазин</label>

                <input type="checkbox" id="checkbox09" name="comfortZone[]" />
                <label for="checkbox09" class="comfortZone" comfortZoneId="9"><span></span>Оплата картой</label>

                <input type="checkbox" id="checkbox10" name="comfortZone[]" />
                <label for="checkbox10" class="comfortZone" comfortZoneId="10"><span></span>Парковка для клиентов</label>

                <input type="checkbox" id="checkbox11" name="comfortZone[]" />
                <label for="checkbox11" class="comfortZone" comfortZoneId="11"><span></span>Терминал оплаты</label>

                <input type="checkbox" id="checkbox12" name="comfortZone[]" />
                <label for="checkbox12" class="comfortZone" comfortZoneId="12"><span></span>Зона отдыха</label>-->
            </div>
        </div>
    </div>
</section>