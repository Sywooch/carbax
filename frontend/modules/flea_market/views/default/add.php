<?php

use common\classes\Debug;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Добавить товар";
?>

<div class="addContent">

    <form id="addForm" action="<?= Url::to(['add_to_sql'])?>" method="post">
        <input type="text" name="title" class="addContent__title" placeholder="Название товара">
        <?= Html::dropDownList('manufactures',0, ArrayHelper::map($tofMan, 'mfa_id', 'mfa_brand'), ['class'=>'addContent__adress', 'id'=>'manSelect','prompt'=>'Выберите марку'])?>
        <span id="modelBox"></span>
        <span id="typesBox"></span>
        <?= Html::dropDownList('region',0,ArrayHelper::map($region,'id','name'),['class'=>'addContent__adress','id'=>'regionSelect','prompt'=>'Выберите регион'])?>
        <span id="addCity"></span>
        <?= CategoryProductTecDoc::widget()?>
        <span id="parent"></span>
        <div class="singleContent__desc">
            <h3>Описание</h3>
            <?= Html::textarea('descr','',['class'=>'addContent__description'])?>
            <h3>Цена</h3>
            <?= Html::input('text','price',null,['class'=>'addPrice'])?>
            <h3>Разместить от</h3>
            <?= Html::radioList('userOrService','1',['1'=>'Пользователь','2'=>'Сервис'],['class'=>'userOrService','id'=>'addUserOrService'])?>
            <div id="selectServiseWr"></div>
        </div>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
        </div>
    </form>
</div>