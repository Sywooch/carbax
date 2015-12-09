<?php

use frontend\widgets\SelectAuto;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('/css/bootstrap.min.css');

?>
<section class="main-container">
    <div class="garage-create">
        <div class="garage-form">

            <?php /*$form = ActiveForm::begin(); */ ?><!--

        <? /*= $form->field($model, 'user_id')->hiddenInput()->label(false); */ ?>

        <? /*= $form->field($model, 'brand')->textInput(['maxlength' => true]) */ ?>

        <? /*= $form->field($model, 'models')->textInput(['maxlength' => true]) */ ?>

        <? /*= $form->field($model, 'year')->textInput(['maxlength' => true]) */ ?>

        <? /*= $form->field($model, 'dvs')->textInput(['maxlength' => true]) */ ?>

        <? /*= $form->field($model, 'kpp')->textInput(['maxlength' => true]) */ ?>


        --><? /*= $form->field($model,'type_car')->radioList(['1'=>'Легковая','2'=>'Грузовая','3'=>'Мото']);*/ ?>

            <form action="/garage" method="post">
                <?= SelectAuto::widget(['view' => 0]) ?>

                <?= Html::textarea('comments','',['class'=>'addContent__description', 'placeholder'=>'Комментарии']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </form>
        </div>
    </div>
</section>

