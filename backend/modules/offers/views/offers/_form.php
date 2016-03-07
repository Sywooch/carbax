<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\offers\models\OffersModels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->textInput() ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_add')->textInput() ?>

    <?= $form->field($model, 'service_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_selected')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dt_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id_str')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'circs')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
