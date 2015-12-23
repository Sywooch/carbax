<?php

use frontend\widgets\SelectAuto;
use frontend\widgets\SelectAutoNew;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('/css/bootstrap.min.css');
$this->title = ($auto) ? 'Редактировать авто: ' . $auto->brand_name . ' ' . $auto->model_name : 'Добавить авто' ;
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Гараж', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">
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
                <?php if(isset($auto)): ?>
                    <input type="hidden" name="garageId" value="<?=$model->id?>">
                    <input type="hidden" name="autoId" value="<?=$auto->id?>">
                    <?= SelectAuto::widget(['view' => 0, 'auto' => $auto]) ?>
                <?php else: ?>
                    <?= SelectAuto::widget(['view' => 0]) ?>
                <?php endif; ?>

                <?= Html::textInput('vin',$model->vin,['class'=>'addContent__title', 'placeholder'=>'введите VIN код','style'=>'float:none']);?>
                <?= Html::textarea('comments',$model->comments,['class'=>'addContent__description', 'placeholder'=>'Комментарии']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </form>
        </div>
</section>

