<?php

use app\models\GeobaseRegion;

use common\models\db\GeobaseCity;
use common\models\db\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\News */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="offers-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


        <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')])->label(false) ?>

        <?php if (!empty($model->img_url)){
            echo Html::img($model->img_url,['width'=>'100px']);
            echo Html::hiddenInput('img_url_h',$model->img_url);
        }
        echo $form->field($model, 'img_url')->fileInput();

        ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'short_description')->textarea(['rows' => 6])?>

        <?= $form->field($model, 'new_price')->textInput()->label($model->getAttributeLabel('new_price')) ?>

        <?= $form->field($model, 'old_price')->textInput()->label($model->getAttributeLabel('old_price')) ?>

        <?= $form->field($model, 'discount')->textInput()->label($model->getAttributeLabel('discount')) ?>

        <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(GeobaseRegion::find()->all(), 'id', 'name'),['prompt'=>'Выберите регион']);
        ?>
        <span class="city">
            <?php
                if(!empty($model->city_id)){
                    $city = GeobaseCity::find()->where(['region_id'=>$model->region_id])->all();
                    echo Html::label('Город');
                    echo Html::dropDownList('city', $model->city_id, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город']);
                }
            ?>

        </span>
        <?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id', 'name'));
        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
