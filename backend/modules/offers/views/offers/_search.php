<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\offers\models\OffersModelsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-models-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'img_url') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'new_price') ?>

    <?php // echo $form->field($model, 'old_price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'dt_add') ?>

    <?php // echo $form->field($model, 'service_type_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'address_selected') ?>

    <?php // echo $form->field($model, 'dt_start') ?>

    <?php // echo $form->field($model, 'dt_end') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'service_id_str') ?>

    <?php // echo $form->field($model, 'circs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
