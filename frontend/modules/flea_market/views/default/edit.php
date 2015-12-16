<?php
use common\models\db\Services;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Редактировать товар";
?>
<div class="addContent">
   <?php
   $this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index']];
   $this->params['breadcrumbs'][] = $this->title;

   ?>
    <h1><?= Html::encode($this->title) ?></h1>
<form id="addForm" action="<?= Url::to(['update_to_sql'])?>" method="post" enctype="multipart/form-data">
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
    <input type="text" name="title" class="addContent__title" placeholder="Название товара" value="<?=$product->name?>">
    <?= Html::dropDownList('manufactures',$product->man_id, ArrayHelper::map($tofMan, 'mfa_id', 'mfa_brand'), ['class'=>'addContent__adress', 'id'=>'manSelect','prompt'=>'Выберите марку'])?>
    <span id="modelBox"><?= Html::dropDownList('model',$product->model_id,ArrayHelper::map($model, 'mod_id', 'mod_name'), ['class'=>'addContent__adress', 'id'=>'modSelect','prompt'=>'Выберите модель']);?></span>
    <span id="typesBox"><?= Html::dropDownList('types',$product->type_id,ArrayHelper::map($type, 'typ_id', 'typ_mmt_cds'), ['class'=>'addContent__adress','prompt'=>'Выберите тип']);?></span>
    <?= Html::dropDownList('region',$product->region_id,ArrayHelper::map($region,'id','name'),['class'=>'addContent__adress','id'=>'regionSelect','prompt'=>'Выберите регион'])?>
    <span id="addCity"><?= Html::dropDownList('city',$product->city_id,ArrayHelper::map($city,'id','name'),['class'=>'addContent__adress','prompt'=>'Выберите город']);?></span>

    <?/*= CategoryProductTecDoc::widget()*/?>

    <div class="singleContent__desc">
        <h3>Категория</h3>
        <div class="categoryProduct"><?=$category?><a class="updateCat" href="#">Изменить</a>
            <?= Html::input('hidden','category_id_all',$product->category_id_all)?>
            <?= Html::input('hidden','category_id',$product->category_id)?>
            <?= Html::input('hidden','id_auto_type',$product->id_auto_type)?>
        </div>

        <span id="parent"></span>

        <?php
        echo '<label class="control-label">Добавить фото</label>';
        echo FileInput::widget([
            'name' => 'file[]',
            'id' => 'input-4',
            'attribute' => 'attachment_1',
            'value' => '/media/img/1.png',
            'options' => ['multiple' => true],
        ]);
        ?>

        <h3>Описание</h3>
        <?= Html::textarea('descr',$product->descr,['class'=>'addContent__description'])?>
        <h3>Цена</h3>
        <?= Html::input('text','price',$product->price,['class'=>'addPrice'])?>
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
        <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Сохранить</a>
    </div>
</form>
<?php foreach($img as $im): ?>
    <span class="img_link" data-img="<?=$im['img']?>" data-cover="<?= $im['cover'] ?>"></span>
<?php endforeach; ?>
</div>
