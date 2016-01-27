<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\adsmanager\models\AdsmanagerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adsmanager-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'id_auto_widget') ?>

    <?= $form->field($model, 'id_info_disk') ?>

    <?php // echo $form->field($model, 'id_info_splint') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'descr') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'dt_add') ?>

    <?php // echo $form->field($model, 'id_auto_type') ?>

    <?php // echo $form->field($model, 'category_id_all') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'prod_type') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'run') ?>

    <?php // echo $form->field($model, 'published') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
