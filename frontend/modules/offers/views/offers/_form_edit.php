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



<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id', 'name'),['prompt'=>'Выберите сервис']); ?>
<?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')]) ?>

<?php if (!empty($model->img_url)){
            //echo Html::img($model->img_url,['width'=>'100px']);
            echo Html::hiddenInput('img_url_h',$model->img_url);
        }
        //echo $form->field($model, 'img_url')->fileInput();

        ?>
<h2>Добавить фото</h2>
<?php
echo '<label class="control-label">Добавить фото</label>';
echo FileInput::widget([
    'name' => 'Offers[img_url]',
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
        /*'uploadUrl' => Url::to(['/ajax/ajax/upload_file_service?id='.$service->id]),*/
        'maxFileCount' => 1,
        'language' => "ru",
        'previewClass' => 'hasEdit',
        'uploadAsync'=> false,
        'showUpload' => false,
        'dropZoneEnabled' => false,
        /*'initialPreviewShowDelete' => true,*/
        'overwriteInitial' => false,
        'initialPreview' => [
            "<img src='$model->img_url' class='file-preview-image'>"
        ],
        'initialPreviewConfig' => [
            [
                'caption' => '',
                'url' => '/ajax/ajax/pseudo_delete_file_service?id=' . $model->id
            ]
        ]
    ],
]);
?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'short_description')->textarea(['rows' => 6])?>

<?= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) ?>

<?= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) ?>

<?= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) ?>

<?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(GeobaseRegion::find()->all(), 'id', 'name'),['prompt'=>'Выберите регион']); ?>
<span class="city">
            <?php
            if(!empty($model->city_id)){
                $city = GeobaseCity::find()->where(['region_id'=>$model->region_id])->all();
                echo Html::label('Город');
                echo Html::dropDownList('city', $model->city_id, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город','class'=>'form-control']);
            }
            ?>

        </span>



<!--<div class="form-group">
            <?/*= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'saveInfo']) */?>
        </div>-->
<div class="addContent--save">
    <input type="submit" value="Сохранить" class="btn btn-save">
</div>

<?php ActiveForm::end(); ?>

