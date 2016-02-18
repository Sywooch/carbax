<?php
use common\classes\Debug;
use common\models\db\Services;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use frontend\widgets\RadioSelectTypeProduct;
use frontend\widgets\SelectAuto;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = ($_GET['type'] == 'zap') ? "Редактировать товар" : "Редактировать авто";

foreach($img as $i){
    $preview[] = "<img src='/$i->img' class='file-preview-image'>";
    $previewConfig[] = [
        'caption' => '',
        'url' => '/ajax/ajax/pseudo_delete_file?id=' . $i->id
    ];
}
?>
<div class="addContent">
   <?php
   $this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
   $this->params['breadcrumbs'][] = ['label' => ($_GET['type'] == 'zap') ? "Мои запчасти" : "Мои авто", 'url' => ($_GET['type'] == 'zap') ? ['index'] : ['sale_auto']];
   $this->params['breadcrumbs'][] = $this->title;

   ?>
    <h1><?= Html::encode($this->title) ?></h1>
<form id="addForm" action="<?= Url::to(['add_to_sql'])?>" method="post" enctype="multipart/form-data">
    <input id="prodType" type="hidden" name="prod_type" value="<?=$_GET['type']?>">
    <?php foreach($img as $im):
        if($im['cover'] == 1){
            ?>
            <input type="hidden" name="cover" value="<?= $im['img']; ?>">
            <?php
        }
    ?>

    <?php endforeach; ?>
    <?= Html::input('hidden','idproduct',$product->id)?>

    <?php
        if($product->prod_type == 0 or $product->prod_type == 1){
            echo Html::input('hidden','auto_widget',$auto->id);
            $selected = 1;
        }
        if($product->prod_type == 2){
            echo Html::input('hidden','id_info_splint',$auto->id);
            $selected = 2;
        }
        if($product->prod_type == 3){
            echo Html::input('hidden','id_info_disk',$auto->id);
            $selected = 3;
        }
        if($product->prod_type == 4){

            $selected = 4;
        }
    ?>

    <?php if($_GET['type'] == 'zap'){ ?>
        <input type="text" name="title" class="addContent__title" placeholder="Название товара" value="<?=$product->name?>">
    <?php } ?>

    <!--<input type="text" name="title" class="addContent__title" placeholder="Название товара" value="<?/*=$product->name*/?>">-->
    <?/*= Html::dropDownList('manufactures',$product->man_id, ArrayHelper::map($tofMan, 'mfa_id', 'mfa_brand'), ['class'=>'addContent__adress', 'id'=>'manSelect','prompt'=>'Выберите марку'])*/?><!--
    <span id="modelBox"><?/*= Html::dropDownList('model',$product->model_id,ArrayHelper::map($model, 'mod_id', 'mod_name'), ['class'=>'addContent__adress', 'id'=>'modSelect','prompt'=>'Выберите модель']);*/?></span>
    <span id="typesBox"><?/*= Html::dropDownList('types',$product->type_id,ArrayHelper::map($type, 'typ_id', 'typ_mmt_cds'), ['class'=>'addContent__adress','prompt'=>'Выберите тип']);*/?></span>-->

    <?php
    //Debug::prn($selected);
    if($_GET['type'] == 'zap'){
        echo RadioSelectTypeProduct::widget(['select'=>$selected,'model'=>$auto,'cat'=>$product->category_id_all]);
    }
    else{
        echo SelectAuto::widget(['view' => ($_GET['type'] == 'auto') ? '1' : '0', 'select_from_garage' => true,'auto'=>$auto,'paramsView'=>true]);
    }
    ?>

    <?/*= SelectAuto::widget(['view' => ($_GET['type'] == 'zap') ? '1' : '0', 'auto' => $auto, 'category' => $product->category_id_all]) */?>

    <?= Html::dropDownList('region',$product->region_id,ArrayHelper::map($region,'id','name'),['class'=>'addContent__adress','id'=>'regionSelect','prompt'=>'Выберите регион'])?>
    <span id="addCity"><?= Html::dropDownList('city',$product->city_id,ArrayHelper::map($city,'id','name'),['class'=>'addContent__adress','prompt'=>'Выберите город']);?></span>

    <div id="addAddressMarket">
        <?= Html::checkbox('addAddressMarket',(empty($product->address) ? false : true),['class'=>'addAddressMarket']);?>

        <?= Html::label('Уточнить адрес'); ?>

        <span class="addAddressMarketInp"><?= empty($product->address) ? false : "<input type='text' name='address' class='addContent__title' value='$product->address'>"; ?></span>
    </div>

    <?/*= CategoryProductTecDoc::widget()*/?>

    <div class="singleContent__desc">
        <!--<h3>Категория</h3>
        <div class="categoryProduct"><?/*=$category*/?><a class="updateCat" href="#">Изменить</a>
            <?/*= Html::input('hidden','category_id_all',$product->category_id_all)*/?>
            <?/*= Html::input('hidden','category_id',$product->category_id)*/?>
            <?/*= Html::input('hidden','id_auto_type',$product->id_auto_type)*/?>
        </div>-->

        <span id="parent"></span>

        <?php
        echo '<label class="control-label">Добавить фото</label>';
        /*echo FileInput::widget([
            'name' => 'file[]',
            'id' => 'input-4',
            'attribute' => 'attachment_1',
            'value' => '/media/img/1.png',
            'options' => ['multiple' => true],
        ]);*/
        echo FileInput::widget([
            'name' => 'file[]',
            'id' => 'input-5',
            'attribute' => 'attachment_1',
            'value' => '/media/img/1.png',
            'options' => [
                'multiple' => true,
                'showCaption' => false,
                'showUpload' => false,
                'uploadAsync'=> false,
            ],
            'pluginOptions' => [
                'uploadUrl' => Url::to(['/ajax/ajax/upload_file']),
                'maxFileCount' => 6,
                'language' => "ru",
                'previewClass' => 'hasEdit',
                'uploadAsync'=> false,
                'showUpload' => false,
                'dropZoneEnabled' => false,
                /*'initialPreviewShowDelete' => true,*/
                'overwriteInitial' => false,
                'initialPreview' => $preview,
                'initialPreviewConfig' => $previewConfig
            ],
        ]);
        ?>

        <h3>Товар</h3>
        <?= Html::radio('new',($product->new == 1) ? true : false,['label'=>'Новый','value'=>1,'class'=>'userOrService']);?>
        <?= Html::radio('new',($product->new == 0) ? true : false,['label'=>'Б/У','value'=>0,'class'=>'userOrService']);?>

        <h3>Описание</h3>
        <?= Html::textarea('descr',$product->descr,['class'=>'addContent__description'])?>
        <?php /*if(!isset($_GET['type'])):*/?><!--
            <h3>Пробег</h3>
            <?/*= Html::input('text','run',$product->run,['class'=>'addRun','id'=>'run','required'=>'required']); */?><span> тыс.км</span><br />
        --><?php /*endif; */?>
        <h3>Цена</h3>
        <?= Html::input('text','price',$product->price,['class'=>'addPrice','id'=>'addPrice','required'=>'required'])?><span> руб.</span>

        <h3>Разместить от</h3>
        <?php
            if($product->service_id == 0){
                $place = 1;
                echo Html::radioList('userOrService',$place,['1'=>'Пользователь','2'=>'Сервис'],['class'=>'userOrService','id'=>'addUserOrService']);
                echo '<div id="selectServiseWr"></div>';
            }
            else{
                $place = 2;
                $service = Services::find()->where(['user_id'=>Yii::$app->user->id])->all();
                echo Html::radioList('userOrService',$place,['1'=>'Пользователь','2'=>'Сервис'],['class'=>'userOrService','id'=>'addUserOrService']);
                echo '<div id="selectServiseWr">';
                echo Html::dropDownList('selectService',$product->service_id,ArrayHelper::map($service,'id','name'),['class'=>'addContent__adress']);
                echo '</div>';
            }
        ?>

    </div>
    <div class="addContent--save">
        <input type="submit" value="Сохранить" class="btn btn-save" id="saveInfo">
    </div>
</form>
<?php foreach($img as $im): ?>
    <span class="img_link" data-img="<?=$im['img']?>" data-cover="<?= $im['cover'] ?>"></span>
<?php endforeach; ?>
</div>
