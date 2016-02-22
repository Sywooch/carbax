<?php

use app\models\GeobaseRegion;

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

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')]) ?>

    <h2>Добавить фото</h2>
    <?php
    echo '<label class="control-label">Добавить фото</label>';
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
    ?>
    <?= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) ?>

    <?= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) ?>

    <?= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#circs" data-toggle="tab">Условия</a></li>
        <li><a href="#desc" data-toggle="tab">Описание</a></li>
        <!--<li><a href="#messages" data-toggle="tab">Сообщения</a></li>
        <li><a href="#settings" data-toggle="tab">Настройки</a></li>-->
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="circs">
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

        </div>
        <div class="tab-pane fade" id="desc">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <!--<div class="tab-pane fade" id="messages">456</div>
        <div class="tab-pane fade" id="settings">789</div>-->
    </div>



    <div class="addContent--save">
        <input type="submit" value="Сохранить" class="btn btn-save">
    </div>
<?php ActiveForm::end(); ?>
