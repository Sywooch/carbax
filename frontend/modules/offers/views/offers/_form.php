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

    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'addForm']]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')]) ?>
<div class="addContent">
    <h2>Добавить фото</h2>
    <?php
    echo '<label class="control-label">Добавить фото</label>';
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

   <!-- <?/*= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) */?>

    <?/*= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) */?>

    --><?/*= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) */?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#circs" data-toggle="tab">Условия</a></li>
        <li><a href="#desc" data-toggle="tab">Описание</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="circs">
            <h3>Срок действия акции</h3>
            <?= $form->field($model, 'dt_start')->input('date')->label('С', ['class'=>'dtStartOffers']); ?>

            <?= $form->field($model, 'dt_end')->input('date')->label('До', ['class'=>'dtEndOffers']); ?>

            <div class="cleared"></div>


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

</div>

<div class="offersRight">
    <div class="priceInfo">
        <?= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) ?>

        <?= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) ?>

        <?= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) ?>
    </div>
    <div class="offersMapWr">
        <div id="mapOffers"></div>
    </div>

    <div class="addressToServises"></div>

</div>
<?php ActiveForm::end(); ?>