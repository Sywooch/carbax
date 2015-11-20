<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

if(isset($_GET['search'])){
    $sel['region'] = $_GET['region'];
    $sel['categ'] = $_GET['categ'];
    $sel['manufactures'] = $_GET['categcateg'];
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
                <?= Html::dropDownList('manufactures',$sel['manufactures'], ArrayHelper::map($manufactures, 'mfa_id', 'mfa_brand'), ['prompt'=>'Марка']) ?>
                <?=Html::dropDownList('categ',$sel['categ'], ArrayHelper::map($cat, 'str_id', 'str_des'), ['prompt'=>'Категория'])?>
                <input type="submit" class="filter__searchline--but" value="Найти">
                <input type="button" class="filter__searchline--but" value="На карте">
            </form>
        </div>
    </div>
</section>