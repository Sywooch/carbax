<?php

use common\classes\Debug;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;

/*$this->registerCssFile('/css/bootstrap.min.css');*/
/*$this->registerJsFile('/js/fileinput.min.js');*/

$this->title = "Добавить товар";
?>
<section class="main-container">
<div class="addContent">
    <?php
    $this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <form id="addForm" action="<?= Url::to(['add_to_sql'])?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="addContent__title" placeholder="Название товара">
        <?= Html::dropDownList('manufactures',0, ArrayHelper::map($tofMan, 'mfa_id', 'mfa_brand'), ['class'=>'addContent__adress', 'id'=>'manSelect','prompt'=>'Выберите марку'])?>
        <span id="modelBox"></span>
        <span id="typesBox"></span>
        <?= Html::dropDownList('region',0,ArrayHelper::map($region,'id','name'),['class'=>'addContent__adress','id'=>'regionSelect','prompt'=>'Выберите регион'])?>
        <span id="addCity"></span>
        <?= CategoryProductTecDoc::widget()?>
        <span id="parent"></span>

        <?php
        echo '<label class="control-label">Добавить фото</label>';
        echo FileInput::widget([
            'name' => 'file[]',
            'id' => 'input-4',
            'attribute' => 'attachment_1',
            'options' => ['multiple' => true]
        ]);
        ?>

       <!-- <label class="control-label">Добавить фото</label>
        <input id="input-4" type="file" multiple=true class="file-loading">-->

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
</section>