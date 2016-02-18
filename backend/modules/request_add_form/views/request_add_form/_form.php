<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\request_add_form\models\RequestAddForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-add-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'form_type')->dropDownList(['0'=>'inputText','1'=>'textarea']) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'input_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placeholder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template')->textarea(['rows'=>5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
