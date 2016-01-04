<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

if(isset($_GET['search'])){
    $sel['region'] = $_GET['region'];
    $sel['categ'] = $_GET['categ'];
    $sel['manufactures'] = $_GET['manufactures'];
    $sel['search'] = $_GET['search'];
}
else {
    $sel['region'] = 0;
    $sel['categ'] = 0;
    $sel['manufactures'] = 0;
    $sel['search'] = '';
}
?>
<section class="filter" style="padding-bottom: 0px">
    <div class="contain">
        <?php if($title):?>
        <h2 class="blockTitle-left">Поиск - барахолка</h2>
        <?php endif; ?>
        <div class="filter__searchline">
            <form action="/flea_market/default/search">
                <?= Html::dropDownList('region',$sel['region'], ArrayHelper::map($region, 'id', 'name'), ['prompt'=>'Регион'])?>
                <input value="<?=$sel['search']?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям">
                <?= Html::dropDownList('prod_type',0, ['2'=>'Транспорт','1'=>'Запчасти'], ['prompt'=>'Что ищите?']) ?>
                <?=Html::dropDownList('typeAuto',0, ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=> 'Мото техника'], ['prompt'=>'Выберите тип автомобиля'])?>
                <input type="submit" class="filter__searchline--but" value="Найти">
                <input type="button" class="filter__searchline--but" value="На карте">
            </form>
        </div>
    </div>
</section>