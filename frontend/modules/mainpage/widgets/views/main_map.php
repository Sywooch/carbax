<?php
/*use common\classes\Debug;
use common\models\db\Services;

$services = Services::find()
    ->joinWith('address')
    ->where(['service_type_id' => [1,2]])
    ->all();

Debug::prn($services);*/
?>

<section class="filter">
    <div class="contain">
        <div class="filter__container">
            <h1 class="blockTitle">Фильтруйте поиск</h1>
            <aside class="filter__container--select">
                <div class="filter__container-select--check">
                    <input type="checkbox" value="None" id="filter_category_select_2" name="category[]"/>
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
                    </label>
                </div>
            </aside>
            <div class="filter__container--map">
                <span id="setAddress"></span>
                <span id="coordinates" lat="<?=$lat?>" lng="<?=$lng?>" cityId="<?=$city_id?>"></span>
                <!--<div class="filter__container--map--title">
                    <p>Результаты фильтра</p>
                </div>-->
                <div id="main_map" style="width:100%; height:100%"></div>
            </div>
        </div>
    </div>
</section>