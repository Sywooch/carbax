<?php
use yii\helpers\Url;

$this->title = 'Автоуслуги на карте' .' | CARBAX все автоуслуги Вашего города';
$this->params['breadcrumbs'][] = 'Автоуслуги на карте';

?>
<section class="filter">
        <!--<div class="filter--topline">
            <a href="<?/*= Url::to(['/all-services'])*/?>">
                <img src="/media/img/logo2.png" alt="CARBAX">
                <h3 class="orange">Автоуслуги</h3>
            </a>

            <span><a class="allServices" href="<?/*= Url::to(['/services/services/all_services'])*/?>">Все автоуслуги</a></span>
            <span><a class="allMap" href="<?/*= Url::to(['/services/services/map'])*/?>">Открыть карту</a></span>
        </div>-->
        <div class="filter--selecter">
            <?php foreach ($serviceType as $st): ?>
                <div class="filter--item">
                    <input type="checkbox" value="None" id="filter_category_select_<?= $st->id; ?>" name="category[]"  />
                    <label for="filter_category_select_<?= $st->id; ?>" class="main_category_to_map" service-type="<?= $st->id; ?>">
                            <span title="Показать на карте <?= $st->name?>">
                                <img src="<?= $st->icon; ?>" alt="Carbax <?= $st->name?>" title="Показать на карте <?= $st->name?>"/>
                                <p><?= $st->name; ?></p>
                            </span>
                    </label>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="filter__map">
            <span id="setAddress"></span>
            <span id="coordinates" lat="<?=$lat?>" lng="<?=$lng?>" cityId="<?=$city_id?>" regionId="<?=$region_id?>"></span>

            <div id="main_map" style="width:100%; height:100%"></div>

            <div class="myLocationCarbax myLocationCarbaxMaps" title="Мое местоположение"></div>
            <div class="filter__map--checklist">
                <div class="hide_filter__map--checklist"></div>

                <?php foreach($comfortZone as $cf): ?>
                    <input type="checkbox" id="checkbox<?= $cf->id; ?>" name="comfortZone[]" />
                    <label for="checkbox<?= $cf->id; ?>" class="comfortZone" comfortZoneId="<?= $cf->id; ?>"><span></span><?= $cf->name; ?></label>
                <?php endforeach; ?>


            </div>
        </div>
</section>