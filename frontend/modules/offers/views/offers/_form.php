<?php

use app\models\GeobaseRegion;

use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\Services;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\News */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="addContent">
    <h1><?= Html::encode($this->title) ?></h1>


        <?php /*$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); */?><!--

        <?/*= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name'),['prompt'=>'Выберите сервис','class'=>'selectSrviceId form-control']); */?>


        <?/*= $form->field($model, 'service_type_id')->hiddenInput(['class'=>'service_type_id'])->label(false);*/?>
        <?/*= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')]) */?>


        <h2>Добавить фото</h2>
        <?php
/*        echo '<label class="control-label">Добавить фото</label>';
        echo FileInput::widget([
            'name' => 'Offers[img_url]',
            'id' => 'input-4',
            'attribute' => 'attachment_1',
            'value' => '/media/img/1.png',
            'options' => ['multiple' => false,
                'language'=> "ru",
                'showCaption'=> true,
                'maxFileCount'=> 1,
                'showRemove'=> false,
                'showUpload'=> false],
        ]);
        */?>

        <?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>

        <?/*= $form->field($model, 'short_description')->textarea(['rows' => 6])*/?>



        <?/*= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(GeobaseRegion::find()->orderBy('name')->all(), 'id', 'name'),['prompt'=>'Выберите регион']); */?>
        <span class="city">
            <?php
/*                if(!empty($model->city_id)){
                    $city = GeobaseCity::find()->where(['region_id'=>$model->region_id])->orderBy('name')->all();
                    echo Html::label('Город');
                    echo Html::dropDownList('city', $model->city_id, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город']);
                }
            */?>
        </span>


<div class="addContent--save">
    <input type="submit" value="Сохранить" class="btn btn-save">
</div>

        --><?php /*ActiveForm::end(); */?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'addForm']]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')]) ?>

    <h2>Добавить фото</h2>
    <?php
/*    echo '<label class="control-label">Добавить фото</label>';
    echo FileInput::widget([
        'name' => 'Offers[img_url]',
        'id' => 'input-4',
        'attribute' => 'attachment_1',
        'value' => '/media/img/1.png',
        'options' => ['multiple' => false,
            'language'=> "ru",
            'showCaption'=> true,
            'maxFileCount'=> 1,
            'showRemove'=> false,
            'showUpload'=> false],
    ]);
    */?>

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
            'uploadUrl' => Url::to(['/ajax/ajax/upload_file_offers']),
            'maxFileCount' => 6,
            'language' => "ru",
            'uploadAsync'=> false,
            'showUpload' => false,
            'dropZoneEnabled' => false
        ],
    ]);
    ?>

    <?= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) ?>

    <?= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) ?>

    <?= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#circs" data-toggle="tab">Условия</a></li>
        <li><a href="#desc" data-toggle="tab">Описание</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="circs">
            <h3>Срок действия акции</h3>
            <?= $form->field($model, 'dt_start')->input('date')->label('С'); ?>
            <?php //Debug::prn($model)?>
            <?= $form->field($model, 'dt_end')->input('date')->label('До'); ?>
            <?/*= Html::input('date','dae','',['class'=>'form-control','id'=>'offers-duration_action_end']); */?>


            <h3>Выберите сервисы для которых будет действовать предложение</h3>
            <div class="addContent">
                <div class="singleContent__desc">
                    <div class="singleContent__desc--works">
                        <?php foreach($services as $serv):?>
                            <input type="checkbox"  id="services_<?=$serv->id;?>" name="servisesId[]" class="servId" value="<?= $serv->id?>"/>
                            <label for="services_<?=$serv->id;?>"><span></span><?= $serv->name; ?></label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="selectAddressForServices">

            </div>
            <?= $form->field($model,'circs')->textarea(['rows' => 6])?>
        </div>
        <div class="tab-pane fade" id="desc">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <!--<div class="tab-pane fade" id="messages">456</div>
        <div class="tab-pane fade" id="settings">789</div>-->
    </div>



    <div class="addContent--save">
        <input type="submit" value="Сохранить" class="btn btn-save" id="saveInfo">
    </div>
<?php ActiveForm::end(); ?>
</div>

<div class="offersRight">
    <div class="offersMapWr">
        <div id="mapOffers"></div>
    </div>

    <div class="addressToServises"></div>

</div>