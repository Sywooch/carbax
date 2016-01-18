<?php

use common\classes\Debug;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use frontend\widgets\RadioSelectTypeProduct;
use frontend\widgets\RegionSelect;
use frontend\widgets\SelectAuto;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;

$this->registerCssFile('/css/bootstrap.min.css');
/*$this->registerJsFile('/js/fileinput.min.js');*/


$this->title = ($_GET['type'] == 'auto') ? 'Добавить автомобиль' : 'Добавить запчасть';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = [
    'label' => ($_GET['type'] == 'auto') ? 'Мои автомобили' : 'Мои запчасти',
    'url' => ($_GET['type'] == 'auto') ? 'sale_auto' : 'index'
];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<section class="main-container">-->
<div class="addContent">
    <?php
    /*    $this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index']];
        $this->params['breadcrumbs'][] = $this->title;

        */ ?>
    <h1><?= Html::encode($this->title) ?></h1>


    <form id="addForm" action="<?= Url::to(['add_to_sql']) ?>" method="post" enctype="multipart/form-data">
        <input id="prodType" type="hidden" name="prod_type" value="<?= $_GET['type'] ?>">
        <?php if($_GET['type'] == 'zap'){ ?>
            <input type="text" name="title" class="addContent__title" placeholder="Название товара" required>
        <?php } ?>

        <?php if ($_GET['type'] == 'zap') {
            echo RadioSelectTypeProduct::widget();
        } else {
            echo SelectAuto::widget(['view' => ($_GET['type'] == 'auto') ? '0' : '1', 'select_from_garage' => true]);
        }
        ?>


        <div class="singleContent__desc">
            <h2>Регион</h2>
        </div>
        <?= RegionSelect::widget() ?>
        <? /*= Html::dropDownList('region',0,ArrayHelper::map($region,'id','name'),['class'=>'addContent__adress','id'=>'regionSelect','prompt'=>'Выберите регион'])*/ ?><!--
        <span id="addCity"></span>-->
        <? /*= CategoryProductTecDoc::widget()*/ ?>
        <span id="parent"></span>

        <div class="singleContent__desc">
            <h2>Добавить фото</h2>
            <?php
            echo '<label class="control-label">Добавить фото</label>';
            /*echo FileInput::widget([
                'name' => 'file[]',
                'language' => 'ru',
                'id' => 'input-4',
                'options' => [
                    'multiple' => true,
                ],
                'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/site/file-upload']),]
            ]);*/
            echo FileInput::widget([
                'name' => 'file[]',
                'id' => 'input-5',
                'attribute' => 'attachment_1',
                'value' => '/media/img/1.png',
                'options' => [
                    'multiple' => true,
                    'showCaption' => false,
                    /*'showRemove' => true,*/
                    'showUpload' => false,
                    'uploadAsync'=> false,
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/ajax/ajax/upload_file']),
                    'maxFileCount' => 6,
                    'language' => "ru",
                    'uploadAsync'=> false,
                    'previewClass' => 'captionClass',
                    'showUpload' => false,
                    'dropZoneEnabled' => false
                ],
            ]);
            ?>

            <!-- <label class="control-label">Добавить фото</label>
             <input id="input-4" type="file" multiple=true class="file-loading">-->

            <h3>Товар</h3>
            <?= Html::radio('new', true, ['label' => 'Новый', 'value' => 1, 'class' => 'userOrService']); ?>
            <?= Html::radio('new', false, ['label' => 'Б/У', 'value' => 0, 'class' => 'userOrService']); ?>

            <h3>Описание</h3>
            <?= Html::textarea('descr', '', ['class' => 'addContent__description', 'required' => 'required']) ?>
            <?php if ($_GET['type'] == 'auto'): ?>
                <h3>Пробег</h3>
                <?= Html::input('text', 'run', null, ['class' => 'addRun', 'id' => 'run', 'required' => 'required']); ?>
                <span> тыс.км</span><br/>
            <?php endif; ?>
            <h3>Цена</h3>
            <?= Html::input('text', 'price', null, ['class' => 'addPrice', 'id' => 'addPrice', 'required' => 'required']) ?>
            <span> руб.</span>

            <h3>Разместить от</h3>
            <?= Html::radioList('userOrService', '1', ['1' => 'Пользователь', '2' => 'Сервис'], ['class' => 'userOrService', 'id' => 'addUserOrService']) ?>
            <div id="selectServiseWr"></div>
        </div>
        <!--<div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
        </div>-->
        <div class="addContent--save">
            <input type="submit" value="Сохранить" class="btn btn-save" id="saveInfo">
        </div>
        <span id="hiddenInputs"></span>
    </form>
</div>
<!--</section>-->