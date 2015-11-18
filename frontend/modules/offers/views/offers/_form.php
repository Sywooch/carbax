<?php

use app\models\GeobaseRegion;

use common\models\db\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\News */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="contain">
    <div class="offers-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


        <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => $model->getAttributeLabel('title')])->label(false) ?>

        <?= $form->field($model, 'img_url')->fileInput() ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'short_description')->textarea(['rows' => 6])?>

        <?= $form->field($model, 'new_price')->textInput(['placeholder' => $model->getAttributeLabel('new_price')])->label(false) ?>

        <?= $form->field($model, 'old_price')->textInput(['placeholder' => $model->getAttributeLabel('old_price')])->label(false) ?>

        <?= $form->field($model, 'discount')->textInput(['placeholder' => $model->getAttributeLabel('discount')])->label(false) ?>

        <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(GeobaseRegion::find()->all(), 'id', 'name'),['prompt'=>'Выберите регион']);
        ?>
        <span class="city"></span>
        <?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id', 'name'));
        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>