<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<section class="filter">
    <div class="contain">
        <h2 class="blockTitle-left">Поиск - барахолка</h2>
        <div class="filter__searchline">
            <form action="/flea_market/default/search">
                <?= Html::dropDownList('region',0, ArrayHelper::map($region, 'id', 'name'), ['prompt'=>'Регион'])?>
                <input type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям">
                <?= Html::dropDownList('manufactures',0, ArrayHelper::map($manufactures, 'mfa_id', 'mfa_brand'), ['prompt'=>'Марка']) ?>
                <?=Html::dropDownList('categ',0, ArrayHelper::map($cat, 'str_id', 'str_des'), ['prompt'=>'Категория'])?>
                <input type="submit" class="filter__searchline--but" value="Найти">
                <input type="button" class="filter__searchline--but" value="На карте">
            </form>
        </div>
    </div>
</section>