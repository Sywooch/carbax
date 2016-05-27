<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\reclame_template\models\ReclameTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reclame-template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tpl')->textInput(['maxlength' => true]) ?>

   <!-- --><?/*= $form->field($model, 'zone_id')->textInput() */?>

    <?= $form->field($model,'zone_id')->dropDownList(\yii\helpers\ArrayHelper::map($zone,'id','name'))?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
