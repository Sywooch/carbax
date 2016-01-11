<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\complaint\models\ComplaintSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complaint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from_user') ?>

    <?= $form->field($model, 'to_object') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'dt_add') ?>

    <?php // echo $form->field($model, 'read_complaint') ?>

    <?php // echo $form->field($model, 'text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
